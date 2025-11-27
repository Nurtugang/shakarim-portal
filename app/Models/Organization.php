<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Organization extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_kk',
        'name_ru',
        'name_en',
        'dean_kk',
        'dean_ru',
        'dean_en',
        'target_kk',
        'target_ru',
        'target_en',
        'phone',
        'dean_image',
        'insta',
        'image',
        'category_id',
    ];

    /**
     * Get the full URL for the organization image.
     *
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        if (!$this->image) {
            return null;
        }

        return Storage::url($this->image);
    }

    /**
     * Get the full path for the organization image.
     *
     * @return string|null
     */
    public function getImagePath(): ?string
    {
        if (!$this->image) {
            return null;
        }

        return storage_path('app/public/organizations/' . $this->image);
    }

    /**
     * Get the full URL for the dean image.
     *
     * @return string|null
     */
    public function getDeanImageUrl(): ?string
    {
        if (!$this->dean_image) {
            return null;
        }

        return Storage::url($this->dean_image);
    }

    /**
     * Get the full path for the dean image.
     *
     * @return string|null
     */
    public function getDeanImagePath(): ?string
    {
        if (!$this->dean_image) {
            return null;
        }

        return storage_path('app/public/organizations/' . $this->dean_image);
    }

    /**
     * Check if organization has an image.
     *
     * @return bool
     */
    public function hasImage(): bool
    {
        return !empty($this->image);
    }

    /**
     * Check if organization has a dean image.
     *
     * @return bool
     */
    public function hasDeanImage(): bool
    {
        return !empty($this->dean_image);
    }
}