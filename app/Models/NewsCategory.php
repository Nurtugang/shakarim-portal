<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NewsCategory extends Model
{
    protected $table = 'news_category';

    protected $fillable = [
        'label_kk',
        'label_ru',
        'label_en',
        'title',
        'alias'
    ];

    public $timestamps = false;

    /**
     * Новости этой категории
     */
    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id');
    }
}