<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageFormSchema extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'page_id',
        'form_schema',
        'title_kk',
        'title_ru',
        'title_en',
    ];

    protected $casts = [
        'form_schema' => 'array',
    ];
}
