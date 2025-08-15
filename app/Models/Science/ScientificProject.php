<?php

namespace App\Models\Science;

use Illuminate\Database\Eloquent\Model;

class ScientificProject extends Model
{
    protected $table = 'scientific_projects';
    
    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'supervisor_kk',
        'supervisor_ru', 
        'supervisor_en',
        'name_kk',
        'relevance_kk',
        'target_kk',
        'expectation_kk',
        'years',
        'month',
        'name_ru',
        'name_en',
        'relevance_ru',
        'relevance_en',
        'target_ru',
        'target_en',
        'expectation_ru',
        'expectation_en',
        'result_kk',
        'result_ru',
        'result_en',
        'updated_at',
        'created_at'
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    /**
     * Get localized name based on current app locale
     */
    public function getLocalizedNameAttribute()
    {
        $locale = app()->getLocale();
        
        switch ($locale) {
            case 'kk':
            case 'kz':
                return $this->name_kk;
            case 'en':
                return $this->name_en ?: $this->name_ru;
            default:
                return $this->name_ru;
        }
    }

    /**
     * Get localized supervisor based on current app locale
     */
    public function getLocalizedSupervisorAttribute()
    {
        $locale = app()->getLocale();
        
        switch ($locale) {
            case 'kk':
            case 'kz':
                return $this->supervisor_kk;
            case 'en':
                return $this->supervisor_en ?: $this->supervisor_ru;
            default:
                return $this->supervisor_ru;
        }
    }

    /**
     * Get localized relevance based on current app locale
     */
    public function getLocalizedRelevanceAttribute()
    {
        $locale = app()->getLocale();
        
        switch ($locale) {
            case 'kk':
            case 'kz':
                return $this->relevance_kk;
            case 'en':
                return $this->relevance_en ?: $this->relevance_ru;
            default:
                return $this->relevance_ru;
        }
    }

    /**
     * Get localized target based on current app locale
     */
    public function getLocalizedTargetAttribute()
    {
        $locale = app()->getLocale();
        
        switch ($locale) {
            case 'kk':
            case 'kz':
                return $this->target_kk;
            case 'en':
                return $this->target_en ?: $this->target_ru;
            default:
                return $this->target_ru;
        }
    }

    /**
     * Get localized expectation based on current app locale
     */
    public function getLocalizedExpectationAttribute()
    {
        $locale = app()->getLocale();
        
        switch ($locale) {
            case 'kk':
            case 'kz':
                return $this->expectation_kk;
            case 'en':
                return $this->expectation_en ?: $this->expectation_ru;
            default:
                return $this->expectation_ru;
        }
    }

    /**
     * Get localized result based on current app locale
     */
    public function getLocalizedResultAttribute()
    {
        $locale = app()->getLocale();
        
        switch ($locale) {
            case 'kk':
            case 'kz':
                return $this->result_kk;
            case 'en':
                return $this->result_en ?: $this->result_ru;
            default:
                return $this->result_ru;
        }
    }

    /**
     * Scope to get projects by year
     */
    public function scopeByYear($query, $year)
    {
        return $query->where('years', $year);
    }

    /**
     * Get all unique years
     */
    public static function getUniqueYears()
    {
        return static::select('years')
            ->distinct()
            ->orderBy('years', 'desc')
            ->pluck('years')
            ->toArray();
    }

    /**
     * Group projects by years
     */
    public static function getProjectsGroupedByYears()
    {
        return static::orderBy('years', 'desc')
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('years');
    }
}