<?php

namespace App\View\Components;

use App\Models\Menu;
use App\Models\Quote;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Layout extends Component
{
    public $menu;
    public $footer_menu;
    public $quote;
    public function __construct(public ?string $metaTitle = null, public ?string $metaDescription = null)
    {
        
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
    }

    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}
