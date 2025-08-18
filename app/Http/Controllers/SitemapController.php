<?php
// app/Http/Controllers/SitemapController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use App\Models\Menu;

class SitemapController extends Controller
{
    public function index()
    {
        // Верхнее меню
        $menu = Cache::remember('menu', now()->addDay(), function() {
            return Menu::with([
                    'page:id,menu_id,slug',
                    'children.page:id,menu_id,slug',
                    'children.children.page:id,menu_id,slug',
                ])
                ->where('active', true)
                ->whereNull('parent_id')
                ->where('type', Menu::TYPE_TOP)
                ->orderBy('sort')
                ->get();
        });

        // Футер-меню
        $footer_menu = Cache::remember('footer_menu', now()->addDay(), function() {
            return Menu::with([
                    'page:id,menu_id,slug',
                    'children.page',
                ])
                ->where('active', true)
                ->whereNull('parent_id')
                ->where('type', Menu::TYPE_FOOTER)
                ->orderBy('sort')
                ->get();
        });

        return view('sitemap.sitemap', compact('menu', 'footer_menu'));
    }
}
