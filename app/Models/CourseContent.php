<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    protected $fillable = [
        'key', 
        'title_kk', 'title_ru', 'title_en', 'title_cn',
        'content_kk', 'content_ru', 'content_en', 'content_cn'
    ];

    /**
     * Получить ЗАГОЛОВОК на текущем языке приложения
     */
    public function getTitleAttribute(): ?string
    {
        $locale = app()->getLocale();
        $column = "title_{$locale}";
        return $this->{$column} ?? $this->title_ru ?? $this->title_kk;
    }

    /**
     * Получить КОНТЕНТ на текущем языке приложения
     */
    public function getBodyAttribute(): ?string
    {
        $locale = app()->getLocale();
        $column = "content_{$locale}";
        return $this->{$column} ?? $this->content_ru ?? $this->content_kk;
    }
}