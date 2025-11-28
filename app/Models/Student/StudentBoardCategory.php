<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class StudentBoardCategory extends Model
{
    protected $table = 'student_board_categories';

    protected $fillable = ['name_kk', 'name_ru', 'name_en'];

    public function members()
    {
        return $this->hasMany(StudentBoard::class, 'category_id');
    }
}