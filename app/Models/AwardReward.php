<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AwardReward extends Model
{
    protected $fillable = ['award_category_id', 'name_kk', 'name_ru', 'name_en', 'name_cn'];

    public function getNameAttribute(): ?string
    {
        $locale = app()->getLocale();
        $column = "name_{$locale}";
        return $this->{$column} ?? $this->name_ru ?? $this->name_kk;
    }
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(AwardCategory::class, 'award_category_id');
    }
}