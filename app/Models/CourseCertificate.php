<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CourseCertificate extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'filename'];

    public function getFileUrl(): ?string
    {
        if (!$this->filename) {
            return null;
        }
        return Storage::url($this->filename);
    }
}