<x-layout>
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">Главная страница</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">Жаңалықтар</span>
            </nav>
        </div>
    </section>

    <!-- News Cards -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-8 mt-2">Жаңалықтар</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach ($news as $item)
                    <div class="border rounded-lg p-6 bg-white flex flex-col justify-between min-h-[220px]">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-gray-400 text-sm">
                                {{ \Carbon\Carbon::createFromTimestamp($item->date)->format('d.m.Y') }}
                            </span>
                            @if ($item->category)
                                <span class="bg-shakarim-light text-white text-xs font-semibold px-3 py-1 rounded">
                                    {{ $item->category->{'label_' . app()->getLocale()} }}
                                </span>
                            @endif
                        </div>
                        <div class="font-semibold text-shakarim-blue mb-4">
                            {{ $item->{'title_' . app()->getLocale()} }}
                        </div>
                        <a href="{{ route('news.show', ['news' => $item, 'locale' => app()->getLocale()]) }}"
                           class="border border-shakarim-blue text-shakarim-blue rounded px-4 py-1 text-sm hover:bg-shakarim-blue hover:text-white transition w-max">
                            @switch(app()->getLocale())
                                @case('ru') Подробнее... @break
                                @case('en') Read more... @break
                                @default Толығырақ...
                            @endswitch
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center items-center space-x-2">
                {{ $news->onEachSide(1)->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </section>
</x-layout>
