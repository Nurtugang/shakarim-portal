@props([
    'menu',
    'pageMenu',
    'rootMenu',
    'pageParentMenu'
])
<div class="mb-4 text-xl font-sf">
<ul>
        @foreach($menu as $menu_item)
            @if(count($menu_item->children)>0)
            <li x-data="{ aside_expanded: {{ ($pageParentMenu === $menu_item->id || (isset($rootMenu) && $rootMenu === $menu_item->id)) ? 'true' : 'false' }} }">
                <button
                    id="faqs-title-{{$menu_item->id}}"
                    type="button"
                    class="flex items-center justify-between text-left hover:bg-secondary hover:text-white hover:rounded-3xl font-sf mb-2 px-5 py-1"
                    @click="aside_expanded = !aside_expanded"
                    :aria-aside_expanded="aside_expanded"
                    aria-controls="faqs-text-{{$menu_item->id}}"
                >
                    <span>{{ $menu_item->{'title_'.app()->getLocale()} }}</span>
                    <svg class="shrink-0 ml-8 w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/>
                    </svg>
                </button>
                <div
                    x-cloak 
                    x-show="aside_expanded"
                    id="faqs-text-{{$menu_item->id}}"
                    role="region"
                    aria-labelledby="faqs-title-01"
                    class="grid overflow-hidden rounded-b-md transition-all duration-300 ease-in-out"
                    :class="aside_expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                >
                    <div class="overflow-hidden">
                        <ul class="pl-5">
                            @foreach($menu_item->children as $child)
                            @if(count($child->children)>0)
            <li x-data="{ child_expanded: {{ $pageParentMenu === $child->id ? 'true' : 'false' }} }">
                <button
                    id="faqs-title-{{$child->id}}"
                    type="button"
                    class="flex items-center justify-between text-left hover:bg-secondary hover:rounded-3xl font-sf mb-2 px-5 py-1"
                    @click="child_expanded = !child_expanded"
                    :aria-child_expanded="child_expanded"
                    aria-controls="faqs-text-{{$child->id}}"
                >
                    <span>{{ $child->{'title_'.app()->getLocale()} }}</span>
                    <svg class="shrink-0 ml-8 w-3 h-3" viewBox="0 0 24 24">
                        <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/>
                    </svg>
                </button>
                <div
                    x-cloak 
                    x-show="child_expanded"
                    id="faqs-text-{{$child->id}}"
                    role="region"
                    aria-labelledby="faqs-title-01"
                    class="grid overflow-hidden rounded-b-md transition-all duration-300 ease-in-out"
                    :class="child_expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'"
                >
                    <div class="overflow-hidden">
                        <ul class="pl-5">
                            @foreach($child->children as $l_child)
                                <li class="mb-1">
                                  <a href="{{ $l_child->getUrl() }}"
                                  {{$l_child->is_external_link ? 'target="_blank"' : ''}}
                                  @class([
                                      'px-5 py-1 block w-fit hover:bg-secondary hover:text-white hover:rounded-3xl',
                                      'bg-secondary rounded-3xl text-white' =>  isset($pageMenu) && $pageMenu===$l_child->id,
                                  ])>
                                     {{ $l_child->{'title_'.app()->getLocale()} }}
                                  </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </li>
            @else

                                <li class="mb-1">
                                  <a href="{{ $child->getUrl() }}"
                                  {{$child->is_external_link ? 'target="_blank"' : ''}}
                                  @class([
                                      'px-5 py-1 block w-fit hover:bg-secondary hover:text-white hover:rounded-3xl',
                                      'bg-secondary text-white rounded-3xl' =>  isset($pageMenu) && $pageMenu===$child->id,
                                  ])>
                                     {{ $child->{'title_'.app()->getLocale()} }}
                                  </a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                </div>
            </li>
            @else
                <li class="mb-2">
                <a href="{{ $menu_item->getUrl() }}"
                @class([
                    'px-5 py-1 block w-fit hover:bg-secondary hover:text-white hover:rounded-3xl',
                    'bg-secondary text-white rounded-3xl' => isset($pageMenu) && $pageMenu==$menu_item->id,
                ])
                {{$menu_item->is_external_link ? 'target="_blank"' : ''}}>
                   {{ $menu_item->{'title_'.app()->getLocale()} }}
                </a>
                </li>
            @endif
        @endforeach
        </ul>
    </div>