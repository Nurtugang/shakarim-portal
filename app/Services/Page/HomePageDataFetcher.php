<?php
namespace App\Services\Page;

use Illuminate\Support\Facades\Cache;
use App\Models\News;
use App\Models\Advantage;
use App\Models\Ad;
use App\Models\PhotoGallery;
use App\Models\OtherResource;
use App\Models\Partner;
use Illuminate\Support\Facades\DB;

class HomePageDataFetcher
{
    protected $locale;
    protected $cacheDuration;

    public function __construct()
    {
        $this->locale = app()->getLocale();
        $this->cacheDuration = now()->addDays(1);
    }

    public function getNews()
    {
        return Cache::remember("news_homepage_{$this->locale}", $this->cacheDuration, function () {
            $news = News::query()
            ->select(['id', 'active', 'published_at', "title_{$this->locale}", "content_{$this->locale}", 'thumbnail', 'slug'])
            ->where('active', true)
            ->latest('published_at')
            ->take(5)
            ->get();
            
            return [
                'mainNews' => $news->first(),
                'sideNews' => $news->slice(1, 4),
            ];
        });
    }


    // public function getPartners()
    // {
    //     return Cache::remember("partners", $this->cacheDuration, function () {
    //         return Partner::query()->get();
    //     });
    // }

}