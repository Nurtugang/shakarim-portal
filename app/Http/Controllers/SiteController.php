<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache; 

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

        $stats = Cache::remember('hubm_student_stats', 60 * 60, function () {
            try {
                $url = env('HUBM_API_URL') . '/' . env('HUBM_STATS_ENDPOINT');
                
                $response = Http::timeout(3)->get($url, [
                    'token' => env('HUBM_API_TOKEN')
                ]);

                if ($response->successful() && $response->json('status') === 'success') {
                    return $response->json('data');
                }
            } catch (\Exception $e) {
                \Log::error($e->getMessage());
                return null;
            }
            return null;
        });

        $regularStudents = $stats['regular_students'] ?? 0;

        return view('site.index', compact('sliderNews','news', 'announcements', 'regularStudents'));
    }
}
