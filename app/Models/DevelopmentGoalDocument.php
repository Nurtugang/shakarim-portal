<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DevelopmentGoalDocument extends Model
{
    use HasFactory;

    protected $table = 'development_goals_documents';

    protected $fillable = [
        'language',
        'title',
        'path',
        'type',
    ];

    protected $casts = [
        'type' => 'integer',
    ];

    // Document types
    const TYPE_DOCUMENT = 1; // Regular document
    const TYPE_REPORT = 2;   // Report

    /**
     * Scope для фильтрации по языку
     */
    public function scopeInLanguage(Builder $query, string $language): Builder
    {
        return $query->where('language', $language);
    }

    /**
     * Scope для фильтрации по типу
     */
    public function scopeOfType(Builder $query, int $type): Builder
    {
        return $query->where('type', $type);
    }

    /**
     * Scope для документов
     */
    public function scopeDocuments(Builder $query): Builder
    {
        return $query->where('type', self::TYPE_DOCUMENT);
    }

    /**
     * Scope для отчетов
     */
    public function scopeReports(Builder $query): Builder
    {
        return $query->where('type', self::TYPE_REPORT);
    }

    /**
     * Получить полный URL документа
     */
    public function getFileUrl(): string
    {
        return asset('storage/dev_documents/' . $this->path);
    }

    /**
     * Проверка, является ли документ отчетом
     */
    public function isReport(): bool
    {
        return $this->type === self::TYPE_REPORT;
    }

    /**
     * Проверка, является ли обычным документом
     */
    public function isDocument(): bool
    {
        return $this->type === self::TYPE_DOCUMENT;
    }

    /**
     * Получить тип документа в виде строки
     */
    public function getTypeNameAttribute(): string
    {
        return $this->type === self::TYPE_REPORT ? 'report' : 'document';
    }
}