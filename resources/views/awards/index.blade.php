<x-layout metaTitle="{{ __('Награды') }}">

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ route('site.index', app()->getLocale()) }}" class="hover:text-shakarim-blue">{{ __('Главная страница')}}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Награды')}}</span>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-8">{{ __('Награды')}}</h1>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Navigation (ОСТАЕТСЯ БЕЗ ИЗМЕНЕНИЙ) -->
                <div class="lg:w-1/4">
                    <!-- Mobile horizontal tabs -->
                    <div class="lg:hidden mb-6">
                        <div class="flex overflow-x-auto space-x-2 pb-2">
                            @foreach($groupedAwards->keys() as $category)
                                <button onclick="showTab('{{ Str::slug($category) }}')" id="tab-{{ Str::slug($category) }}"
                                        class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors @if($loop->first) active @endif">
                                    {{ $category }} {{ __('награды') }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Desktop vertical tabs -->
                    <div class="hidden lg:block sticky top-24">
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Категории')}}</h3>
                            <nav class="space-y-2">
                                @foreach($groupedAwards->keys() as $category)
                                    <button onclick="showTab('{{ Str::slug($category) }}')" id="desktop-tab-{{ Str::slug($category) }}"
                                            class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors @if($loop->first) active @endif">
                                        {{ $category }} {{ __('награды') }}
                                    </button>
                                @endforeach
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area (ИЗМЕНЕНА НА АККОРДЕОНЫ) -->
                <div class="lg:w-3/4">
                    @foreach($groupedAwards as $category => $awardsByReward)
                        <div id="content-{{ Str::slug($category) }}" class="tab-content @if(!$loop->first) hidden @endif">
                            <div class="space-y-4">
                                {{-- Вложенный цикл для создания аккордеонов по каждой награде --}}
                                @foreach($awardsByReward as $rewardName => $awardsList)
                                    <div x-data="{ open: false }" class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300">
                                        {{-- Кнопка-заголовок аккордеона --}}
                                        <button @click="open = !open" class="w-full text-left p-4 bg-gray-50 hover:bg-gray-100 transition-colors flex justify-between items-center border-b">
                                            <span class="text-lg font-semibold text-shakarim-blue">{{ $rewardName }}</span>
                                            <svg x-bind:class="{ 'rotate-180': open }" class="w-6 h-6 text-gray-500 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                        {{-- Выпадающий контент аккордеона --}}
                                        <div x-show="open" x-collapse class="p-4 md:p-6">
                                            <div class="space-y-6">
                                                @foreach($awardsList as $award)
                                                    <div class="flex flex-col md:flex-row items-center gap-6">
                                                        <!-- Image -->
                                                        <div class="flex-shrink-0 w-32 h-32 md:w-40 md:h-40">
                                                            @if($award->image)
                                                                <img src="{{ Storage::url('awards/' . $award->image) }}" alt="{{ $award->fullname }}"
                                                                     class="w-full h-full object-cover rounded-full shadow-md">
                                                            @else
                                                                <div class="w-full h-full bg-gray-200 rounded-full flex items-center justify-center">
                                                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <!-- Text Info -->
                                                        <div class="text-center md:text-left">
                                                            <h3 class="text-xl font-bold text-gray-800">{{ $award->fullname }}</h3>
                                                            @if($award->position)
                                                                <p class="text-gray-600 mt-1">{{ $award->position }}</p>
                                                            @endif
                                                            <p class="text-sm text-gray-500 mt-2">
                                                                {{ __('Год получения') }}: <strong>{{ $award->year }}</strong>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    @if(!$loop->last)
                                                        <hr>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Скрипт и стили для ТАБОВ, они остаются без изменений --}}
    <script>
        function showTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
            document.querySelectorAll('.tab-button, .desktop-tab-button').forEach(button => {
                button.classList.remove('active', 'bg-shakarim-blue', 'text-white');
                button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
            });
            const selectedContent = document.getElementById('content-' + tabName);
            if (selectedContent) selectedContent.classList.remove('hidden');
            const activeTabButton = document.getElementById('tab-' + tabName);
            if (activeTabButton) {
                activeTabButton.classList.remove('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
                activeTabButton.classList.add('active', 'bg-shakarim-blue', 'text-white');
            }
            const activeDesktopTabButton = document.getElementById('desktop-tab-' + tabName);
            if (activeDesktopTabButton) {
                activeDesktopTabButton.classList.remove('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
                activeDesktopTabButton.classList.add('active', 'bg-shakarim-blue', 'text-white');
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.tab-button:not(.active), .desktop-tab-button:not(.active)').forEach(button => {
                button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
            });
            document.querySelectorAll('.tab-button.active, .desktop-tab-button.active').forEach(button => {
                button.classList.add('bg-shakarim-blue', 'text-white');
            });
        });
    </script>
    <style>
        .tab-button.active, .desktop-tab-button.active { background-color: #003163 !important; color: white !important; }
        .flex.overflow-x-auto::-webkit-scrollbar { height: 4px; }
        .flex.overflow-x-auto::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 2px; }
        .flex.overflow-x-auto::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 2px; }
        .flex.overflow-x-auto::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>

</x-layout>