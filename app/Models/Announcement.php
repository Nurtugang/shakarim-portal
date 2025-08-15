<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $table = 'announcement';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'content',
        'language',
        'date',
        'alias',
        'image',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'date' => 'integer',
        'status' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'created_at' => 'integer',
        'updated_at' => 'integer'
    ];
}