<?php

namespace App\Models;

use App\Enums\EducationLevelEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EducationalProgramGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'direction_classification_id',
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

    public function directionClassification(): BelongsTo
    {
        return $this->belongsTo(DirectionClassification::class);
    }

    public function programs(): HasMany
    {
        return $this->hasMany(EducationalProgram::class, 'program_group_id');
    }
}
