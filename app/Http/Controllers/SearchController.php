<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Announcement;
use App\Models\Page;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(string $locale, Request $request)
    {
        $query = $request->get('q');
        
        if (!$query) {
            return view('search.index', [
                'query' => '',
                'news' => collect(),
                'announcements' => collect(),
                'pages' => collect()
            ]);
        }

        $news = News::where('status', 1)
            ->where(function($q) use ($query) {
                $q->where('title_' . app()->getLocale(), 'LIKE', "%{$query}%")
                  ->orWhere('content_' . app()->getLocale(), 'LIKE', "%{$query}%");
            })
            ->limit(10)
            ->get();

        $announcements = Announcement::where('status', 1)
            ->where('language', app()->getLocale())
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%")
                  ->orWhere('content', 'LIKE', "%{$query}%");
            })
            ->limit(10)
            ->get();

        $pages = Page::where('active', true)
            ->where(function($q) use ($query) {
                $q->where('title_' . app()->getLocale(), 'LIKE', "%{$query}%")
                  ->orWhere('content_' . app()->getLocale(), 'LIKE', "%{$query}%");
            })
            ->limit(10)
            ->get();

        return view('search.index', compact('query', 'news', 'announcements', 'pages'));
    }
}