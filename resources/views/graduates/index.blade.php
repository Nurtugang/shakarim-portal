<x-layout metaTitle="{{ __('Выпускники') }}">

    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ route('site.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Главная страница')}}</a>
                <span class="mx-1">&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 1]) }}" class="hover:text-shakarim-blue">{{ __('Образование') }}</a>
                <span class="mx-1">&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Выпускники')}}</span>
            </nav>
        </div>
    </section>

    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-8">{{ __('Выпускники') }}</h1>

            @php
                $locale = $locale ?? app()->getLocale();
                $titleField = 'title_' . $locale;
                $docField = 'document_' . $locale;
            @endphp

            <div class="space-y-6">
                @forelse($graduatesByYear as $year => $items)
                    <div x-data="{ open: false }" class="border rounded-xl shadow-sm">
                        <button @click="open=!open" class="w-full flex justify-between items-center px-4 py-3 bg-gray-50 hover:bg-gray-100">
                            <span class="font-semibold text-shakarim-blue">{{ $year }}</span>
                            <svg x-bind:class="{ 'rotate-180': open }" class="w-5 h-5 text-gray-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </button>
                        <div x-show="open" x-collapse class="p-4 space-y-3">
                            @foreach($items as $graduate)
                                @php
                                    $title = $graduate->$titleField ?: ($graduate->title_ru ?: $graduate->title_kk ?: $graduate->title_en);
                                    $docPath = $graduate->$docField;
                                @endphp
                                <div class="flex justify-between items-center gap-4">
                                    <div class="text-gray-800">{{ $title }}</div>
                                    @if($docPath)
                                        <a href="{{ Storage::url($docPath) }}" target="_blank" class="text-sm text-white bg-shakarim-blue px-3 py-1 rounded hover:bg-blue-900">
                                            {{ __('PDF') }}
                                        </a>
                                    @else
                                        <span class="text-xs text-gray-400">{{ __('Нет файла') }}</span>
                                    @endif
                                </div>
                                @if(!$loop->last)
                                    <hr>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">{{ __('Нет данных') }}</p>
                @endforelse
            </div>
        </div>
    </section>

</x-layout>
