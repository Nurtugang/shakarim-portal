<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StructureData extends Model
{
    protected $fillable = [
         'lang', 
         'leader_name', 
         'image', 
         'leader_position', 
         'address', 
         'cabinet', 
         'phone', 
         'phone_2', 
         'email', 
         'main_activities',
         'structure_id',
         'data'
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function getPhoto()
    {
        return asset('storage/' . $this->image);
    }
}
