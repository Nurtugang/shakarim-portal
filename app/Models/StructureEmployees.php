<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StructureEmployees extends Model
{
    protected $fillable = [

    ];

    public function getPhoto()
    {
        if (!$this->image) {
            return '/img/no-user-photo.webp';
        }
        return '/storage/' . $this->image;
    }
}
