<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevelopmentWorkingGroupContent extends Model
{
    protected $table = 'development_working_group_contents';

    protected $fillable = [
        'content_ru',
        'content_kk',
        'content_en',
        'content_cn',
    ];
}
