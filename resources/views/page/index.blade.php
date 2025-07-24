<x-layout :metaTitle="$page->{'title_'.app()->getLocale()}">
@push('styles')
 <link rel="stylesheet" href="{{ asset("css/content.css") }}">
@endpush

<div class="content-container">
    <!-- Баннер страницы -->
    <x-page-banner 
        banner="{{ $page->menu->getBanner() }}" 
        :text="$page->menu->{'title_'.app()->getLocale()}" 
        sub-text="">
    </x-page-banner>

    <!-- Основная сетка контента -->
    <div class="content-grid">
        <!-- Боковая навигация -->
        <x-accordion-menu 
            :menu="$accordion_menu" 
            :pageParentMenu="$page->menu->parent_id" 
            :pageMenu="$page->menu->id" 
            :rootMenu="$page->menu->parent->parent_id">
        </x-accordion-menu>
        
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