<?php

namespace App\Models\Science;

use Illuminate\Database\Eloquent\Model;

class SciencePurchasesIrn extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function sciencePurchases(){
        return $this->hasMany(SciencePurchase::class,"irn_id","id");
    }
}
