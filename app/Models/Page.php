<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    use HasSlug;
    protected $fillable = [
        'title_kk',
        'title_ru',
        'title_en',
        'content_kk',
        'content_ru',
        'content_en',
        'slug',
        'menu_id',
        'parent_id',
        'active',
        'lists_view_type',
        'is_news_page',
        'content_text_kk', 'content_text_ru', 'content_text_en'
    ];

    protected $casts = [
        'content_kk' => 'array',
        'content_ru' => 'array',
        'content_en' => 'array',
        'lists_view_type' => \App\Enums\ListViewType::class,
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title_kk')
            ->saveSlugsTo('slug');
    }

    public function parent()
    {
        return $this->hasOne(Page::class,'id','parent_id');
    }

    public function menu(){
        return $this->belongsTo(Menu::class,"menu_id","id");
    }
    public function files()
    {
        return $this->hasMany(PageFile::class,'page_id')->orderBy('created_at','desc');
    }

    public function lists()
    {
        return $this->hasMany(PageList::class,'page_id');
    }

    public function getTopParentMenu()
    {
        $menu = $this->menu;
    
        while ($menu && $menu->parent_id) {
            $menu = Menu::find($menu->parent_id);
        }
    
        return $menu;
    }
    // public function getUrlAttribute()
    // {
    //     return route('page', ['locale' => app()->getLocale(), 'page' => $this]);
    // }

    public function getUrl()
    {
        return route('page', ['locale' => app()->getLocale(), 'page' => $this->slug]);
    }

    protected static function booted()
    {
        static::saving(function ($page) {
            foreach (['kk', 'ru', 'en'] as $locale) {
                $jsonContent =  tiptap_converter()->asHTML($page->{"content_{$locale}"});
                $page->{"content_text_{$locale}"} = strip_tags($jsonContent ?? '');
            }
        });
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            Cache::forget('menu');
        });

        static::updated(function () {
            Cache::forget('menu');
        });

        static::deleted(function () {
            Cache::forget('menu');
        });
    }
}
