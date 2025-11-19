<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname_kk','fullname_ru','fullname_en','fullname_cn',
        'position_kk','position_ru','position_en','position_cn',
        'content_kk','content_ru','content_en','content_cn',
        'content2_kk','content2_ru','content2_en','content2_cn',
        'content3_kk','content3_ru','content3_en','content3_cn',
        'photo', 'category_id'
    ];

    protected $appends = ['photo_url'];

    public function getPhotoUrlAttribute(): ?string
    {
        return $this->photo ? Storage::url($this->photo) : null;
    }

    public function category()
    {
        return $this->belongsTo(BoardCategory::class, 'category_id');
    }

    /**
     * Возвращает ФИО на текущем языке с фолбэком на русский
     */
    public function getFullnameAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{'fullname_' . $locale} ?? $this->fullname_ru;
    }

    /**
     * Возвращает Должность на текущем языке с фолбэком на русский
     */
    public function getPositionAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{'position_' . $locale} ?? $this->position_ru;
    }

    /**
     * Возвращает Контент 1 на текущем языке с фолбэком на русский
     */
    public function getContentAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{'content_' . $locale} ?? $this->content_ru;
    }

    /**
     * Возвращает Контент 2 на текущем языке с фолбэком на русский
     */
    public function getContent2Attribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{'content2_' . $locale} ?? $this->content2_ru;
    }

    /**
     * Возвращает Контент 3 на текущем языке с фолбэком на русский
     */
    public function getContent3Attribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{'content3_' . $locale} ?? $this->content3_ru;
    }
}