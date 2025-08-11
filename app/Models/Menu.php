<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Menu extends Model
{
    public $timestamps = false;

    const TYPE_TOP = 1;
    const TYPE_FOOTER = 2;
    protected $fillable = [
        'type',
        'title_kk',
        'title_ru',
        'title_en',
        'slug',
        'link_kk',
        'link_ru',
        'link_en',
        'is_external_link',
        'sort',
        'parent_id',
        'active',
        'banner',
    ];
    public function parent()
    {
        return $this->hasOne(Menu::class,'id','parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class,'parent_id','id');
    }

    public function page()
    {
        return $this->hasOne(Page::class);
    }

   public function getUrl()
    {
        if ($this->is_external_link) {
            return $this->{'link_' . app()->getLocale()};
        } elseif ($this->{'link_' . app()->getLocale()}) {
            $link = $this->{'link_' . app()->getLocale()};
            
            if (str_starts_with($link, '/') || str_starts_with($link, 'http')) {
                return $link;
            }
            
            try {
                return route($link, ['locale' => app()->getLocale()]);
            } catch (\Exception $e) {
                return $link;
            }
        } elseif ($this->page) {
            return route('page', ['locale' => app()->getLocale(), 'page' => $this->page]);
        }
        
        return '#';
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            Cache::forget('menu');
            Cache::forget('footer_menu');
        });

        static::updated(function () {
            Cache::forget('menu');
            Cache::forget('footer_menu');
        });

        static::deleted(function () {
            Cache::forget('menu');
            Cache::forget('footer_menu');
        });
    }
}
