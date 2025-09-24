<?php

namespace App\Models\Science;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScienceDissertation extends Model
{
    use HasFactory;

    protected $table = 'science_dissertations';
    protected $guarded = [];

    protected $casts = [
        'content_kk' => 'json',
        'content_ru' => 'json',
        'content_en' => 'json',
        'content_cn' => 'json',
    ];
}