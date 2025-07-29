<?php

namespace App\Models\Science;

use Illuminate\Database\Eloquent\Model;

class SciencePurchasesIrn extends Model
{
    protected $fillable = [
        'name',
    ];

    public function sciencePurchases(){
        return $this->hasMany(SciencePurchase::class,"irn_id","id");
    }
}
