<?php

namespace App\Models\Science;

use App\Enums\SciencePurchasesEnum;
use Illuminate\Database\Eloquent\Model;

class SciencePurchase extends Model
{
    protected $fillable = [
        'irn_id',
        'name_kk',
        'name_ru',
        'name_en',
        'description_kk',
        'description_ru',
        'description_en',
        'justification_kk',
        'justification_ru',
        'justification_en',
        'price',
        'deadlines_kk',
        'deadlines_ru',
        'deadlines_en',
        'payment_terms',
        'contacts',
        'status'
    ];

    protected $casts = [
        'status' => SciencePurchasesEnum::class
    ];

    public function irn(){
        return $this->belongsTo(SciencePurchasesIrn::class,"irn_id","id");
    }

    public function offers(){
        return $this->hasMany(SciencePurchasesOffer::class,"purchase_id","id");
    }
}
