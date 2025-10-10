<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['author', 'text', 'language'];

    public static function getRandomQuote($language = 'ru')
    {
        return self::where('language', $language)->inRandomOrder()->first();
    }
}