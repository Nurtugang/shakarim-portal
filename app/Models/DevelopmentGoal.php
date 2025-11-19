<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DevelopmentGoal extends Model
{
    use HasFactory;

    protected $table = 'development_goals';

    protected $fillable = [
        'language',
        'title',
        'content',
        'thumbnail',
        'position',
    ];

    protected $casts = [
        'position' => 'integer',
    ];

    

    /**
     * Scope для фильтрации по языку
     */
    public function scopeInLanguage(Builder $query, string $language): Builder
    {
        return $query->where('language', $language);
    }


    /**
     * Scope для сортировки по позиции
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('position');
    }

    

    /**
     * Получить URL для миниатюры
     */
    public function getThumbnailUrl(): ?string
    {
        if (!$this->thumbnail) {
            return null;
        }

        return asset('storage/dev_goals/' . $this->thumbnail);
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
        return self::where('language', $this->language)
                   ->where('position', '>', $this->position)
                   ->orderBy('position')
                   ->first();
    }

    /**
     * Получить предыдущую цель в той же категории
     */
    public function getPreviousGoal(): ?self
    {
        return self::where('language', $this->language)
                   ->where('position', '<', $this->position)
                   ->orderBy('position', 'desc')
                   ->first();
    }

    /**
     * Связь с образовательными программами
     */
    public function educationPrograms(): HasMany
    {
        return $this->hasMany(DevelopmentGoalEducation::class, 'development_goal_id');
    }

    /**
     * Получить образовательные программы для текущего языка
     */
    public function getEducationProgramsForLanguage(string $language)
    {
        return $this->educationPrograms()->where('language', $language)->get();
    }

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'development_goal_news');
    }

}