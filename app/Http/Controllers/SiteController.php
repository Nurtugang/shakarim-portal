<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {

        $news = \App\Models\News::orderBy('created_at', 'desc')->where('active',true)->limit(3)->get();

        $events = \App\Models\Event::orderBy('date')->where('active',true)->limit(3)->get();

        return view('site.index', compact('news','events'));
    }
}
