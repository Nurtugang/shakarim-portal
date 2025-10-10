<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    public $timestamps = false;
    
    protected $table = 'vacancy';
    
    protected $fillable = [
        'position',
        'content',
        'language',
        'created_at'
    ];
}