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

        $data = SciencePurchasesIrn::query()->with('sciencePurchases')->orderBy('id','desc')->get();

    //    dd($data);

        return view('science.purchase.index',[
            'data' => $data
        ]);
    }
}
