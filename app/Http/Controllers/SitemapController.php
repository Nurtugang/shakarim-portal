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
                    'page',
                    'children.page',
                    'children.children.page',
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
                    'page',
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
