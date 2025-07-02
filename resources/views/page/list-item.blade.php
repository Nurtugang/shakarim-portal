<x-layout  :metaTitle="$pageList->{'title_'.app()->getLocale()}" :metaDescription="$pageList->shortBody()" :metaImage="$pageList->getImage()">
    <div class="container mx-auto my-8 px-4">
    <div class="mb-8">
            <x-page-banner banner="{{ $page->menu->getBanner() }}" :text="$page->menu->parent?->{'title_'.app()->getLocale()}" sub-text=""></x-page-banner>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 mb-4 gap-8">
            <div class="lg:col-span-1 animate-fade-in-right">
                <x-accordion-menu :menu="$accordion_menu" :pageParentMenu="$page->menu->parent_id" :pageMenu="$page->menu->id" :rootMenu="$page->menu->parent?->parent_id"></x-accordion-menu>
            </div>
            <div class="lg:col-span-3 animate-fade-in-right">
            
                <h1 class="font-inter text-3xl mb-10">{{ $pageList->{'title_'.app()->getLocale()} }}</h1>
               <div class="my-4">
                        <img class="w-full rounded" src="{{ $pageList->getImage() }}" alt="news">
                    </div>
                <div class="my-10">
                    <div class="content tiptap-content text-xl">
                        {!! $pageList->{'content_'.app()->getLocale()} !!}
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</x-layout>