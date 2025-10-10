<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function science(string $locale, Request $request)
    {
        $locale = $request->get('locale', app()->getLocale());
        
        $organizations = Organization::where('category_id', 1)->get();
        
        return view('organization.index', compact('organizations', 'locale'));
    }
    
    public function social(string $locale, Request $request)
    {
        $locale = $request->get('locale', app()->getLocale());
        
        $organizations = Organization::where('category_id', 2)->get();
        
        return view('organization.index', compact('organizations', 'locale'));
    }
}