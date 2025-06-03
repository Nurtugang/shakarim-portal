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
         'about_us', 
         'task', 
         'main_activities', 
         'target', 
         'additionally', 
         'structure_id'
    ];
}
