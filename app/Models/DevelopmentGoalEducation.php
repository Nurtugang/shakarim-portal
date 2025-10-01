<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class DevelopmentGoalEducation extends Model
{
    use HasFactory;

    protected $table = 'development_goals_education';

    protected $fillable = [
        'development_goal_id',
        'language',
        'op',
        'link',
    ];

    /**
     * Связь с целью развития
     */
    public function developmentGoal(): BelongsTo
    {
        return $this->belongsTo(DevelopmentGoal::class, 'development_goal_id');
    }

    /**
     * Scope для фильтрации по языку
     */
    public function scopeInLanguage(Builder $query, string $language): Builder
    {
        return $query->where('language', $language);
    }

    /**
     * Scope для получения с целями развития
     */
    public function scopeWithGoal(Builder $query): Builder
    {
        return $query->with('developmentGoal');
    }

    /**
     * Получить образовательные программы, сгруппированные по целям
     */
    public static function getGroupedByGoals(string $language)
    {
        return self::with('developmentGoal')
            ->inLanguage($language)
            ->get()
            ->groupBy('development_goal_id')
            ->map(function ($items) {
                return [
                    'goal' => $items->first()->developmentGoal,
                    'programs' => $items
                ];
            });
    }
}