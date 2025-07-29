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
        'bank_details',
        'price_offer',
        'filename'
    ];

    public function getFile(){
        return asset('storage/purchase_offers/'.$this->filename);
    }
}
