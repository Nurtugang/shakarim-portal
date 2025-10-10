<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Minor extends Model
{
    public $timestamps = false;
    
    protected $table = 'minor';
    
    protected $fillable = [
        'title',
        'content',
        'language'
    ];
}