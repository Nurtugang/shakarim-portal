<?php
namespace App\Services\Page;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Support\Facades\Cache;

class PageService
{
  protected $pageTopParentMenu;

  public function __construct()
  {
      $this->pageTopParentMenu = app()->getLocale();
  }

    public function accordionMenu(Page $page)
    {
        
           $parent_menu = $page->getTopParentMenu();
            return Menu::with([
              'page',
              'children' => function($q){
                        $q->with(['page','children' => function($c){
                                      $c->with('page')->where('active',true);
                                    }])->where('active',true)->orderBy('sort');
                                  }, 
              'parent'])
              ->where(["active"=>true,'parent_id'=>$parent_menu->id])
              ->orderBy('sort')
              ->get();
            
    }

    public function topMenu(int $parentMenu)
    {
      return $parentMenu ? Menu::with(['page'])
         ->whereHas('parent',function($q){
           $q->where('parent_id','!=',NULL);
         })
         ->where("parent_id", $parentMenu)
         ->where('active',true)
         ->orderBy('sort')
         ->get() : NULL;
    }

}

