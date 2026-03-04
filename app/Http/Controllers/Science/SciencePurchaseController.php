<?php

namespace App\Http\Controllers\Science;

use App\Http\Controllers\Controller;
use App\Models\Science\SciencePurchase;
use App\Models\Science\SciencePurchasesIrn;
use App\Models\SciencePurchases;
use Illuminate\Http\Request;

class SciencePurchaseController extends Controller
{
    public function index()
    {

        $data = SciencePurchasesIrn::query()
            ->where('is_visible', true)
            ->with(['sciencePurchases' => function($query) {
                $query->where('is_visible', true);
            }])->orderBy('id','desc')->get();

    //    dd($data);

        return view('science.purchase.index',[
            'data' => $data
        ]);
    }
}
