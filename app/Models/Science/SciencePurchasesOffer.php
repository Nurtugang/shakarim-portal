<?php

namespace App\Models\Science;

use Illuminate\Database\Eloquent\Model;

class SciencePurchasesOffer extends Model
{
    protected $fillable = [
        'purchase_id',
        'organization',
        'head',
        'contact',
        'filename'
    ];

    public function getFile(){
        return asset('storage/purchase_offers/'.$this->filename);
    }

    public function purchase()
    {
        return $this->belongsTo(SciencePurchase::class, 'purchase_id');
    }
}
