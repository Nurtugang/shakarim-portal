<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduate extends Model
{
    use HasFactory;

    protected $table = 'graduates';

    protected $fillable = [
        'academic_year',
        'title_kk', 'title_ru', 'title_en',
        'document_kk', 'document_ru', 'document_en',
    ];
}
