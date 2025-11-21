<?php

namespace App\Models;

use App\Enums\EducationLevelEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EducationalProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_group_id',
        'code',
        'name_kk',
        'name_ru',
        'name_en',
        'accreditation_status_kk',
        'accreditation_status_ru',
        'accreditation_status_en',
        'epvo_url',
        'accreditation_file_kk',
        'accreditation_file_ru',
        'accreditation_file_en',
        'education_level',
        'is_active',
    ];

    protected $casts = [
        'education_level' => EducationLevelEnum::class,
        'is_active' => 'boolean',
    ];

    public function programGroup(): BelongsTo
    {
        return $this->belongsTo(EducationalProgramGroup::class, 'program_group_id');
    }
}
