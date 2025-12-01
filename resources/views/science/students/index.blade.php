<x-layout metaTitle="Student's science">

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="#" class="hover:text-shakarim-blue">Student's science</a>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="bg-white py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-8">Student's science</h1>
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
                <!-- Sidebar Navigation -->
                <aside class="lg:w-1/4">
                    @php
                        $tabs = [
                            'main' => __('Основные направления деятельности'),
                            'conferences' => __('Научные конференции обучающихся'),
                            'items' => __('НИРС'),
                            'clubs' => __('Научные студенческие кружки'),
                        ];
                    @endphp
                    <x-sections :sections="$tabs" />
                </aside>

                <!-- Main Content Area -->
                <main class="lg:w-3/4">
                    <!-- Tab 1: Основные направления деятельности -->
                    <div id="content-main" class="tab-content">
                        @if($mainContent)
                            <div class="prose max-w-none tiptap-content bg-gray-50 p-6 rounded-xl">
                                {!! $mainContent->content !!}
                            </div>
                        @else
                            <p>{{ __('Информация не найдена.') }}</p>
                        @endif
                    </div>

                    <!-- Tab 2: Научные конференции -->
                    <div id="content-conferences" class="tab-content hidden">
                        <div class="space-y-4">
                            @forelse($conferences as $conference)
                                <a href="{{ $conference->file_url }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-x-4 p-4 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                                    <svg class="w-8 h-8 text-shakarim-blue flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                    <div>
                                        <h3 class="font-semibold text-gray-800">{{ $conference->title }}</h3>
                                        <span class="text-sm text-gray-500">{{ __('Скачать PDF') }}</span>
                                    </div>
                                </a>
                            @empty
                                <p>{{ __('Документы не найдены.') }}</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Tab 3: НИРС по годам (с аккордеоном) -->
                    <div id="content-items" class="tab-content hidden">
                        <div class="space-y-6" x-data="{ activeYear: null }">
                            @forelse($itemsByYear as $year => $items)
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                                <button @click="activeYear = (activeYear === {{ $year }}) ? null : {{ $year }}" class="w-full text-left p-4 bg-gray-50 hover:bg-gray-100 transition-colors flex justify-between items-center">
                                    <span class="text-xl font-bold font-heading text-gray-800">{{ $year }}</span>
                                    <svg :class="{ 'rotate-180': activeYear === {{ $year }} }" class="w-6 h-6 text-gray-500 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="activeYear === {{ $year }}" x-collapse class="p-2 md:p-6 border-t border-gray-200">
                                    <div class="space-y-3">
                                        @foreach($items as $item)
                                            <a href="{{ $item->file_url }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-x-3 p-3 rounded-lg hover:bg-gray-100 transition-colors">
                                                 <svg class="w-6 h-6 text-shakarim-blue flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                </svg>
                                                <span class="text-gray-700">{{ $item->title }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @empty
                                <p>{{ __('Записи не найдены.') }}</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Tab 4: Научные студенческие кружки -->
                    <div id="content-clubs" class="tab-content hidden">
                        <h2 class="text-xl md:text-2xl font-heading font-bold text-shakarim-blue mb-6 md:mb-8">{{ __('Научные студенческие кружки') }}</h2>
                        <div class="prose max-w-none mb-8 md:mb-10">
                            <p>{{ __('С целью привлечения студентов к научно-исследовательской деятель­ности на кафедрах университета действуют кружки по научным интересам. В настоящее время функционируют 30 студенческих научных кружков и объединений, занимаясь в которых студенты приобретают навыки научного поиска и работы по своим квалификационным направлениям.') }}</p>
                        </div>
                        @if(isset($organizations) && $organizations->isNotEmpty())
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                                @foreach($organizations as $org)
                                    <a href="{{ route('organization.show', ['locale' => $locale, 'organization' => $org->id]) }}" class="block bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-200 group">
                                        @if($org->hasImage())
                                            <div class="h-36 md:h-48 overflow-hidden bg-gray-100">
                                                <img src="{{ $org->getImageUrl() }}" 
                                                    alt="{{ $org->{'name_' . $locale} }}"
                                                    class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                                            </div>
                                        @else
                                            <div class="h-36 md:h-48 bg-gradient-to-br from-shakarim-blue to-blue-600 flex items-center justify-center">
                                                <i class="fas fa-university text-white text-4xl md:text-6xl opacity-50"></i>
                                            </div>
                                        @endif
                                        <div class="p-4 md:p-6">
                                            <h3 class="text-base md:text-xl font-bold text-shakarim-blue mb-2 md:mb-3 line-clamp-2">
                                                {{ $org->{'name_' . $locale} }}
                                            </h3>
                                            <div class="mb-3 md:mb-4 pb-3 md:pb-4 border-b border-gray-200">
                                                <div class="flex items-start space-x-2 md:space-x-3">
                                                    @if($org->hasDeanImage())
                                                        <div class="w-12 h-12 md:w-16 md:h-16 flex-shrink-0 overflow-hidden rounded-full border-2 border-shakarim-blue">
                                                            <img src="{{ $org->getDeanImageUrl() }}" 
                                                                alt="{{ $org->{'dean_' . $locale} }}"
                                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                                        </div>
                                                    @else
                                                        <div class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-gray-200 flex items-center justify-center flex-shrink-0">
                                                            <i class="fas fa-user text-gray-400 text-lg md:text-2xl"></i>
                                                        </div>
                                                    @endif
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-xs text-gray-500 mb-1">{{ __('Руководитель') }}</p>
                                                        <p class="text-xs md:text-sm font-semibold text-gray-800 line-clamp-2">
                                                            {{ $org->{'dean_' . $locale} }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 md:mb-4">
                                                <div class="text-xs md:text-sm text-gray-600 line-clamp-3">
                                                    {!! strip_tags($org->{'target_' . $locale}, '<p><br><strong><em><b><i>') !!}
                                                </div>
                                            </div>
                                            <div class="space-y-1.5 md:space-y-2">
                                                @if($org->phone)
                                                    <div class="flex items-center text-xs md:text-sm text-gray-700">
                                                        <i class="fas fa-phone text-shakarim-blue mr-2 w-3 md:w-4 text-xs"></i>
                                                        <span class="truncate">{{ $org->phone }}</span>
                                                    </div>
                                                @endif
                                                @if($org->insta)
                                                    <div class="flex items-center text-xs md:text-sm text-gray-700">
                                                        <i class="fab fa-instagram text-shakarim-blue mr-2 w-3 md:w-4 text-xs"></i>
                                                        <span class="truncate">{{ $org->insta }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12">
                                <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500 text-lg">{{ __('Организации не найдены') }}</p>
                            </div>
                        @endif
                    </div>
                </main>
            </div>
        </div>
    </section>
</x-layout>
