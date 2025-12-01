<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_kk', 'name_ru', 'name_en', 'name_cn',
        'text_kk', 'text_ru', 'text_en', 'text_cn',
        'hours',
        'form',
        'filename',
    ];

    /**
     * Получить название на текущем языке.
     */
    public function getNameAttribute(): ?string
    {
        $locale = app()->getLocale();
        $column = "name_{$locale}";
        return $this->{$column} ?? $this->name_ru ?? $this->name_kk;
    }

    /**
     * Получить текст на текущем языке.
     */
    public function getTextAttribute(): ?string
    {
        $locale = app()->getLocale();
        $column = "text_{$locale}";
        return $this->{$column} ?? $this->text_ru ?? $this->text_kk;
    }

    /**
     * Получить URL файла.
     */
    public function getFileUrl(): ?string
    {
        if (!$this->filename) {
            return null;
        }
        return Storage::url($this->filename);
    }
}