<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageFile;
use App\Services\Page\PageService;

class PageController extends Controller
{

  public function __construct(
        public PageService $service
    ){}

    public function index(string $locale, Page $page)
    {
        if(!$page->exists){
            abort(404);
        }

        $files = PageFile::query()->where('page_id',$page->id)->orderBy('position')->orderBy('created_at', 'desc')->paginate(15);

        if($page->menu){
            $accordion_menu = $this->service->accordionMenu($page);
            $topMenu = $this->service->topMenu($page->menu?->parent_id);
        }
        
       return view('page.index', [
        'accordion_menu' => $accordion_menu ?? null,
        'page' => $page,
        'topMenu' => $topMenu ?? null,
        'files' => $files,
       ]);
    }

}
