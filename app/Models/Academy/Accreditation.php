<?php

namespace App\Models\Academy;

use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    protected $table = 'accreditation';
    
    public $timestamps = false;

    protected $fillable = [
        'name',
        'organ',
        'accredited',
        'type',
        'certificate',
        'language',
        'start',
        'end',
        'filename',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'accredited' => 'boolean',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'start' => 'timestamp',
        'end' => 'timestamp',
    ];

    /**
     * Get certificate image URL
     */
    public function getCertificateUrlAttribute()
    {
        if ($this->certificate) {
            return asset('storage/certificates/' . $this->certificate);
        }
        return null;
    }

    /**
     * Scope to get accreditations by current locale
     */
    public function scopeForCurrentLocale($query)
    {
        $locale = app()->getLocale();
        
        if ($locale === 'kz') {
            $locale = 'kk';
        }
        
        return $query->where('language', $locale);
    }


    /**
     * Get accreditations grouped by organ for current locale
     */
    public static function getGroupedByOrgan()
    {
        return static::forCurrentLocale()
            ->orderBy('organ')
            ->orderBy('type')
            ->orderBy('name')
            ->get()
            ->groupBy('organ');
    }

    /**
     * Get unique organs for current locale
     */
    public static function getUniqueOrgans()
    {
        return static::forCurrentLocale()
            ->select('organ')
            ->distinct()
            ->whereNotNull('organ')
            ->orderBy('organ')
            ->pluck('organ')
            ->toArray();
    }

    /**
     * Get unique types for current locale
     */
    public static function getUniqueTypes()
    {
        return static::forCurrentLocale()
            ->select('type')
            ->distinct()
            ->orderBy('type')
            ->pluck('type')
            ->toArray();
    }

    /**
     * Get statistics for current locale
     */
    public static function getStatistics()
    {
        $accreditations = static::forCurrentLocale()->get();
        
        return [
            'total' => $accreditations->count(),
            'accredited' => $accreditations->where('accredited', true)->count(),
            'organs' => $accreditations->pluck('organ')->unique()->count(),
            'types' => $accreditations->pluck('type')->unique()->count(),
            'bachelor' => $accreditations->where('type', 'Bachelor')->count(),
            'master' => $accreditations->where('type', 'Magistracy')->count(),
            'doctorate' => $accreditations->where('type', 'Doctorate')->count(),
        ];
    }

    /**
     * Get type display name for current locale
     */
    public function getTypeDisplayAttribute()
    {
        $locale = app()->getLocale();
        
        $typeMap = [
            'ru' => [
                'Бакалавриат' => 'Бакалавриат',
                'Магистратура' => 'Магистратура', 
                'Докторантура' => 'Докторантура'
            ],
            'kk' => [
                'Бакалавриат' => 'Бакалавриат',
                'Магистратура' => 'Магистратура',
                'Докторантура' => 'Докторантура'
            ],
            'en' => [
                'Бакалавриат' => 'Bachelor',
                'Магистратура' => 'Master',
                'Докторантура' => 'Doctorate'
            ]
        ];
        
        return $typeMap[$locale][$this->type] ?? $this->type;
    }

    /**
     * Check if accreditation is currently valid
     */
    public function getIsValidAttribute()
    {
        if (!$this->end) {
            return true;
        }
        
        return time() <= $this->end;
    }

    /**
     * Get formatted validity period
     */
    public function getValidityPeriodAttribute()
    {
        if ($this->start && $this->end) {
            return date('Y', $this->start) . ' - ' . date('Y', $this->end);
        } elseif ($this->start) {
            return __('с') . ' ' . date('Y', $this->start);
        }
        
        return null;
    }
}