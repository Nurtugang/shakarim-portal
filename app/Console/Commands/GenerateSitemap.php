<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Str;

use App\Models\News;
use App\Models\Page;
use App\Models\Structure;
use App\Models\Announcement;
use App\Models\ScientificProject;
use App\Models\RectorPost;
use App\Models\Minor;
use App\Models\Vacancy;
use App\Models\Organization;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.xml file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 1. Создаем объект Sitemap
        $sitemap = Sitemap::create();

        // 2. Список языков (добавьте или уберите нужные)
        $locales = ['kk', 'ru', 'en'];

        // 3. Статические маршруты (которые не зависят от ID в базе)
        $staticRoutes = [
            '/', // Главная
            '/news',
            '/structure',
            '/science/dissertations',
            '/science/purchases',
            '/science/centres',
            '/science/journals',
            '/science/journals/tech',
            '/science/best-teachers',
            '/science/aspirants',
            '/science/projects',
            '/science/srws',
            '/awards',
            '/accreditation',
            '/academy/schools',
            '/announcements',
            '/rector-blog',
            '/development-goals',
            '/university/board',
            '/minors',
            '/vacancies',
            '/student/parlament',
            '/organization/science',
            '/organization/social',
            '/university/about',
            '/university/contacts',
            '/university/endowment',
            '/academy/graduates',
            '/partnership/internship',
            '/academy/op',
            '/app',
        ];

        $this->info('Start generating sitemap...');

        // --- ГЕНЕРАЦИЯ СТАТИЧЕСКИХ СТРАНИЦ ---
        foreach ($locales as $locale) {
            foreach ($staticRoutes as $route) {
                $urlPath = $route === '/' ? "/{$locale}" : "/{$locale}{$route}";
                
                $sitemap->add(
                    Url::create($urlPath)
                        ->setPriority($route === '/' ? 1.0 : 0.8)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                );
            }
        }

        // --- ГЕНЕРАЦИЯ ДИНАМИЧЕСКИХ СТРАНИЦ (ИЗ БД) ---

        // 1. Pages (Страницы) - route: /page/{slug}
        // Используем chunk для оптимизации памяти, если записей много
        Page::where('active', 1)->chunk(100, function ($pages) use ($sitemap, $locales) {
            foreach ($pages as $page) {
                foreach ($locales as $locale) {
                    $sitemap->add(Url::create("/{$locale}/page/{$page->slug}")->setPriority(0.7));
                }
            }
        });

        // 2. News (Новости) - route: /news/{alias}
        News::orderBy('created_at', 'desc')->chunk(100, function ($newsList) use ($sitemap, $locales) {
            foreach ($newsList as $news) {
                foreach ($locales as $locale) {
                    $sitemap->add(
                        Url::create("/{$locale}/news/{$news->alias}")
                            ->setLastModificationDate($news->updated_at)
                            ->setPriority(0.9) // Новости важны
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_NEVER) // Старые новости не меняются
                    );
                }
            }
        });

        // 3. Structure (Структура) - route: /structure/{slug}
        Structure::all()->each(function ($item) use ($sitemap, $locales) {
            foreach ($locales as $locale) {
                $sitemap->add(Url::create("/{$locale}/structure/{$item->slug}")->setPriority(0.8));
            }
        });

        // 4. Announcements (Объявления) - route: /announcements/{id}
        Announcement::orderBy('created_at', 'desc')->chunk(100, function ($items) use ($sitemap, $locales) {
            foreach ($items as $item) {
                foreach ($locales as $locale) {
                    $sitemap->add(Url::create("/{$locale}/announcements/{$item->id}")->setPriority(0.8));
                }
            }
        });

        // 6. Scientific Projects - route: /science/projects/{id}
        if (class_exists(\App\Models\ScientificProject::class)) {
             \App\Models\ScientificProject::all()->each(function ($project) use ($sitemap, $locales) {
                foreach ($locales as $locale) {
                    $sitemap->add(Url::create("/{$locale}/science/projects/{$project->id}"));
                }
            });
        }

        // 7. Rector Blog - route: /rector-blog/{slug}
        if (class_exists(\App\Models\RectorPost::class)) {
            \App\Models\RectorPost::all()->each(function ($post) use ($sitemap, $locales) {
                foreach ($locales as $locale) {
                    $sitemap->add(Url::create("/{$locale}/rector-blog/{$post->slug}"));
                }
            });
        }

        // 8. Minor - route: /minor/{id}
        Minor::all()->each(function ($item) use ($sitemap, $locales) {
            foreach ($locales as $locale) {
                $sitemap->add(Url::create("/{$locale}/minor/{$item->id}"));
            }
        });

        // 9. Vacancy - route: /vacancy/{id}
        Vacancy::all()->each(function ($item) use ($sitemap, $locales) {
            foreach ($locales as $locale) {
                $sitemap->add(Url::create("/{$locale}/vacancy/{$item->id}"));
            }
        });

        // 10. Organization - route: /organization/{id}
        Organization::all()->each(function ($item) use ($sitemap, $locales) {
            foreach ($locales as $locale) {
                $sitemap->add(Url::create("/{$locale}/organization/{$item->id}"));
            }
        });

        // Сохраняем в public/sitemap.xml
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully to public/sitemap.xml');

        \Log::info('Sitemap generated successfully at ' . now());

    }
}