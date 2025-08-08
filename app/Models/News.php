<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    protected $fillable = [
        'source_id',
        'name',
        'alias',
        'image',
        'excerpt',
        'content_kz',
        'content_ru',
        'content_en',
        'title_kz',
        'title_ru',
        'title_en',
        'description',
        'link',
        'category_id',
        'date',
        'status',
        'language',
        'created_by',
        'updated_by'
    ];

    public $timestamps = false;

    protected $casts = [
        'date' => 'integer',
        'status' => 'boolean',
        'created_at' => 'integer',
        'updated_at' => 'integer'
    ];

    /**
     * Категория новости
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'category_id');
    }

    /**
     * Теги новости
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(NewsTag::class, 'news_tag_assn', 'news_id', 'tag_id')
            ->withPivot('ord');
    }

    /**
     * Активные новости
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}