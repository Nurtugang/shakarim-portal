<?php

namespace App\Models\Science;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Faculty;
use App\Models\Department;

class BestTeacher extends Model
{
    protected $table = 'best_teacher';

    public $timestamps = false;

    protected $fillable = [
        'fullname_kk',
        'fullname_ru', 
        'fullname_en',
        'position_kk',
        'position_ru',
        'position_en',
        'year',
        'faculty_id',
        'department_id',
        'image'
    ];

    protected $casts = [
        'year' => 'integer',
    ];

    /**
     * Получить полное имя на текущем языке
     */
    public function getFullnameAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"fullname_{$locale}"} ?? $this->fullname_ru;
    }

    /**
     * Получить должность на текущем языке  
     */
    public function getPositionAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"position_{$locale}"} ?? $this->position_ru;
    }

    /**
     * Получить URL изображения
     */
    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        // Если изображение уже полный URL (как в старой системе)
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        // Иначе строим URL через storage
        return asset('storage/best-teachers/' . $this->image);
    }

    /**
     * Связь с факультетом
     */
    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    /**
     * Связь с кафедрой
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}