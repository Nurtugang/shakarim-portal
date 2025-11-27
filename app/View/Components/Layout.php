<?php

namespace App\View\Components;

use App\Models\Menu;
use App\Models\Quote;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Layout extends Component
{
    public $menu;
    public $footer_menu;
    public $quote;
    public array $hreflangs = []; 

    public function __construct(public ?string $metaTitle = null, public ?string $metaDescription = null)
    {
        // 1. Логика меню
        $this->menu = Cache::remember('menu', now()->addDays(1), function () {
            return Menu::with(['page:id,menu_id,slug', 'children' => function ($q) {
                $q->with(['page:id,menu_id,slug', 'children' => function ($c) {
                    $c->with(['page:id,menu_id,slug'])->where('active', true)->orderBy('sort');
                }])->where('active', true)->orderBy('sort');
            }, 'parent'])->where(["active" => true, 'parent_id' => NULL, 'type' => Menu::TYPE_TOP])->orderBy('sort')->get();
        });

        $this->footer_menu = Cache::remember('footer_menu', now()->addDays(1), function () {
            return Menu::with(['page:id,menu_id,slug', 'children' => function ($q) {
                $q->with(['page:id,menu_id,slug', 'children' => function ($c) {
                    $c->with(['page:id,menu_id,slug'])->where('active', true)->orderBy('sort');
                }])->where('active', true)->orderBy('sort');
            }, 'parent'])->where(["active" => true, 'parent_id' => NULL, 'type' => Menu::TYPE_FOOTER])->orderBy('sort')->get();
        });

        $this->quote = Quote::getRandomQuote(app()->getLocale());
        
        // 2. Логика для генерации языковых ссылок
        $this->generateHreflangs();
    }

    /**
     * Метод для генерации альтернативных языковых ссылок
     */
    protected function generateHreflangs(): void
    {
        if (!Route::current()) {
            return;
        }

        $currentRouteName = Route::currentRouteName();
        $currentParams = Route::current()->parameters();
        $supportedLocales = ['kk', 'ru', 'en', 'cn'];

        foreach ($supportedLocales as $localeCode) {
            $params = $currentParams;
            $params['locale'] = $localeCode;

            try {
                $url = route($currentRouteName, $params);
                
                $this->hreflangs[] = [
                    'code' => $localeCode,
                    'url' => $url,
                    'is_default' => ($localeCode === 'kk')
                ];
            } catch (\Exception $e) {
                continue;
            }
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}