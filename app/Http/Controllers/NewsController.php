<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\PageList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(string $locale)
    {
        $news = News::query()
            ->where('status', 1)
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        $news->withPath(route('news', ['locale' => $locale]));

        return view('news.index', compact('news'));
    }

    public function show(string $locale, News $news)
    {
        return view('news.show', compact('news'));
    }
}