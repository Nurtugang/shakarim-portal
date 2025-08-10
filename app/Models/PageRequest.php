<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageRequest extends Model
{
    protected $fillable = ['page_id', 'data'];

    protected $casts = [
        'data' => 'array',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
