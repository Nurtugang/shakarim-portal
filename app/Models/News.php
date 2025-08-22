<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class News extends Model
{
    use HasSlug;
    protected $fillable = [
        'alias',
        'image',
        'content_kk',
        'content_ru', 
        'content_en',
        'title_kk',
        'title_ru',
        'title_en',
        'category_id',
        'date',
        'status',
        'created_at',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'date' => 'datetime',
        'status' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title_kk')
            ->saveSlugsTo('alias');
    }

    /**
     * Boot метод для автоматической обработки изображений
     */
    protected static function boot()
    {
        parent::boot();
        
        static::saved(function ($news) {
            if ($news->image && $news->wasChanged('image')) {
                $news->createWebpVersion();
            }
        });
    }

    public function getFormattedDate()
    {
        return $this->date?$this->date->locale(app()->getLocale(),'kk')->translatedFormat('d F Y'):'';
    }

    /**
     * Создать webp версию изображения
     */
    public function createWebpVersion(): void
    {
        if (!$this->image) return;
        
        $originalPath = storage_path('app/public/news/' . $this->image);
        
        if (!file_exists($originalPath)) return;
        
        // Создаем папку webp если не существует
        $webpDir = storage_path('app/public/news/webp');
        if (!is_dir($webpDir)) {
            mkdir($webpDir, 0755, true);
        }
        
        $nameWithoutExtension = pathinfo($this->image, PATHINFO_FILENAME);
        $webpPath = $webpDir . '/' . $nameWithoutExtension . '.webp';
        
        // Конвертируем в webp с уменьшением размера
        try {
            if (function_exists('imagewebp')) {
                $image = null;
                $extension = strtolower(pathinfo($this->image, PATHINFO_EXTENSION));
                
                switch ($extension) {
                    case 'jpg':
                    case 'jpeg':
                        $image = imagecreatefromjpeg($originalPath);
                        break;
                    case 'png':
                        $image = imagecreatefrompng($originalPath);
                        break;
                    case 'gif':
                        $image = imagecreatefromgif($originalPath);
                        break;
                }
                
                if ($image) {
                    // Уменьшаем размер в 2 раза
                    $width = imagesx($image);
                    $height = imagesy($image);
                    $newWidth = $width / 2;
                    $newHeight = $height / 2;
                    
                    $resized = imagecreatetruecolor($newWidth, $newHeight);
                    imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                    
                    imagewebp($resized, $webpPath, 80);
                    imagedestroy($image);
                    imagedestroy($resized);
                }
            }
        } catch (\Exception $e) {
            // Логируем ошибку, но не прерываем работу
            \Log::error('Ошибка создания webp: ' . $e->getMessage());
        }
    }

    /**
     * Установить атрибут image
     * Если значение содержит 'news/', сохраняем только имя файла
     */
    public function setImageAttribute($value)
    {
        if ($value && str_contains($value, 'news/')) {
            $this->attributes['image'] = basename($value);
        } else {
            $this->attributes['image'] = $value;
        }
    }
    /**
     * Категория новости
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'category_id');
    }

    /**
     * Теги новости
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(NewsTag::class, 'news_tag_assn', 'news_id', 'tag_id')
            ->withPivot('ord');
    }

    /**
     * Активные новости
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Комментарии к новости
     */
    public function comments()
    {
        return $this->hasMany(NewsComment::class)->latest();
    }

    /**
     * Получить URL оптимизированного изображения
     *
     * @return string
     */
    public function getOptimizedImageUrl(): string
    {
        if (!$this->image) {
            return '';
        }

        // Убираем расширение из оригинального имени файла
        $nameWithoutExtension = pathinfo($this->image, PATHINFO_FILENAME);
        
        // Формируем путь к webp версии
        $webpPath = 'news/webp/' . $nameWithoutExtension . '.webp';
        
        // Проверяем существует ли webp версия
        if (Storage::disk('public')->exists($webpPath)) {
            return Storage::url($webpPath);
        }
        
        // Если webp не существует, возвращаем оригинал
        return Storage::url('news/' . $this->image);
    }
}