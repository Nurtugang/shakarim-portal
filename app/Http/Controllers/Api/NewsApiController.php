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
        
        // Путь к изображению по умолчанию
        $defaultImage = asset('img/university_building.webp');

        foreach ($news as $item) {
            // Определяем пути к файлам для проверки
            $imagePath = $item->image ? 'news/' . $item->image : null;
            $thumbnailPath = $item->image ? 'news/thumbnails/' . pathinfo($item->image, PATHINFO_FILENAME) . '.webp' : null;
            $previewPath = $item->image ? 'news/previews/' . pathinfo($item->image, PATHINFO_FILENAME) . '.webp' : null;

            $result[] = [
                'id' => $item->id,
                'title' => $item->{"title_$lang"} ?? $item->title_kk,
                'content' => $item->{"content_$lang"} ?? $item->content_kk,
                'date' => $item->date->format('Y-m-d H:i:s'),
                // Проверяем наличие файла перед выдачей URL
                'image_url' => ($imagePath && Storage::disk('public')->exists($imagePath)) ? asset('storage/' . $imagePath) : $defaultImage,
                'image_thumbnail' => ($thumbnailPath && Storage::disk('public')->exists($thumbnailPath)) ? asset('storage/' . $thumbnailPath) : $defaultImage,
                'image_preview'   => ($previewPath && Storage::disk('public')->exists($previewPath)) ? asset('storage/' . $previewPath) : $defaultImage,
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
            ->where('language', $lang)
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();

        $result = [];
        
        // Путь к изображению по умолчанию
        $defaultImage = asset('img/university_building.webp');

        foreach ($announcements as $item) {
            // Определяем пути к файлам для проверки
            $imagePath = $item->image ? 'announcement/' . $item->image : null;
            $thumbnailPath = $item->image ? 'announcement/thumbnails/' . pathinfo($item->image, PATHINFO_FILENAME) . '.webp' : null;
            $previewPath = $item->image ? 'announcement/previews/' . pathinfo($item->image, PATHINFO_FILENAME) . '.webp' : null;

            // Для объявлений используем одно поле content и name
            $result[] = [
                'id' => $item->id,
                'title' => $item->name,
                'content' => $item->content,
                'date' => date('Y-m-d H:i:s', $item->date),
                // Проверяем наличие файла перед выдачей URL
                'image_url' => ($imagePath && Storage::disk('public')->exists($imagePath)) ? asset('storage/' . $imagePath) : $defaultImage,
                'image_thumbnail' => ($thumbnailPath && Storage::disk('public')->exists($thumbnailPath)) ? asset('storage/' . $thumbnailPath) : $defaultImage,
                'image_preview'   => ($previewPath && Storage::disk('public')->exists($previewPath)) ? asset('storage/' . $previewPath) : $defaultImage,
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $result,
            'language' => $lang
        ]);
    }
}