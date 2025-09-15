<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsApiController extends Controller
{
    /**
     * Получить 5 последних новостей
     * GET /api/news?lang=kk
     */
    public function getNews(Request $request)
    {
        $lang = $request->get('lang', 'kk');
        
        // Валидация языка
        if (!in_array($lang, ['kk', 'ru', 'en', 'cn'])) {
            $lang = 'kk';
        }

        $news = News::active()
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();

        $result = [];
        
        foreach ($news as $item) {
            $result[] = [
                'id' => $item->id,
                'title' => $item->{"title_$lang"} ?? $item->title_kk,
                'content' => $item->{"content_$lang"} ?? $item->content_kk,
                'date' => $item->date->format('Y-m-d H:i:s'),
                'image_url' => $item->image ? url('storage/news/' . $item->image) : null,
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $result,
            'language' => $lang
        ]);
    }

    /**
     * Получить 5 последних объявлений
     * GET /api/announcements?lang=ru
     */
    public function getAnnouncements(Request $request)
    {
        $lang = $request->get('lang', 'kk');
        
        // Валидация языка
        if (!in_array($lang, ['kk', 'ru', 'en', 'cn'])) {
            $lang = 'kk';
        }

        $announcements = Announcement::where('status', 1)
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();

        $result = [];
        
        foreach ($announcements as $item) {
            // Для объявлений используем одно поле content и name
            $result[] = [
                'id' => $item->id,
                'title' => $item->name,
                'content' => $item->content,
                'date' => date('Y-m-d H:i:s', $item->date),
                'image_url' => $item->image ? url('storage/announcement/' . $item->image) : null,
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $result,
            'language' => $lang
        ]);
    }
}