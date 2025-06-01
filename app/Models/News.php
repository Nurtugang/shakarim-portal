<?php

namespace App\Models;

use App\Enums\NewsTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class News extends Model
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
        'thumbnail',
        'meta_title',
        'meta_description',
        'published_at',
        'active',
        'gallery'
    ];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title_kk')
            ->saveSlugsTo('slug');
    }

    protected $casts = [
        'gallery' => 'array',
        'published_at' => 'datetime',
        'type' => NewsTypeEnum::class
    ];

    public function getFormattedDate()
    {
        return $this->published_at?$this->published_at->translatedFormat('d F Y'):'';
    }

    public function getPhoto(){
        if($this->thumbnail){
           return '/storage/'. (string)$this->thumbnail;
        }
        return '/img/no_image.webp';
    }

    public function shortTitle($limit = 100): string
    {
        if($this->{'title_'.app()->getLocale()})
        {
             return Str::limit($this->{'title_'.app()->getLocale()},$limit);
        }
        return '';
       
    }

    public function shortBody($words = 30): string
    {
        if($this->{'content_'.app()->getLocale()})
        {
            return Str::words(strip_tags($this->{'content_'.app()->getLocale()}), $words);
        }
        return '';
    }

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: now();
    }

    protected static function boot()
    {
        parent::boot();
 
        static::created(function () {
            Cache::forget('news_homepage_kk');
            Cache::forget('news_homepage_ru');
            Cache::forget('news_homepage_en');
        });
 
        static::updated(function () {
            Cache::forget('news_homepage_kk');
            Cache::forget('news_homepage_ru');
            Cache::forget('news_homepage_en');
        });
    }
}
