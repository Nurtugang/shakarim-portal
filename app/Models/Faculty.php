<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faculty extends Model
{
    protected $table = 'faculties';

    public $timestamps = false;

    protected $fillable = [
        'title_kk',
        'title_ru',
        'title_en',
        'sort'
    ];

    /**
     * Получить название на текущем языке
     */
    public function getTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_ru;
    }

    /**
     * Связь с кафедрами
     */
    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    /**
     * Связь с лучшими преподавателями
     */
    public function bestTeachers(): HasMany
    {
        return $this->hasMany(\App\Models\Science\BestTeacher::class);
    }
}