<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DashboardInfo extends Model
{
    protected $fillable = ['title', 'content', 'is_active'];
}
