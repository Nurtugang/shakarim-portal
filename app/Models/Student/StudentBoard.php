<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentBoard extends Model
{
    protected $table = 'student_board';

    protected $fillable = [
        'category_id',
        'fullname_kk',
        'fullname_ru',
        'fullname_en',
        'faculty_kk',
        'faculty_ru',
        'faculty_en',
        'position_kk',
        'position_ru',
        'position_en',
        'phone',
        'image',
        'status',
        'sort',
        'in_dean',
    ];

    /**
     * Связь с категорией
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(StudentBoardCategory::class, 'category_id');
    }

    public function getImageUrl(): string
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return Storage::url($this->image);
        }
        return asset('img/no-user-photo.webp');
    }
}