<?php

namespace App\Models\Science;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aspirant extends Model
{
    protected $table = 'aspirants';

    public $timestamps = false;

    protected $fillable = [
        'fullname',
        'created_at'
    ];

    protected $casts = [
        'created_at' => 'integer',
    ];

    /**
     * Получить дату создания в формате Carbon
     */
    public function getCreatedDateAttribute()
    {
        return $this->created_at ? \Carbon\Carbon::createFromTimestamp($this->created_at) : null;
    }

    /**
     * Получить форматированную дату
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->created_date ? $this->created_date->format('d.m.Y') : '';
    }

    /**
     * Связь с документами
     */
    public function documents(): HasMany
    {
        return $this->hasMany(AspirantDoc::class, 'aspirant_id');
    }
}