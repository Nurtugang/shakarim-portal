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
        'image_slider',
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
        'updated_at' => 'datetime',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title_kk')
            ->saveSlugsTo('alias');
    }

    // Атрибут для получения заголовка на текущем языке
    public function getLocaleTitleAttribute()
    {
        $locale = app()->getLocale();
        $value = $this->{'title_' . $locale};

        return $value ?: $this->title_ru; 
    }

    // Атрибут для контента
    public function getLocaleContentAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'content_' . $locale} ?: $this->content_ru;
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
            if ($news->image) {
                try {
                    $news->createThumbnail();
                    $news->createPreview();
                } catch (\Throwable $e) {
                    \Log::error("❌ Ошибка при вызове createThumbnail/createPreview: " . $e->getMessage());
                }
            } else {
                \Log::warning("⚠️ [News boot:saved] image отсутствует у ID={$news->id}");
            }
        });
    }


    public function getFormattedDate()
    {
        return $this->date?$this->date->locale(app()->getLocale(),'kk')->translatedFormat('d F Y'):'';
    }

    /**
     * Создать thumbnail версию изображения (400x300 для списков новостей)
     */
    public function createThumbnail(): void
    {
        $originalPath = storage_path('app/public/news/' . $this->image);

        if (!file_exists($originalPath)) {
            \Log::error("createThumbnail: файл не найден {$originalPath}");
            return;
        }

        $thumbDir = storage_path('app/public/news/thumbnails');
        if (!is_dir($thumbDir)) {
            mkdir($thumbDir, 0755, true);
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

                $targetWidth = 400;
                $targetHeight = 300;

                $scaleX = $targetWidth / $originalWidth;
                $scaleY = $targetHeight / $originalHeight;
                $scale = max($scaleX, $scaleY);

                $newWidth = round($originalWidth * $scale);
                $newHeight = round($originalHeight * $scale);

                $scaled = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($scaled, $image, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

                $thumbnail = imagecreatetruecolor($targetWidth, $targetHeight);

                $offsetX = ($newWidth - $targetWidth) / 2;
                $offsetY = ($newHeight - $targetHeight) / 2;

                imagecopy($thumbnail, $scaled, 0, 0, $offsetX, $offsetY, $targetWidth, $targetHeight);
                imagewebp($thumbnail, $thumbPath, 85);
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
     * Создать preview версию изображения (150x150 для мобилки)
     */
    public function createPreview(): void
    {
        $originalPath = storage_path('app/public/news/' . $this->image);
        if (!file_exists($originalPath)) {
            \Log::error("createPreview: файл не найден {$originalPath}");
            return;
        }

        $previewDir = storage_path('app/public/news/previews');
        if (!is_dir($previewDir)) {
            mkdir($previewDir, 0755, true);
        }

        $nameWithoutExtension = pathinfo($this->image, PATHINFO_FILENAME);
        $previewPath = $previewDir . '/' . $nameWithoutExtension . '.webp';

        try {
            if (function_exists('imagewebp')) {
                $image = $this->createImageFromFile($originalPath);
                if (!$image) return;

                $originalWidth = imagesx($image);
                $originalHeight = imagesy($image);

                $targetWidth = 150;
                $targetHeight = 150;

                $scaled = imagecreatetruecolor($targetWidth, $targetHeight);
                imagecopyresampled($scaled, $image, 0, 0, 0, 0, $targetWidth, $targetHeight, $originalWidth, $originalHeight);

                imagewebp($scaled, $previewPath, 85);

                imagedestroy($image);
                imagedestroy($scaled);

            } else {
                \Log::error("createPreview: функция imagewebp не доступна");
            }
        } catch (\Exception $e) {
            \Log::error("Ошибка создания превью: " . $e->getMessage());
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

    public function setImageSliderAttribute($value)
    {
        if ($value && str_contains($value, 'news/')) {
            $this->attributes['image_slider'] = basename($value);
        } else {
            $this->attributes['image_slider'] = $value;
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
     * Получить URL главного изображения (для страницы новости)
     */
    public function getMainImageUrl(): string
    {
        if (!$this->image) {
            return '';
        }
        return Storage::disk('public')->url('news/' . $this->image);
    }

    // Изображение слайдера
    public function getSliderImageUrl(): string
    {
        if (!$this->image_slider) {
            return $this->getMainImageUrl();
        }
        return Storage::disk('public')->url('news/slider/' . $this->image_slider);
    }

    // Изображение превью (для мобилки) [150x150]
    public function getPreviewUrl(): string
    {
        if (!$this->image) {
            \Log::warning("getPreviewUrl: у новости ID={$this->id} нет image");
            return '';
        }

        $nameWithoutExtension = pathinfo($this->image, PATHINFO_FILENAME);
        $previewPath = 'news/previews/' . $nameWithoutExtension . '.webp';

        if (Storage::disk('public')->exists($previewPath)) {
            return Storage::url($previewPath);
        }

        return Storage::disk('public')->url('news/' . $this->image);
    }

    // Изображение thumbnail (для списков новостей) [400x300]
    public function getThumbnailUrl(): string
    {
        if (!$this->image) {
            \Log::warning("getThumbnailUrl: у новости ID={$this->id} нет image");
            return '';
        }

        $nameWithoutExtension = pathinfo($this->image, PATHINFO_FILENAME);
        $thumbnailPath = 'news/thumbnails/' . $nameWithoutExtension . '.webp';

        if (Storage::disk('public')->exists($thumbnailPath)) {
            return Storage::url($thumbnailPath);
        }

        \Log::info("getThumbnailUrl: thumbnail не найден, используем оригинал news/{$this->image}");
        return Storage::disk('public')->url('news/' . $this->image);
    }

    public function developmentGoals(): BelongsToMany
    {
        return $this->belongsToMany(DevelopmentGoal::class, 'development_goal_news');
    }
}