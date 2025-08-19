<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsTag;
use App\Models\NewsCategory;
use App\Models\PageList;
use App\Models\NewsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(string $locale, Request $request)
    {
        $query = News::query()->where('status', 1);
        
        $selectedTag = null;
        if ($request->has('tag') && $request->tag) {
            $selectedTag = NewsTag::find($request->tag);
            if ($selectedTag) {
                $query->whereHas('tags', function($q) use ($request) {
                    $q->where('tag.id', $request->tag);
                });
            }
        }
        
        $selectedCategory = null;
        if ($request->has('category') && $request->category) {
            $selectedCategory = NewsCategory::find($request->category);
            if ($selectedCategory) {
                $query->where('category_id', $request->category);
            }
        }

        $news = $query->orderBy('created_at', 'desc')
            ->paginate(9);
        
        $news->appends($request->query());
        $news->withPath(route('news', ['locale' => $locale]));

        $popularTags = NewsTag::withCount(['news' => function ($query) {
                $query->where('status', 1);
            }])
            ->having('news_count', '>', 0)
            ->orderBy('news_count', 'desc')
            ->take(8)
            ->get();

        $categories = NewsCategory::withCount(['news' => function ($query) {
                $query->where('status', 1);
            }])
            ->having('news_count', '>', 0)
            ->orderBy('news_count', 'desc')
            ->get();

        return view('news.index', compact('news', 'selectedTag', 'selectedCategory', 'popularTags', 'categories'));
    }

    public function show(string $locale, News $news)
    {
        $popularTags = NewsTag::withCount('news')
        ->having('news_count', '>', 0)
        ->orderBy('news_count', 'desc')
        ->take(8)
        ->get();

        $latestNews = News::where('status', 1)
        ->where('id', '!=', $news->id)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->select('id', 'alias', 'title_kk', 'title_ru', 'title_en', 'created_at')
        ->get();

        $comments = NewsComment::where('news_id', $news->id)
            ->where('is_approved', true)
            ->latest()
            ->get();

        return view('news.show', compact('news', 'popularTags', 'latestNews', 'comments'));
    }

    public function storeComment(Request $request, string $locale, News $news)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|max:1000',
            'g-recaptcha-response' => 'required|captcha'
        ], [
            'name.required' => __('Имя обязательно для заполнения'),
            'email.required' => __('Email обязателен для заполнения'),
            'email.email' => __('Некорректный email'),
            'comment.required' => __('Комментарий обязателен для заполнения'),
            'comment.max' => __('Комментарий не должен превышать 1000 символов'),
            'g-recaptcha-response.required' => __('Пройдите проверку капчи')
        ]);

        NewsComment::create([
            'news_id' => $news->id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment
        ]);

        return back()->with('success', __('Ваш комментарий отправлен на модерацию!'));
    }
}