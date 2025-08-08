<?php

namespace App\Http\Controllers;

use App\Models\TextWidget;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $news = \App\Models\News::orderBy('created_at', 'desc')
            ->where('status', 1)
            ->limit(5)
            ->get();

        $events = \App\Models\Event::orderBy('start_date')
            ->where('active', true)
            ->limit(3)
            ->get();

        $welcome = TextWidget::query()->where('key','welcome')->first();
        $card = TextWidget::query()->where('key','card')->first();
        $schools = TextWidget::query()->where('key','schools')->first();

        return view('site.index', compact('news','events','welcome','card','schools'));
    }
}