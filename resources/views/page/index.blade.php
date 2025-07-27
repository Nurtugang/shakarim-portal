<x-layout :metaTitle="$page->{'title_'.app()->getLocale()}">
@push('styles')
 <link rel="stylesheet" href="{{ asset("css/content.css") }}">
 <link rel="stylesheet" href="{{ asset("css/staff.css") }}">
@endpush

<div class="content-container">
    @if($page->parent)
        <!-- ХЛЕБНЫЕ КРОШКИ -->
<div class="breadcrumb-container">
    <div class="breadcrumb">
        <a href="/" title="Домашняя страница"><i class="fas fa-home"></i></a>
        <span class="breadcrumb-separator">〉</span>
        <a href="{{ $page->parent->getUrl() }}">{{ $page->parent->{'title_'.app()->getLocale()} }}</a>
        <span class="breadcrumb-separator">〉</span>
        <span class="current">{{ $page->{'title_'.app()->getLocale()} }}</span>
    </div>
</div>
@endif
    <!-- Баннер страницы -->
     @if($page->menu)
    <x-page-banner 
        banner="{{ $page->menu->getBanner() }}" 
        :text="$page->menu->{'title_'.app()->getLocale()}" 
        sub-text="">
    </x-page-banner>
    @endif

    <!-- Основная сетка контента -->
    <div
    @class([
    'content-grid' => $page->menu,
])>
        @if($page->menu)
        <!-- Боковая навигация -->
        <x-accordion-menu 
            :menu="$accordion_menu" 
            :pageParentMenu="$page->menu->parent_id" 
            :pageMenu="$page->menu->id" 
            :rootMenu="$page->menu->parent->parent_id">
        </x-accordion-menu>
        @endif
        <!-- Основной контент -->
        <div class="main-content">
            <!-- Контент из админки -->
            <div class="tiptap-content">
                <div class="content tiptap-content font-sf">
                    {!! tiptap_converter()->asHTML($page->{'content_'.app()->getLocale()}) !!}
                </div>
            </div>
            <div class="my-4">
                @if(count($files))
                    <div class="my-4">
                       <x-page-files :files="$files" />
                    </div>
                @endif
                @if (count($lists)>0)
                    <x-page-lists :lists="$lists" :page="$page" />
                @endif
            </div>
        </div>
    </div>


</div>

@push('scripts')
<script src="/js/content.js"></script>
@endpush
</x-layout>