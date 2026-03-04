<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicReception extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone', 
        'message',
        'response',
        'is_processed',
        'is_published'
    ];

    protected $casts = [
        'is_processed' => 'boolean',
        'is_published' => 'boolean'
    ];

    public function getFormattedDate()
    {
        return $this->created_at->translatedFormat('d F Y');
    }
}
