<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class RectorPost extends Model
{
    use HasSlug;

    protected $fillable = [
        'title_kk',
        'title_ru', 
        'title_en',
        'content_kk',
        'content_ru',
        'content_en',
        'image',
        'active',
        'slug'
    ];

    protected $casts = [
        'active' => 'boolean',
        'content_kk' => 'array',
        'content_ru' => 'array', 
        'content_en' => 'array'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title_ru')
            ->saveSlugsTo('slug');
    }

    public function getPhoto()
    {
        if ($this->image) {
            return '/storage/' . $this->image;
        }
        return '/img/no_image.webp';
    }

    public function getFormattedDate()
    {
        return $this->created_at->translatedFormat('d F Y');
    }
}