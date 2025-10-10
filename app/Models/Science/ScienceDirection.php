<?php

namespace App\Models\Science;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScienceDirection extends Model
{
    protected $table = 'science_directions';

    public $timestamps = false;

    protected $fillable = [
        'name_kk',
        'name_ru',
        'name_en',
        'name_cn',
    ];

    /**
     * Получить название на текущем языке
     */
    public function getNameAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"name_{$locale}"} ?? $this->name_ru;
    }

    /**
     * Связь с лучшими преподавателями
     */
    public function bestTeachers(): HasMany
    {
        return $this->hasMany(BestTeacher::class, 'science_direction_id');
    }
}