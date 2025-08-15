<?php

namespace App\Http\Controllers\Science;

use App\Http\Controllers\Controller;

class ScienceJournalsController extends Controller
{
    public function index()
    {
        return view('science.journals.index');
    }
}
