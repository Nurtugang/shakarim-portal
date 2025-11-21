<x-layout metaTitle="{{ __('Практика и стажировки') }}">

    <!-- Хлебные крошки -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ route('site.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Главная страница')}}</a>
                <span class="mx-1">&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 36]) }}" class="hover:text-shakarim-blue">{{ __('Сотрудничество') }}</a>
                <span class="mx-1">&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Организации-партнеры по стажировкам')}}</span>
            </nav>
        </div>
    </section>

    <!-- Основной контент -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-8">{{ __('Организации-партнеры по стажировкам') }}</h1>

            @php
                $locale = app()->getLocale();
                $docField = 'document_' . $locale;
                $docUrlField = $docField . '_url';
            @endphp

            <div class="space-y-6">
                @forelse($internshipsByFaculty as $facultyId => $items)
                    @php
                        $faculty = $items->first()->faculty;
                    @endphp

                    <div x-data="{ open: false }" class="border rounded-xl shadow-sm">
                        <button @click="open = !open" class="w-full flex justify-between items-center text-left px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-t-xl">
                            <span class="font-semibold text-shakarim-blue">{{ $faculty->title }}</span>
                            <svg x-bind:class="{ 'rotate-180': open }" class="w-5 h-5 text-gray-500 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </button>
                        
                        <div x-show="open" x-collapse class="p-4 space-y-3">
                            @foreach($items as $internship)
                                @php
                                    $docPath = $internship->$docField ?: $internship->document_ru;
                                    $docUrl = $internship->$docUrlField ?: $internship->document_ru_url;
                                @endphp
                                <div class="flex justify-between items-center gap-4 py-2">
                                    <div class="text-gray-800">{{ __('Документ о практике') }}</div>
                                    @if($docPath)
                                        <a href="{{ $docUrl }}" target="_blank" class="inline-flex items-center text-sm text-white bg-shakarim-blue px-3 py-1 rounded hover:bg-blue-900 transition-colors">
                                            <i class="fas fa-download mr-2"></i>
                                            <span>{{ __('Скачать PDF') }}</span>
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
                    <div class="bg-gray-50 rounded-lg p-8 text-center">
                        <i class="fas fa-folder-open text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500">{{ __('На данный момент нет информации.') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

</x-layout>