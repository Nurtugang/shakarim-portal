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
}