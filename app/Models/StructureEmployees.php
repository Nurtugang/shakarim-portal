<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StructureEmployees extends Model
{
    protected $fillable = [
        'fullname_kk',
        'fullname_ru',
        'fullname_en',
        'position_kk',
        'position_ru',
        'position_en',
        'structure_id',
        'image',
        'is_active',
        'sort'
    ];

    public function getPhoto()
    {
        if (!$this->image) {
            return '/img/no-user-photo.webp';
        }
        return '/storage/' . $this->image;
    }

    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }   
}
