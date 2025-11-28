<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function __invoke()
    {
        $sliderNews = \App\Models\News::query()
            ->select('id', 'title_'.app()->getLocale(), 'image', 'alias')
            ->active()
            ->inSlider()
            ->take(5)
            ->get();

        $news = \App\Models\News::select('id', 'title_'.app()->getLocale(), 'content_'.app()->getLocale(),'image', 'alias', 'date' )
            ->orderBy('id', 'desc')
            ->where('status', 1)
            ->limit(4)
            ->get();

        $announcements = \App\Models\Announcement::where('status', 1)
            ->where('language', app()->getLocale())
            ->orderBy('date', 'desc')
            ->limit(4)
            ->get();

        return view('site.index', compact('sliderNews','news', 'announcements'));
    }
}
