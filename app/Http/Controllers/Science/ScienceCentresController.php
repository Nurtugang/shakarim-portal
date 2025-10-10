<?php

namespace App\Http\Controllers\Science;

use App\Http\Controllers\Controller;

class ScienceCentresController extends Controller
{
    public function index()
    {
        return view('science.centres.index');
    }
}
