<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'awards';

    /**
     * Indicates if the model should be timestamped with Laravel's default timestamps.
     * Мы используем integer, поэтому отключаем стандартное поведение.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_kk', 'category_ru', 'category_en', 'category_cn',
        'reward_kk', 'reward_ru', 'reward_en', 'reward_cn',
        'position_kk', 'position_ru', 'position_en', 'position_cn',
        'fullname_kk', 'fullname_ru', 'fullname_en', 'fullname_cn',
        'year',
        'image',
        'sort',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     * Преобразуем Unix-таймстемпы в объекты Carbon для удобной работы.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    // --- АКСЕССОРЫ ДЛЯ ЛОКАЛИЗАЦИИ ---

    /**
     * Получить локализованную категорию.
     */
    public function getCategoryAttribute(): ?string
    {
        $locale = app()->getLocale();
        $column = "category_{$locale}";
        return $this->{$column} ?? $this->category_ru ?? $this->category_kk;
    }

    /**
     * Получить локализованную награду.
     */
    public function getRewardAttribute(): ?string
    {
        $locale = app()->getLocale();
        $column = "reward_{$locale}";
        return $this->{$column} ?? $this->reward_ru ?? $this->reward_kk;
    }

    /**
     * Получить локализованную должность.
     */
    public function getPositionAttribute(): ?string
    {
        $locale = app()->getLocale();
        $column = "position_{$locale}";
        return $this->{$column} ?? $this->position_ru ?? $this->position_kk;
    }

    /**
     * Получить локализованное полное имя.
     */
    public function getFullnameAttribute(): ?string
    {
        $locale = app()->getLocale();
        $column = "fullname_{$locale}";
        return $this->{$column} ?? $this->fullname_ru ?? $this->fullname_kk;
    }
}