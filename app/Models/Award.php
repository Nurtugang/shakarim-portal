<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <--- ВАЖНО!
use Illuminate\Support\Facades\Storage;

class Award extends Model
{
    use HasFactory;

    protected $table = 'awards';

    public $timestamps = false;

    protected $fillable = [
        'award_category_id', // Мы решили оставить это поле для удобства фильтрации
        'award_reward_id',
        'position_kk', 'position_ru', 'position_en', 'position_cn',
        'fullname_kk', 'fullname_ru', 'fullname_en', 'fullname_cn',
        'year',
        'image',
        'sort',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    // --- ОБЯЗАТЕЛЬНЫЕ СВЯЗИ ДЛЯ FILAMENT ---

    // 1. Связь с категорией (без этого метода падает ошибка relationship null)
    public function category(): BelongsTo
    {
        return $this->belongsTo(AwardCategory::class, 'award_category_id');
    }

    // 2. Связь с видом награды (имя метода rewardData используется в ресурсе)
    public function rewardData(): BelongsTo
    {
        return $this->belongsTo(AwardReward::class, 'award_reward_id');
    }

    // --- ВСПОМОГАТЕЛЬНЫЕ МЕТОДЫ ---

    public function getImageUrl(): ?string
    {
        if (!$this->image) {
            return null;
        }
        return Storage::url($this->image);
    }

    // --- АКСЕССОРЫ ---

    public function getCategoryNameAttribute(): ?string
    {
        // Пытаемся взять из прямой связи, если нет - через награду
        return $this->category?->name ?? $this->rewardData?->category?->name;
    }

    public function getRewardAttribute(): ?string
    {
        return $this->rewardData?->name;
    }

    public function getPositionAttribute(): ?string
    {
        $locale = app()->getLocale();
        $column = "position_{$locale}";
        return $this->{$column} ?? $this->position_ru ?? $this->position_kk;
    }

    public function getFullnameAttribute(): ?string
    {
        $locale = app()->getLocale();
        $column = "fullname_{$locale}";
        return $this->{$column} ?? $this->fullname_ru ?? $this->fullname_kk;
    }
}