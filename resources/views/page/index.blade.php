<x-layout :metaTitle="$page->{'title_'.app()->getLocale()}">
    <!-- Breadcrumbs and Section -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex items-center space-x-2" aria-label="Breadcrumb">
                <a href="#" class="hover:text-shakarim-blue">Главная страница</a>
                <span class="mx-1">&#8250;</span>
                <span class="text-shakarim-grey">{{ $page->menu->parent->{'title_'.app()->getLocale()} }}</span>
                <span class="mx-1">&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ $page->menu->{'title_'.app()->getLocale()} }}</span>
            </nav>
        </div>
    </section>
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-8 mt-2">{{ $page->menu->{'title_'.app()->getLocale()} }}</h1>
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
    </section>
</x-layout>
