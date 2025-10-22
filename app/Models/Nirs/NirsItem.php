<?php

namespace App\Models\Nirs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class NirsItem extends Model
{
    use HasFactory;

    protected $table = 'nirs_items';

    protected $fillable = [
        'year',
        'title_ru', 'title_kk', 'title_en', 'title_cn',
        'file_path_kk', 'file_path_ru', 'file_path_en', 'file_path_cn',
        'original_name_kk', 'original_name_ru', 'original_name_en', 'original_name_cn',
    ];

    protected $casts = [
        'year' => 'integer',
    ];
    
    public function getTitleAttribute(): string
    {
        $locale = app()->getLocale();
        $locale = in_array($locale, ['ru', 'kk', 'en', 'cn']) ? $locale : 'ru';
        return $this->{"title_{$locale}"} ?? $this->title_ru;
    }
    
    public function getFileUrlAttribute(): ?string
    {
        $locale = app()->getLocale();
        $fallbackChain = [];

        switch ($locale) {
            case 'cn':
                $fallbackChain = ['cn', 'en', 'ru', 'kk'];
                break;
            case 'en':
                $fallbackChain = ['en', 'ru', 'kk'];
                break;
            case 'ru':
                $fallbackChain = ['ru', 'kk'];
                break;
            case 'kk':
                $fallbackChain = ['kk'];
                break;
            default:
                $fallbackChain = ['ru', 'kk', 'en', 'cn'];
                break;
        }

        $filePath = null;
        foreach ($fallbackChain as $lang) {
            if (!empty($this->{"file_path_{$lang}"})) {
                $filePath = $this->{"file_path_{$lang}"};
                break;
            }
        }

        return $filePath ? Storage::url($filePath) : null;
    }
}