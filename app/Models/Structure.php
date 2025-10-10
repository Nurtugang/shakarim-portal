<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    protected $fillable = [
        'title_kk',
        'title_ru',
        'title_en',
        'slug',
        'parent_id',
        'sort_order',
        'position',
        'layout_type',
        'active',
        'is_structure',
        'link'
    ];

    public function children()
    {
        return $this->hasMany(Structure::class, 'parent_id')
        ->where('active', true)
        ->where('is_structure',true)
        ->orderBy('sort_order');
    }
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function parent()
    {
        return $this->belongsTo(Structure::class, 'parent_id');
    }

    public function data()
    {
        return $this->hasMany(StructureData::class);
    }

    public function filteredData()
{
    return $this->hasOne(StructureData::class)->where('lang', app()->getLocale());
}

    public function employees()
    {
        return $this->hasMany(StructureEmployees::class);
    }

    public function getUrl()
    {
        if (!empty($this->link)) {
            if (filter_var($this->link, FILTER_VALIDATE_URL)) {
                return $this->link;
            }
            return url(app()->getLocale() . '/' . ltrim($this->link, '/'));
        }

        if (empty($this->slug)) {
            return '#';
        }
        return route('structure.show', ['locale' => app()->getLocale(), 'structure' => $this->slug]);
    }

    /**
     * Проверяет, является ли ссылка внешней.
     * @return bool
     */
    public function isExternalLink(): bool
    {
        return !empty($this->link) && filter_var($this->link, FILTER_VALIDATE_URL);
    }
}
