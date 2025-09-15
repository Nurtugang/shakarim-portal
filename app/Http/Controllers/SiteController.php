<?php

namespace App\Http\Controllers;

use App\Models\TextWidget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        
        $announcements = \App\Models\Announcement::where('status', 1)
            ->where('language', app()->getLocale())
            ->orderBy('date', 'desc')
            ->limit(3)
            ->get();

        $welcome = TextWidget::query()->where('key','welcome')->first();
        $card = TextWidget::query()->where('key','card')->first();
        $schools = TextWidget::query()->where('key','schools')->first();

        $connection = DB::connection('nitro');
        $results = $connection->select('SELECT COUNT(*) AS total FROM students WHERE isStudent = 1');
        $students_count = $results[0]->total;

        return view('site.index', compact('news','events','welcome','card','schools', 'announcements', 'students_count'));
    }
}