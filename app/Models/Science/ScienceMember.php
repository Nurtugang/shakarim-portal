<?php

namespace App\Models\Science;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScienceMember extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'science_members';

    /**
     * Indicates if the model should be timestamped.
     * В вашей схеме created_at и updated_at - это INT, а не TIMESTAMP.
     * Мы повторяем подход из модели ScientificProject, где timestamps отключены,
     * а поля обрабатываются через $casts.
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
        'fullname',
        'scopusid',
        'researcherid',
        'orcid',
        'additionally_kk',
        'additionally_ru',
        'additionally_en',
        'project_id',
        'updated_at',
        'created_at',
    ];

    /**
     * The attributes that should be cast.
     * Преобразуем целочисленные Unix-таймстемпы в объекты Carbon при доступе.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    /**
     * Отношение "принадлежит к": каждый участник связан с одним научным проектом.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(ScientificProject::class, 'project_id');
    }

    /**
     * Get localized "additionally" text based on current app locale.
     * Аксессор для получения локализованного дополнительного текста,
     * следуя стилю модели ScientificProject.
     */
    public function getLocalizedAdditionallyAttribute(): ?string
    {
        $locale = app()->getLocale();
        
        switch ($locale) {
            case 'kk':
                return $this->additionally_kk;
            case 'en':
                return $this->additionally_en ?: $this->additionally_ru; // Если нет английской версии, используется русская
            default:
                return $this->additionally_ru;
        }
    }
}