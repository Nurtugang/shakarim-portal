<?php

namespace App\Http\Controllers\Science;

use App\Http\Controllers\Controller;
use App\Models\Science\Aspirant;

class AspirantController extends Controller
{
    public function index()
    {
        $aspirants = Aspirant::with('documents')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('science.aspirants.index', compact('aspirants'));
    }
}