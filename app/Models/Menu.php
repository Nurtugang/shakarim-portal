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
        'structure_id'
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
        $locale = app()->getLocale();
        $link = $this->{'link_' . $locale};

        if ($this->is_external_link && $link) {
            return $link;
        }

        if ($link) {
            $cleanLink = ltrim($link, '/');
            $cleanLink = preg_replace("#^{$locale}/#", '', $cleanLink);

            if (str_starts_with($cleanLink, 'http')) {
                return $cleanLink;
            }

            try {
                return url("/{$locale}/{$cleanLink}");
            } catch (\Exception $e) {
                return "/{$locale}/{$cleanLink}";
            }
        }

        if ($this->page) {
            return route('page', ['locale' => $locale, 'page' => $this->page]);
        }

        return '#';
    }


    public function structure()
    {
        return $this->belongsTo(Structure::class);
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
