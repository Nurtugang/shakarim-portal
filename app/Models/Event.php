<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title_kk',
        'title_ru',
        'title_en',
        'content_kk',
        'content_ru',
        'content_en',
        'active',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function getFormattedDate()
    {
        return $this->date?$this->date->translatedFormat('d F Y'):'';
    }
}
