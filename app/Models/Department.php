<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $table = 'departments';

    public $timestamps = false;

    protected $fillable = [
        'title_kk',
        'title_ru',
        'title_en',
        'faculty_id'
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
     * Связь с факультетом
     */
    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * Связь с лучшими преподавателями
     */
    public function bestTeachers(): HasMany
    {
        return $this->hasMany(\App\Models\Science\BestTeacher::class);
    }
}