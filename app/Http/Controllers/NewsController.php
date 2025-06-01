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

        $news = News::query()->where('active',true)->orderBy('published_at','desc')->paginate(12);

        return view('news.index',compact('news'));
    }

    public function show(string $locale, News $news)
    {
        return view('news.show', compact('news'));
    }
}
