<x-layout :metaTitle="$page->{'title_'.app()->getLocale()}">
    <div class="container mx-auto px-4 mb-20">
        <div class="mb-8">
            <x-page-banner banner="{{ $page->menu->getBanner() }}" :text="$page->menu->{'title_'.app()->getLocale()}" sub-text=""></x-page-banner>
        </div>  

        <div class="grid grid-cols-1 lg:grid-cols-4 mb-4 gap-8">
            <div class="lg:col-span-1 animate-fade-in-up">
                <x-accordion-menu :menu="$accordion_menu" :pageParentMenu="$page->menu->parent_id" :pageMenu="$page->menu->id" :rootMenu="$page->menu->parent->parent_id"></x-accordion-menu>
            </div>
            <div class="lg:col-span-3 animate-fade-in-down">
                <h1 class="font-inter text-3xl mb-10">{{ $page->{'title_'.app()->getLocale()} }}</h1>
                
                @if ($topMenu->count()>0)
                <div class="mb-10">
                    <x-page-top-menu :menu="$topMenu" :current_menu="$page->menu->id"></x-page-top-menu>
                </div>
                @endif
                <div>
                    <div class="content tiptap-content text-xl font-sf">
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
</x-layout>

