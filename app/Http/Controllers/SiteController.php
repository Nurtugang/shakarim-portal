<?php

namespace App\Http\Controllers;

use App\Models\TextWidget;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __invoke()
    {
        $news = \App\Models\News::select('id', 'title_'.app()->getLocale(), 'content_'.app()->getLocale(),'image', 'alias', 'date' )
            ->orderBy('id', 'desc')
            ->where('status', 1)
            ->limit(3)
            ->get();

        $events = \App\Models\Event::orderBy('start_date')
            ->where('active', true)
            ->limit(3)
            ->get();
        
        // Фильтруем объявления по текущей локали
        $announcements = \App\Models\Announcement::where('status', 1)
            ->where('language', app()->getLocale())
            ->orderBy('date', 'desc')
            ->limit(3)
            ->get();

        $slider = TextWidget::query()->where('key','slider')->first();
        
        return view('site.index', compact('news','events', 'announcements','slider'));
    }
}