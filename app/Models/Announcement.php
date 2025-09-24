<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Announcement extends Model
{
    use HasFactory;

    protected $table = 'announcement';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'content',
        'language',
        'date',
        'alias',
        'image',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'date' => 'integer',
        'status' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'created_at' => 'integer',
        'updated_at' => 'integer'
    ];

    public function setImageAttribute($value)
    {
        if ($value && str_contains($value, 'announcement/')) {
            $this->attributes['image'] = basename($value);
        } else {
            $this->attributes['image'] = $value;
        }
    }

    /**
     * Получить URL оптимизированного изображения
     */
    public function getOptimizedImageUrl(): string
    {
        if (!$this->image) {
            return '';
        }

        // Убираем расширение из оригинального имени файла
        $nameWithoutExtension = pathinfo($this->image, PATHINFO_FILENAME);
        
        // Формируем путь к webp версии
        $webpPath = 'announcement/webp/' . $nameWithoutExtension . '.webp';
        
        // Проверяем существует ли webp версия
        if (Storage::disk('public')->exists($webpPath)) {
            return Storage::url($webpPath);
        }
        
        // Если webp не существует, возвращаем оригинал
        return Storage::url('announcement/' . $this->image);
    }

    /**
     * Получить URL thumbnail изображения (400x300)
     */
    public function getThumbnailUrl(): string
    {
        if (!$this->image) {
            return '';
        }

        $nameWithoutExtension = pathinfo($this->image, PATHINFO_FILENAME);
        $thumbPath = 'announcement/thumbnails/' . $nameWithoutExtension . '.webp';

        if (Storage::disk('public')->exists($thumbPath)) {
            return Storage::url($thumbPath);
        }

        return $this->getOptimizedImageUrl();
    }

    /**
     * Получить URL preview изображения (150x150)
     */
    public function getPreviewUrl(): string
    {
        if (!$this->image) {
            return '';
        }

        $nameWithoutExtension = pathinfo($this->image, PATHINFO_FILENAME);
        $previewPath = 'announcement/previews/' . $nameWithoutExtension . '.webp';

        if (Storage::disk('public')->exists($previewPath)) {
            return Storage::url($previewPath);
        }

        return $this->getThumbnailUrl();
    }


    /**
     * Создать thumbnail (400x300)
     */
    public function createThumbnail(): void
    {
        $this->createResizedVersion(400, 300, 'thumbnails');
    }

    /**
     * Создать preview (150x150)
     */
    public function createPreview(): void
    {
        $this->createResizedVersion(150, 150, 'previews');
    }

    /**
     * Вспомогательный метод для ресайза
     */
    private function createResizedVersion(int $targetWidth, int $targetHeight, string $folder): void
    {
        if (!$this->image) return;

        $originalPath = storage_path('app/public/announcement/' . $this->image);
        if (!file_exists($originalPath)) return;

        $dir = storage_path("app/public/announcement/{$folder}");
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $nameWithoutExtension = pathinfo($this->image, PATHINFO_FILENAME);
        $destPath = $dir . '/' . $nameWithoutExtension . '.webp';

        try {
            if (function_exists('imagewebp')) {
                // Определяем mime
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mimeType = finfo_file($finfo, $originalPath);
                finfo_close($finfo);

                switch ($mimeType) {
                    case 'image/jpeg':
                        $image = imagecreatefromjpeg($originalPath);
                        break;
                    case 'image/png':
                        $image = imagecreatefrompng($originalPath);
                        break;
                    case 'image/gif':
                        $image = imagecreatefromgif($originalPath);
                        break;
                    case 'image/webp':
                        $image = imagecreatefromwebp($originalPath);
                        break;
                    default:
                        \Log::error("Неподдерживаемый тип изображения: {$mimeType}");
                        return;
                }

                if (!$image) return;

                $originalWidth = imagesx($image);
                $originalHeight = imagesy($image);

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

                imagewebp($thumbnail, $destPath, 85);

                imagedestroy($image);
                imagedestroy($scaled);
                imagedestroy($thumbnail);
            }
        } catch (\Exception $e) {
            \Log::error("Ошибка создания {$folder}: " . $e->getMessage());
        }
    }

}