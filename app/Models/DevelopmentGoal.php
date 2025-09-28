<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class DevelopmentGoal extends Model
{
    use HasFactory;

    protected $table = 'development_goals';

    protected $fillable = [
        'language',
        'title',
        'content',
        'thumbnail',
        'category_id',
        'position',
    ];

    protected $casts = [
        'position' => 'integer',
        'category_id' => 'integer',
    ];

    /**
     * Получить категорию этой цели развития
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(DevelopmentGoalCategory::class, 'category_id');
    }

    /**
     * Scope для фильтрации по языку
     */
    public function scopeInLanguage(Builder $query, string $language): Builder
    {
        return $query->where('language', $language);
    }

    /**
     * Scope для фильтрации по категории
     */
    public function scopeInCategory(Builder $query, int $categoryId): Builder
    {
        return $query->where('category_id', $categoryId);
    }

    /**
     * Scope для сортировки по позиции
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('position');
    }

    /**
     * Scope для получения целей с категориями
     */
    public function scopeWithCategory(Builder $query): Builder
    {
        return $query->with('category');
    }

    /**
     * Получить URL для миниатюры
     */
    public function getThumbnailUrl(): ?string
    {
        if (!$this->thumbnail) {
            return null;
        }

        // Предполагаем, что миниатюры хранятся в storage/app/public/development_goals/
        return asset('storage/development_goals/' . $this->thumbnail);
    }

    /**
     * Получить краткое содержание (первые 150 символов)
     */
    public function getExcerpt(int $length = 150): string
    {
        return mb_strlen($this->content) > $length 
            ? mb_substr(strip_tags($this->content), 0, $length) . '...'
            : strip_tags($this->content);
    }

    /**
     * Scope для поиска по заголовку или содержанию
     */
    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(function ($query) use ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
        });
    }

    /**
     * Получить следующую цель в той же категории
     */
    public function getNextGoal(): ?self
    {
        return self::where('category_id', $this->category_id)
                   ->where('language', $this->language)
                   ->where('position', '>', $this->position)
                   ->orderBy('position')
                   ->first();
    }

    /**
     * Получить предыдущую цель в той же категории
     */
    public function getPreviousGoal(): ?self
    {
        return self::where('category_id', $this->category_id)
                   ->where('language', $this->language)
                   ->where('position', '<', $this->position)
                   ->orderBy('position', 'desc')
                   ->first();
    }
}