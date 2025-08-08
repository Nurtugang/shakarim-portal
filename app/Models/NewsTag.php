<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class NewsTag extends Model
{
    protected $table = 'tag';

    protected $fillable = [
        'name',
        'frequency'
    ];

    public $timestamps = false;

    /**
     * Новости с этим тегом
     */
    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'news_tag_assn', 'tag_id', 'news_id')
            ->withPivot('ord');
    }
}