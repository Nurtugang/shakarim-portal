<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevelopmentGoalsEducationContent extends Model
{
    protected $table = 'development_goals_education_content';

    protected $fillable = [
        'content_ru',
        'content_kk',
        'content_en',
        'content_cn',
    ];
}