<x-layout metaTitle="{{ __('Научно-исследовательская работа обучающихся') }}">

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="#" class="hover:text-shakarim-blue">{{ __('Наука') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Научно-исследовательская работа обучающихся') }}</span>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="bg-white py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-8">{{ __('Научно-исследовательская работа обучающихся') }}</h1>
            
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
                <!-- Sidebar Navigation -->
                <aside class="lg:w-1/4">
                    @php
                        $tabs = [
                            'main' => __('Основные направления деятельности'),
                            'conferences' => __('Научные конференции обучающихся'),
                            'items' => __('НИРС'),
                        ];
                    @endphp

                    <!-- Mobile horizontal tabs -->
                    <div class="lg:hidden mb-6">
                        <div class="flex overflow-x-auto space-x-2 pb-2">
                            @foreach($tabs as $key => $title)
                                <button onclick="showTab('{{ $key }}')" id="mobile-tab-{{ $key }}" class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    {{ $title }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Desktop vertical tabs -->
                    <div class="hidden lg:block sticky top-24">
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Разделы')}}</h3>
                            <nav class="space-y-2">
                                @foreach($tabs as $key => $title)
                                    <button onclick="showTab('{{ $key }}')" id="desktop-tab-{{ $key }}" class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                        {{ $title }}
                                    </button>
                                @endforeach
                            </nav>
                        </div>
                    </div>
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
                </main>
            </div>
        </div>
    </section>

    <script>
        function showTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            document.querySelectorAll('.tab-button, .desktop-tab-button').forEach(button => {
                button.classList.remove('active', 'bg-shakarim-blue', 'text-white');
                button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
            });
            
            const contentToShow = document.getElementById('content-' + tabName);
            if (contentToShow) {
                contentToShow.classList.remove('hidden');
            }
            
            const mobileButton = document.getElementById('mobile-tab-' + tabName);
            if (mobileButton) {
                mobileButton.classList.add('active', 'bg-shakarim-blue', 'text-white');
                mobileButton.classList.remove('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
            }

            const desktopButton = document.getElementById('desktop-tab-' + tabName);
            if (desktopButton) {
                desktopButton.classList.add('active', 'bg-shakarim-blue', 'text-white');
                desktopButton.classList.remove('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            showTab('main');
        });
    </script>

    <style>
        .tab-button.active, .desktop-tab-button.active {
            background-color: #003163 !important; 
            color: white !important;
        }

        .flex.overflow-x-auto::-webkit-scrollbar { height: 4px; }
        .flex.overflow-x-auto::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 2px; }
        .flex.overflow-x-auto::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 2px; }
        .flex.overflow-x-auto::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>

</x-layout>