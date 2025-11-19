<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoardCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_kk', 'title_ru', 'title_en', 'title_cn',
        'additional_content_kk', 'additional_content_ru', 
        'additional_content_en', 'additional_content_cn',
        'icon_class',
    ];

    public function boards()
    {
        return $this->hasMany(Board::class, 'category_id');
    }
    
    public function getTitleAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{'title_' . $locale} ?? $this->title_ru;
    }

    public function getAdditionalContentAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{'additional_content_' . $locale} ?? $this->additional_content_ru;
    }
}