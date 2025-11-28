<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AwardCategory extends Model
{
    protected $fillable = ['name_kk', 'name_ru', 'name_en', 'name_cn'];

    public function getNameAttribute(): ?string
    {
        $locale = app()->getLocale();
        $column = "name_{$locale}";
        return $this->{$column} ?? $this->name_ru ?? $this->name_kk;
    }

    public function rewards()
    {
        return $this->hasMany(AwardReward::class);
    }
}