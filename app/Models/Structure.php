<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    protected $fillable = [
        'title_kk',
        'title_ru',
        'title_kk',
        'slug',
        'parent_id',
        'position',
        'active',
    ];

    public function children()
    {
        return $this->hasMany(Structure::class, 'parent_id');
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
        return route('structure.show', ['locale' => app()->getLocale(),'structure' => $this->slug]);
    }
}
