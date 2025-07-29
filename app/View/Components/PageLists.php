<?php
namespace App\View\Components;

use App\Models\Page;
use App\Models\PageList;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class PageLists extends Component
{
    public $page;
    public $lists;

    public function __construct(Page $page, LengthAwarePaginator $lists)
    {
        $this->page = $page;
        $this->lists = $lists;
    }

    public function render()
    {
        $view = 'components.page-lists.' . $this->page->lists_view_type->value;
        return view()->exists($view) ? view($view) : view('components.page-lists.default');
    }
}