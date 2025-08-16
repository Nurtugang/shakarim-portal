<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    protected $fillable = [
        'alias',
        'image',
        'content_kz',
        'content_ru', 
        'content_en',
        'title_kz',
        'title_ru',
        'title_en',
        'category_id',
        'date',
        'status',
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

    /**
     * Комментарии к новости
     */
    public function comments()
    {
        return $this->hasMany(NewsComment::class)->where('is_approved', true)->latest();
    }
}