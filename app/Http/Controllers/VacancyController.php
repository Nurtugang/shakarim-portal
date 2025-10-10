<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index(string $locale)
    {
        $vacancies = Vacancy::where('language', $locale)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('vacancy.index', compact('vacancies'));
    }
    
    public function show(string $locale, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        
        return view('vacancy.show', compact('vacancy'));
    }
}