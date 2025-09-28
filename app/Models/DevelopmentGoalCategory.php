<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DevelopmentGoalCategory extends Model
{
    use HasFactory;

    protected $table = 'development_goal_categories';

    protected $fillable = [
        'title_kk',
        'title_ru',
        'title_en',
    ];

    /**
     * Получить цели развития этой категории
     */
    public function developmentGoals(): HasMany
    {
        return $this->hasMany(DevelopmentGoal::class, 'category_id');
    }

    /**
     * Получить цели развития с сортировкой по позиции
     */
    public function developmentGoalsOrdered(): HasMany
    {
        return $this->hasMany(DevelopmentGoal::class, 'category_id')
                    ->orderBy('position');
    }

    /**
     * Получить цели развития для конкретного языка
     */
    public function developmentGoalsByLanguage(string $language): HasMany
    {
        return $this->hasMany(DevelopmentGoal::class, 'category_id')
                    ->where('language', $language)
                    ->orderBy('position');
    }

    /**
     * Получить заголовок на текущем языке
     */
    public function getLocalizedTitle(string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        
        return match ($locale) {
            'kk' => $this->title_kk,
            'en' => $this->title_en,
            default => $this->title_ru,
        };
    }

    /**
     * Scope для получения категорий с целями на определенном языке
     */
    public function scopeWithGoalsInLanguage($query, string $language)
    {
        return $query->with(['developmentGoals' => function ($query) use ($language) {
            $query->where('language', $language)->orderBy('position');
        }]);
    }
}