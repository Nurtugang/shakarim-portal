<?php

namespace App\Http\Controllers\Science;

use App\Http\Controllers\Controller;
use App\Models\Science\ScienceDissertation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScienceDissertationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $dissertationsByCategory = ScienceDissertation::all()->groupBy('category_kk');
        
        return view('science.dissertations.index', [
            'dissertationsByCategory' => $dissertationsByCategory,
        ]);
    }
}