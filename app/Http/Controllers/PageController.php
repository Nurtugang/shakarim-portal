<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageFile;
use App\Models\PageList;
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

        $lists = $page->lists()->where("title_{$locale}", '!=', "")->orderBy('date', 'desc')->paginate(10);

        if($page->menu){
            $accordion_menu = $this->service->accordionMenu($page);
            $topMenu = $this->service->topMenu($page->menu?->parent_id);
        }
        
       return view('page.index', [
        'accordion_menu' => $accordion_menu ?? null,
        'page' => $page,
        'topMenu' => $topMenu ?? null,
        'files' => $files,
        'lists' => $lists
       ]);
    }

    public function listItem(string $locale, PageList $pageList)
    {

     $page = $pageList->page;

     $accordion_menu = $this->service->accordionMenu($page);

     return view('page.list-item', compact("pageList", "accordion_menu", "page"));
    }
       
}
