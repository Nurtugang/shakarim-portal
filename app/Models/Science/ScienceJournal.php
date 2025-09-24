<?php

namespace App\Models\Science;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScienceJournal extends Model
{
    use HasFactory;

    protected $table = 'science_journals';

    public $timestamps = false;

    protected $fillable = [
        'name_kk',
        'name_ru',
        'name_en',
        'name_cn',
        'number',
        'year',
        'filename',
        'created_at',
    ];
}