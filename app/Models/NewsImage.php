<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class NewsImage extends Model
{
    protected $fillable = [
        'news_id',
        'title',
        'image',
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }

    public function getUrlAttribute()
    {
        // Гарантируем только имя файла
        $filename = is_string($this->image) ? basename($this->image) : $this->image;
        return '/storage/news/images/' . $filename;
    }

    // Мутатор: всегда сохранять только имя файла
    public function setImageAttribute($value)
    {
        if (!$value) {
            $this->attributes['image'] = null;
            return;
        }
        $this->attributes['image'] = is_string($value) ? basename($value) : $value;
    }
}
