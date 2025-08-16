<x-layout>
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница')}}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Поиск')}}</span>
            </nav>
        </div>
    </section>

    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-3xl font-bold text-shakarim-blue mb-6">
                @if($query)
                    {{ __('Результаты поиска:')}}' "{{ $query }}"
                @else
                    {{ __('Поиск')}}
                @endif
            </h1>

            @if($query)

                <!-- Страницы -->
                @if($pages->count() > 0)
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Страницы ({{ $pages->count() }})</h2>
                        @foreach($pages as $item)
                            <div class="border-b pb-4 mb-4">
                                <h3 class="font-semibold text-shakarim-blue">
                                    <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => $item]) }}">
                                        {{ $item->{'title_' . app()->getLocale()} }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 text-sm mt-2">
                                    {{ __('Страница сайта')}}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Новости -->
                @if($news->count() > 0)
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">{{ __('Новости')}} ({{ $news->count() }})</h2>
                        @foreach($news as $item)
                            <div class="border-b pb-4 mb-4">
                                <h3 class="font-semibold text-shakarim-blue">
                                    <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'news' => $item]) }}">
                                        {{ $item->{'title_' . app()->getLocale()} }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 text-sm mt-2">
                                    {{ Str::limit(html_entity_decode(strip_tags($item->{'content_' . app()->getLocale()} ?? '')), 150) }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Объявления -->
                @if($announcements->count() > 0)
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">{{ __('Объявления')}} ({{ $announcements->count() }})</h2>
                        @foreach($announcements as $item)
                            <div class="border-b pb-4 mb-4">
                                <h3 class="font-semibold text-shakarim-blue">
                                    <a href="{{ route('announcements.show', ['locale' => app()->getLocale(), 'id' => $item->id]) }}">
                                        {{ $item->name }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 text-sm mt-2">
                                    {{ Str::limit($item->description ?? strip_tags($item->content ?? ''), 150) }}
                                    {{ Str::limit(strip_tags($item->{'description'} ?? ''), 150) }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if($news->count() == 0 && $announcements->count() == 0 && $pages->count() == 0)
                    <p class="text-gray-600">{{ __('По запросу')}}"{{ $query }}" {{ __('ничего не найдено')}}.</p>
                @endif
            @else
                <p class="text-gray-600">{{ __('Введите поисковый запрос выше.')}}</p>
            @endif
        </div>
    </section>
</x-layout>