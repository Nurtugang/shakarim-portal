<?php

namespace App\Http\Controllers;

use App\Models\Minor;
use Illuminate\Http\Request;

class MinorController extends Controller
{
    public function index(string $locale, Request $request)
    {
        $locale = $request->get('locale', app()->getLocale());
        
        $minors = Minor::where('language', $locale)->get();
        
        return view('minor.index', compact('minors', 'locale'));
    }
    
    public function show(string $locale, $id)
    {
        $minor = Minor::findOrFail($id);
        
        return view('minor.show', compact('minor'));
    }
}