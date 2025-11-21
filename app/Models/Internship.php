<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Internship extends Model
{
    use HasFactory;

    protected $table = 'internships';

    protected $fillable = [
        'faculty_id',
        'document_kk',
        'document_ru',
        'document_en',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    
    public function getDocumentKkUrlAttribute(): ?string
    {
        return $this->document_kk ? Storage::url($this->document_kk) : null;
    }

    public function getDocumentRuUrlAttribute(): ?string
    {
        return $this->document_ru ? Storage::url($this->document_ru) : null;
    }

    public function getDocumentEnUrlAttribute(): ?string
    {
        return $this->document_en ? Storage::url($this->document_en) : null;
    }
}