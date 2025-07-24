@props([
    'menu',
    'pageMenu',
    'rootMenu',
    'pageParentMenu'
])

<aside class="sidebar-nav">
    <ul>
        @foreach($menu as $menu_item)
            @if(count($menu_item->children) > 0)
                <li x-data="{ aside_expanded: {{ ($pageParentMenu === $menu_item->id || (isset($rootMenu) && $rootMenu === $menu_item->id)) ? 'true' : 'false' }} }">
                    <button
                        id="faqs-title-{{$menu_item->id}}"
                        type="button"
                        class="accordion-button w-full"
                        @click="aside_expanded = !aside_expanded"
                        :aria-expanded="aside_expanded"
                        aria-controls="faqs-text-{{$menu_item->id}}"
                        :class="aside_expanded ? 'active' : ''"
                    >
                        <span>{{ $menu_item->{'title_'.app()->getLocale()} }}</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div
                        x-cloak 
                        x-show="aside_expanded"
                        id="faqs-text-{{$menu_item->id}}"
                        role="region"
                        aria-labelledby="faqs-title-{{$menu_item->id}}"
                        class="accordion-content"
                        x-transition:enter="transition-all duration-300 ease-out"
                        x-transition:enter-start="max-h-0 opacity-0"
                        x-transition:enter-end="max-h-screen opacity-100"
                        x-transition:leave="transition-all duration-300 ease-in"
                        x-transition:leave-start="max-h-screen opacity-100"
                        x-transition:leave-end="max-h-0 opacity-0"
                    >
                        <ul class="pl-4">
                            @foreach($menu_item->children as $child)
                                @if(count($child->children) > 0)
                                    <li x-data="{ child_expanded: {{ $pageParentMenu === $child->id ? 'true' : 'false' }} }">
                                        <button
                                            id="faqs-title-{{$child->id}}"
                                            type="button"
                                            class="accordion-button w-full text-sm"
                                            @click="child_expanded = !child_expanded"
                                            :aria-expanded="child_expanded"
                                            aria-controls="faqs-text-{{$child->id}}"
                                            :class="child_expanded ? 'active' : ''"
                                        >
                                            <span>{{ $child->{'title_'.app()->getLocale()} }}</span>
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                        <div
                                            x-cloak 
                                            x-show="child_expanded"
                                            id="faqs-text-{{$child->id}}"
                                            role="region"
                                            aria-labelledby="faqs-title-{{$child->id}}"
                                            class="accordion-content"
                                            x-transition:enter="transition-all duration-300 ease-out"
                                            x-transition:enter-start="max-h-0 opacity-0"
                                            x-transition:enter-end="max-h-screen opacity-100"
                                            x-transition:leave="transition-all duration-300 ease-in"
                                            x-transition:leave-start="max-h-screen opacity-100"
                                            x-transition:leave-end="max-h-0 opacity-0"
                                        >
                                            <ul class="pl-4">
                                                @foreach($child->children as $l_child)
                                                    <li>
                                                        <a href="{{ $l_child->getUrl() }}"
                                                           {{$l_child->is_external_link ? 'target="_blank"' : ''}}
                                                           @class([
                                                               'active' => isset($pageMenu) && $pageMenu === $l_child->id,
                                                           ])>
                                                            {{ $l_child->{'title_'.app()->getLocale()} }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $child->getUrl() }}"
                                           {{$child->is_external_link ? 'target="_blank"' : ''}}
                                           @class([
                                               'active' => isset($pageMenu) && $pageMenu === $child->id,
                                           ])>
                                            {{ $child->{'title_'.app()->getLocale()} }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </li>
            @else
                <li>
                    <a href="{{ $menu_item->getUrl() }}"
                       {{$menu_item->is_external_link ? 'target="_blank"' : ''}}
                       @class([
                           'active' => isset($pageMenu) && $pageMenu == $menu_item->id,
                       ])>
                        {{ $menu_item->{'title_'.app()->getLocale()} }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</aside>