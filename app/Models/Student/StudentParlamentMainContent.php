<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParlamentMainContent extends Model
{
    use HasFactory;

    protected $table = 'student_parlament_main_content';

    protected $fillable = [
        'content_ru',
        'content_kk',
        'content_en',
        'content_cn',
    ];
}
