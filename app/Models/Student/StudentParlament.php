<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StudentParlament extends Model
{
    protected $table = 'student_parlament';

    protected $fillable = [
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
     * Получить полный URL изображения студента.
     */
    public function getImageUrl(): string
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return Storage::url($this->image);
        }

        // fallback, если картинки нет
        return asset('img/no-user-photo.webp');
    }
}
