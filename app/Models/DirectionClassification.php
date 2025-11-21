<?php

namespace App\Models;

use App\Enums\EducationLevelEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DirectionClassification extends Model
{
    use HasFactory;

    protected $fillable = [
        'education_field_id',
        'code',
        'name_kk',
        'name_ru',
        'name_en',
        'education_level',
        'is_active',
    ];

    protected $casts = [
        'education_level' => EducationLevelEnum::class,
        'is_active' => 'boolean',
    ];

    public function educationField(): BelongsTo
    {
        return $this->belongsTo(EducationField::class);
    }

    public function programGroups(): HasMany
    {
        return $this->hasMany(EducationalProgramGroup::class);
    }
}
