<x-layout metaTitle="{{ __('Материалы защиты диссертаций') }}">

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 28]) }}" class="hover:text-shakarim-blue">{{ __('Наука') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Материалы защиты диссертаций')}}</span>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-8">{{ __('Материалы защиты диссертаций')}}</h1>
            
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Navigation -->
                <div class="lg:w-1/4">
                    <!-- Mobile horizontal tabs -->
                    <div class="lg:hidden mb-6">
                        <div class="flex overflow-x-auto space-x-2 pb-2">
                            @foreach($dissertationsByCategory as $category => $dissertations)
                                <button onclick="showTab('{{ Str::slug($category) }}')" id="tab-{{ Str::slug($category) }}" class="tab-button {{ $loop->first ? 'active' : '' }} whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    {{-- Короткое название для мобильных --}}
                                    @php
                                        $shortTitle = $dissertations->first()->{'category_'.app()->getLocale()};
                                        if (app()->getLocale() == 'ru') {
                                            $shortTitle = Str::of($shortTitle)->after('– «')->before('»');
                                        } else {
                                            $shortTitle = Str::of($shortTitle)->after('– «')->before('»');
                                        }
                                    @endphp
                                    {{ $shortTitle }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Desktop vertical tabs -->
                    <div class="hidden lg:block sticky top-24">
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Разделы')}}</h3>
                            <nav class="space-y-2">
                                @foreach($dissertationsByCategory as $category => $dissertations)
                                    <button onclick="showTab('{{ Str::slug($category) }}')" id="desktop-tab-{{ Str::slug($category) }}" class="desktop-tab-button {{ $loop->first ? 'active' : '' }} w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                        {{ $dissertations->first()->{'category_'.app()->getLocale()} }}
                                    </button>
                                @endforeach
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="lg:w-3/4">
                    @foreach($dissertationsByCategory as $category => $dissertations)
                    <div id="content-{{ Str::slug($category) }}" class="tab-content {{ $loop->first ? '' : 'hidden' }}">
                        <div class="space-y-6">
                            @foreach($dissertations as $dissertation)
                            <div x-data="{ open: false }" class="bg-white rounded-xl shadow-lg overflow-hidden">
                                <button @click="open = !open" class="w-full text-left p-4 bg-gray-50 hover:bg-gray-100 transition-colors flex justify-between items-center">
                                    <span class="font-semibold text-gray-800">{{ $dissertation->{'fio_'.app()->getLocale()} }}</span>
                                    <svg x-bind:class="{ 'rotate-180': open }" class="w-5 h-5 text-gray-500 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="open" x-collapse class="p-6 border-t border-gray-200">
                                    <div class="prose max-w-none tiptap-content">
                                        {!! tiptap_converter()->asHTML($dissertation->{'content_'.app()->getLocale()}) !!}
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
            
            const mobileButton = document.getElementById('tab-' + tabName);
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
            document.querySelectorAll('.tab-button:not(.active), .desktop-tab-button:not(.active)').forEach(button => {
                button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
            });
            
            document.querySelectorAll('.tab-button.active, .desktop-tab-button.active').forEach(button => {
                button.classList.add('bg-shakarim-blue', 'text-white');
            });
        });
    </script>

    <style>
        .tab-button.active, .desktop-tab-button.active {
            background-color: #003163 !important; /* shakarim-blue */
            color: white !important;
        }

        .flex.overflow-x-auto::-webkit-scrollbar { height: 4px; }
        .flex.overflow-x-auto::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 2px; }
        .flex.overflow-x-auto::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 2px; }
        .flex.overflow-x-auto::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>

</x-layout> 