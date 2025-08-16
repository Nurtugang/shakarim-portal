<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RectorQuestion extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone', 
        'question',
        'answer',
        'is_answered',
        'is_published'
    ];

    protected $casts = [
        'is_answered' => 'boolean',
        'is_published' => 'boolean'
    ];

    public function getFormattedDate()
    {
        return $this->created_at->translatedFormat('d F Y');
    }
}