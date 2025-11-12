<?php

namespace App\Models\Nirs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NirsMainContent extends Model
{
    use HasFactory;

    protected $table = 'nirs_main_content';

    protected $fillable = [
        'content_ru',
        'content_kk',
        'content_en',
        'content_cn',
    ];

    public function getContentAttribute(): ?string
    {
        $locale = app()->getLocale();
        $locale = $locale === 'eu' ? 'ru' : $locale; 
        
        if (!in_array($locale, ['ru', 'kk', 'en', 'cn'])) {
            $locale = 'ru'; 
        }

        return $this->{"content_{$locale}"} ?? $this->content_ru;
    }
}
