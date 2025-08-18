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
    public function __construct(public ?string $metaTitle = null, public ?string $metaDescription = null) {
        //  $this->menu = Cache::remember('menu', now()->addDays(1), function() {
        //     return Menu::with(['page','children' => function($q){
        //         $q->with(['page','children' => function($c){
        //             $c->with(['page'])->where('active',true)->orderBy('sort');
        //         }])->where('active',true)->orderBy('sort');
        //     }, 'parent'])->where(["active"=>true,'parent_id'=>NULL,'type' => Menu::TYPE_TOP])->orderBy('sort')->get();
        // }); 
        // с верхним была ошибка с кэшем, поэтому закомментировал
        $this->menu = Cache::remember('menu', now()->addDays(1), function() {
            return Menu::select('id', 'parent_id', 'title_kk', 'title_ru', 'title_en', 'slug', 'link_kk', 'link_ru', 'link_en', 'is_external_link', 'sort')
                ->with(['page:id,menu_id,slug,title_kk,title_ru,title_en','children' => function($q){
                    $q->select('id', 'parent_id', 'title_kk', 'title_ru', 'title_en', 'slug', 'link_kk', 'link_ru', 'link_en', 'is_external_link', 'sort')
                    ->with(['page:id,menu_id,slug,title_kk,title_ru,title_en'])
                    ->where('active',true)->orderBy('sort');
                }])->where(["active"=>true,'parent_id'=>NULL,'type' => Menu::TYPE_TOP])->orderBy('sort')->get();
        });
        // $this->footer_menu = Cache::remember('footer_menu', now()->addDays(1), function() {
        //     return Menu::with(['page','children' => function($q){
        //         $q->with(['page','children' => function($c){
        //             $c->with(['page'])->where('active',true)->orderBy('sort');
        //         }])->where('active',true)->orderBy('sort');
        //     }, 'parent'])->where(["active"=>true,'parent_id'=>NULL,'type' => Menu::TYPE_FOOTER])->orderBy('sort')->get();
        // }); 
        // с верхним была ошибка с кэшем, поэтому закомментировал
        $this->footer_menu = Cache::remember('footer_menu', now()->addDays(1), function() {
            return Menu::select('id', 'parent_id', 'title_kk', 'title_ru', 'title_en', 'slug', 'link_kk', 'link_ru', 'link_en', 'is_external_link', 'sort')
                ->with(['page:id,menu_id,slug,title_kk,title_ru,title_en','children' => function($q){
                    $q->select('id', 'parent_id', 'title_kk', 'title_ru', 'title_en', 'slug', 'link_kk', 'link_ru', 'link_en', 'is_external_link', 'sort')
                    ->with(['page:id,menu_id,slug,title_kk,title_ru,title_en'])
                    ->where('active',true)->orderBy('sort');
                }])->where(["active"=>true,'parent_id'=>NULL,'type' => Menu::TYPE_FOOTER])->orderBy('sort')->get();
        });

        $this->quote = Quote::getRandomQuote(app()->getLocale());
        
    }

    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}
