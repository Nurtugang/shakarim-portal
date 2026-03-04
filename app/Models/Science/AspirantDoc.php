<?php

namespace App\Models\Science;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AspirantDoc extends Model
{
    protected $table = 'aspirant_docs';

    public $timestamps = false;

    protected $fillable = [
        'name_kk',
        'name_ru',
        'name_en',
        'name_cn',
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
     * Получить форматированную дату
     */
    public function getFormattedDateAttribute(): string
    {
        if (!$this->created_at) {
            return '';
        }

        return \Carbon\Carbon::createFromTimestamp($this->created_at)->format('d.m.Y');
    }

    /**
     * Связь с соискателем
     */
    public function aspirant(): BelongsTo
    {
        return $this->belongsTo(Aspirant::class, 'aspirant_id');
    }
}