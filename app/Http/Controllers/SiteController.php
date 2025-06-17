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

        $news = \App\Models\News::orderBy('created_at', 'desc')->where('active',true)->limit(5)->get();

        $events = \App\Models\Event::orderBy('start_date')->where('active',true)->limit(3)->get();

        $welcome = TextWidget::query()->where('key','welcome')->first();
         $card = TextWidget::query()->where('key','card')->first();

    //   dd($welcome);
    //dd($welcome->{'content_kk'});

        return view('site.index', compact('news','events','welcome','card'));
    }
}
