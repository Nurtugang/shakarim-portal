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
        'slider_order',
        'views',
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
     * Создать изображение из файла в зависимости от расширения
     */
    private function createImageFromFile($path)
    {
        if (!file_exists($path)) {
            \Log::error("Файл не существует: {$path}");
            return null;
        }

        // Получаем реальный MIME-тип файла
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $path);
        finfo_close($finfo);

        \Log::info("Обрабатываем файл: {$path}, MIME-тип: {$mimeType}");

        try {
            switch ($mimeType) {
                case 'image/jpeg':
                    $image = imagecreatefromjpeg($path);
                    break;
                case 'image/png':
                    $image = imagecreatefrompng($path);
                    break;
                case 'image/gif':
                    $image = imagecreatefromgif($path);
                    break;
                case 'image/webp':
                    if (function_exists('imagecreatefromwebp')) {
                        $image = imagecreatefromwebp($path);
                    } else {
                        \Log::error("WebP не поддерживается");
                        return null;
                    }
                    break;
                default:
                    \Log::error("Неподдерживаемый MIME-тип: {$mimeType} для файла: {$path}");
                    return null;
            }

            if (!$image) {
                \Log::error("Не удалось создать изображение из файла: {$path}");
                return null;
            }

            return $image;

        } catch (\Exception $e) {
            \Log::error("Ошибка создания изображения из {$path}: " . $e->getMessage());
            return null;
        }
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
                $news->createThumbnail();
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
                
                $image = $this->createImageFromFile($originalPath);
                
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
     * Создать thumbnail версию изображения (400x300 для списков новостей)
     */
    public function createThumbnail(): void
    {
        if (!$this->image) {
            \Log::warning("createThumbnail: у новости ID={$this->id} нет image");
            return;
        }

        $originalPath = storage_path('app/public/news/' . $this->image);

        if (!file_exists($originalPath)) {
            \Log::error("createThumbnail: файл не найден {$originalPath}");
            return;
        }

        $thumbDir = storage_path('app/public/news/thumbnails');
        if (!is_dir($thumbDir)) {
            mkdir($thumbDir, 0755, true);
            \Log::info("createThumbnail: создана папка {$thumbDir}");
        }

        $nameWithoutExtension = pathinfo($this->image, PATHINFO_FILENAME);
        $thumbPath = $thumbDir . '/' . $nameWithoutExtension . '.webp';

        try {
            if (function_exists('imagewebp')) {
                $image = $this->createImageFromFile($originalPath);

                if (!$image) {
                    \Log::error("createThumbnail: не удалось создать GD-ресурс из {$originalPath}");
                    return;
                }

                $originalWidth = imagesx($image);
                $originalHeight = imagesy($image);
                \Log::info("createThumbnail: исходные размеры {$originalWidth}x{$originalHeight}");

                $targetWidth = 400;
                $targetHeight = 300;

                $scaleX = $targetWidth / $originalWidth;
                $scaleY = $targetHeight / $originalHeight;
                $scale = max($scaleX, $scaleY);

                $newWidth = round($originalWidth * $scale);
                $newHeight = round($originalHeight * $scale);

                \Log::info("createThumbnail: масштабируем до {$newWidth}x{$newHeight}");

                $scaled = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($scaled, $image, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

                $thumbnail = imagecreatetruecolor($targetWidth, $targetHeight);

                $offsetX = ($newWidth - $targetWidth) / 2;
                $offsetY = ($newHeight - $targetHeight) / 2;

                \Log::info("createThumbnail: обрезка с offsetX={$offsetX}, offsetY={$offsetY}");

                imagecopy($thumbnail, $scaled, 0, 0, $offsetX, $offsetY, $targetWidth, $targetHeight);

                imagewebp($thumbnail, $thumbPath, 85);
                \Log::info("createThumbnail: thumbnail сохранён {$thumbPath}");

                imagedestroy($image);
                imagedestroy($scaled);
                imagedestroy($thumbnail);
            } else {
                \Log::error("createThumbnail: функция imagewebp не доступна");
            }
        } catch (\Exception $e) {
            \Log::error('Ошибка создания thumbnail: ' . $e->getMessage());
        }
    }

    /**
     * Создать маленькое изображение (preview) для мобильных устройств (150x150)
     */
    public function createPreview(): void
    {
        if (!$this->image) {
            \Log::warning("createPreview: у новости ID={$this->id} нет image");
            return;
        }

        $originalPath = storage_path('app/public/news/' . $this->image);

        if (!file_exists($originalPath)) {
            \Log::error("createPreview: файл не найден {$originalPath}");
            return;
        }

        $previewDir = storage_path('app/public/news/previews');
        if (!is_dir($previewDir)) {
            mkdir($previewDir, 0755, true);
            \Log::info("createPreview: создана папка {$previewDir}");
        }

        $nameWithoutExtension = pathinfo($this->image, PATHINFO_FILENAME);
        $previewPath = $previewDir . '/' . $nameWithoutExtension . '.webp';

        try {
            if (function_exists('imagewebp')) {
                $image = $this->createImageFromFile($originalPath);

                if (!$image) {
                    \Log::error("createPreview: не удалось создать GD-ресурс из {$originalPath}");
                    return;
                }

                $originalWidth = imagesx($image);
                $originalHeight = imagesy($image);

                $targetWidth = 150;
                $targetHeight = 150;

                $scaleX = $targetWidth / $originalWidth;
                $scaleY = $targetHeight / $originalHeight;
                $scale = max($scaleX, $scaleY);

                $newWidth = round($originalWidth * $scale);
                $newHeight = round($originalHeight * $scale);

                $scaled = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($scaled, $image, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

                $preview = imagecreatetruecolor($targetWidth, $targetHeight);
                $offsetX = ($newWidth - $targetWidth) / 2;
                $offsetY = ($newHeight - $targetHeight) / 2;

                imagecopy($preview, $scaled, 0, 0, $offsetX, $offsetY, $targetWidth, $targetHeight);

                imagewebp($preview, $previewPath, 80);

                imagedestroy($image);
                imagedestroy($scaled);
                imagedestroy($preview);

                \Log::info("createPreview: сохранён {$previewPath}");
            } else {
                \Log::error("createPreview: функция imagewebp не доступна");
            }
        } catch (\Exception $e) {
            \Log::error('Ошибка создания preview: ' . $e->getMessage());
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
     * Новости для слайдера на главной
     */
    public function scopeInSlider($query)
    {
        return $query->whereNotNull('slider_order')->orderBy('slider_order');
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

        $nameWithoutExtension = pathinfo($this->image, PATHINFO_FILENAME);
        $webpPath = 'news/webp/' . $nameWithoutExtension . '.webp';

        if (Storage::disk('public')->exists($webpPath)) {
            return Storage::url($webpPath);
        }
        return Storage::url('news/' . $this->image);
    }

    /**
     * Получить URL thumbnail изображения для списков новостей
     */
    public function getThumbnailUrl(): string
    {
        if (!$this->image) {
            return '';
        }

        $nameWithoutExtension = pathinfo($this->image, PATHINFO_FILENAME);
        $thumbPath = 'news/thumbnails/' . $nameWithoutExtension . '.webp';
        
        if (Storage::disk('public')->exists($thumbPath)) {
            return Storage::url($thumbPath);
        }
        return $this->getOptimizedImageUrl();
    }

    /**
     * Получить URL маленького preview изображения
     */
    public function getPreviewUrl(): string
    {
        if (!$this->image) {
            return '';
        }

        $nameWithoutExtension = pathinfo($this->image, PATHINFO_FILENAME);
        $previewPath = 'news/previews/' . $nameWithoutExtension . '.webp';

        if (Storage::disk('public')->exists($previewPath)) {
            return Storage::url($previewPath);
        }
        return $this->getThumbnailUrl();
    }

}