<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsSchoolsApiController extends Controller
{
    /**
     * Получить все новости с тегами в диапазоне ID 987-1010
    * GET /api/news/schools?lang=kk
     */
    public function getNews(Request $request)
    {
        $lang = $request->get('lang', 'kk');
        
        // Валидация языка
        if (!in_array($lang, ['kk', 'ru', 'en', 'cn'])) {
            $lang = 'kk';
        }

        $tagIdRange = [987, 1010];

        $news = News::active()
            ->whereHas('tags', function ($query) use ($tagIdRange) {
                $query->whereBetween('tag.id', $tagIdRange);
            })
            ->with(['tags:id,name'])
            ->orderBy('date', 'desc')
            ->get();

        $result = [];
        $allTagIds = [];
        
        // Путь к изображению по умолчанию
        $defaultImage = asset('img/stub.webp');

        foreach ($news as $item) {
            // Определяем пути к файлам для проверки
            $imagePath = $item->image ? 'news/' . $item->image : null;
            $thumbnailPath = $item->image ? 'news/thumbnails/' . pathinfo($item->image, PATHINFO_FILENAME) . '.webp' : null;
            $previewPath = $item->image ? 'news/previews/' . pathinfo($item->image, PATHINFO_FILENAME) . '.webp' : null;

            $itemTagIds = $item->tags->pluck('id')->values()->all();
            $allTagIds = array_merge($allTagIds, $itemTagIds);

            $result[] = [
                'id' => $item->id,
                'title' => $item->{"title_$lang"} ?? $item->title_kk,
                'content' => $item->{"content_$lang"} ?? $item->content_kk,
                'date' => $item->date->format('Y-m-d H:i:s'),
                'tag_ids' => $itemTagIds,
                // Проверяем наличие файла перед выдачей URL
                'image_url' => ($imagePath && Storage::disk('public')->exists($imagePath)) ? asset('storage/' . $imagePath) : $defaultImage,
                'image_thumbnail' => ($thumbnailPath && Storage::disk('public')->exists($thumbnailPath)) ? asset('storage/' . $thumbnailPath) : $defaultImage,
                'image_preview'   => ($previewPath && Storage::disk('public')->exists($previewPath)) ? asset('storage/' . $previewPath) : $defaultImage,
            ];
        }

        $allTagIds = array_values(array_unique($allTagIds));

        return response()->json([
            'success' => true,
            'data' => $result,
            'tag_ids' => $allTagIds,
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
            ->get();

        $result = [];
        
        // Путь к изображению по умолчанию
        $defaultImage = asset('img/stub.webp');

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