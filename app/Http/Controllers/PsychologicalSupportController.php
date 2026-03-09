<?php

namespace App\Http\Controllers;

use App\Models\Structure;

class PsychologicalSupportController extends Controller
{
    public function index($locale)
    {
        $structure = Structure::where('slug', 'psychological-support-service')
            ->with(['filteredData', 'employees' => function ($query) {
                $query->where('is_active', true)->orderBy('sort');
            }])
            ->firstOrFail();

        return view('university.psychological-support.index', compact('structure'));
    }
}