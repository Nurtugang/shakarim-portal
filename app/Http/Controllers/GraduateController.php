<?php

namespace App\Http\Controllers;

use App\Models\Graduate;

class GraduateController extends Controller
{
    public function index(string $locale = null)
    {
        $graduates = Graduate::orderBy('academic_year', 'desc')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('academic_year');

        return view('graduates.index', [
            'graduatesByYear' => $graduates,
            'locale' => app()->getLocale(),
        ]);
    }
}
