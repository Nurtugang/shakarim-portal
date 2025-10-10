<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class PageList extends Model
{
    use HasSlug;
    public $timestamps = false;
    protected $fillable = [
        'title_kk',
        'title_ru',
        'title_en',
        'content_kk',
        'content_ru',
        'content_en',
        'slug',
        'page_id',
        'date',
        'image',
        'active',
        'content_text_kk',
        'content_text_ru',
        'content_text_en'
    ];

    protected $casts = [
        'date' => 'datetime',
        'active' => 'boolean',
        'gallery' => 'array',
    ];
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title_kk')
            ->saveSlugsTo('slug');
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function getFormattedDate()
    {
        return $this->date ? $this->date->translatedFormat('d F Y') : '';
    }

    public function shortTitle($limit = 100): string
    {
        if ($this->{'title_' . app()->getLocale()}) {
            return Str::limit($this->{'title_' . app()->getLocale()}, $limit);
        }
        return '';
    }

    public function shortBody($words = 30): string
    {
        if ($this->{'content_' . app()->getLocale()}) {
            return Str::words(strip_tags($this->{'content_' . app()->getLocale()}), $words);
        }
        return '';
    }

    public function getUrl()
    {
        return route('list.item', ['locale' => app()->getLocale(), 'pageList' => $this->slug]);
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ?: now();
    }

    public function getImage()
    {
        if ($this->image) {
            return '/storage/' . $this->image;
        }
        return null;
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
}
