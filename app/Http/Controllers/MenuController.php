<?php
namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public function show(string $locale, Menu $menu)
    {
        $children = $menu->children()
            ->with('page')
            ->where('active', true)
            ->orderBy('sort')
            ->get();

        return view('menu.show', compact('menu', 'children'));
    }
}