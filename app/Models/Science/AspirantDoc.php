<?php

namespace App\Models\Science;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AspirantDoc extends Model
{
    protected $table = 'aspirant_docs';

    public $timestamps = false;

    protected $fillable = [
        'name_kz',
        'name_ru',
        'name_en',
        'aspirant_id',
        'filename',
        'created_at'
    ];

    protected $casts = [
        'created_at' => 'integer',
    ];

    /**
     * Получить название на текущем языке
     */
    public function getNameAttribute(): string
    {
        $locale = app()->getLocale();
        $locale = $locale === 'kk' ? 'kz' : $locale;
        return $this->{"name_{$locale}"} ?? $this->name_ru;
    }

    /**
     * Получить URL файла
     */
    public function getFileUrlAttribute(): ?string
    {
        if (!$this->filename) {
            return null;
        }

        return asset('storage/aspirant-docs/' . $this->filename);
    }

    /**
     * Получить расширение файла
     */
    public function getFileExtensionAttribute(): string
    {
        if (!$this->filename) {
            return '';
        }

        return strtolower(pathinfo($this->filename, PATHINFO_EXTENSION));
    }

    /**
     * Проверить является ли файл PDF
     */
    public function getIsPdfAttribute(): bool
    {
        return $this->file_extension === 'pdf';
    }

    /**
     * Проверить является ли файл DOC/DOCX
     */
    public function getIsDocAttribute(): bool
    {
        return in_array($this->file_extension, ['doc', 'docx']);
    }

    /**
     * Связь с соискателем
     */
    public function aspirant(): BelongsTo
    {
        return $this->belongsTo(Aspirant::class, 'aspirant_id');
    }
}