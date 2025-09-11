<link rel="stylesheet" href="{{ asset('css/custom/slider.css') }}">

<x-layout>

    <!-- Hero Section with Slider -->
    <section class="relative bg-white overflow-hidden">
        <div class="slider-container relative h-64 md:h-[400px]">
            

            <!-- Slide 5: Tokayev -->
            <div class="slide active absolute inset-0 flex"
                 style="background-image: url('/img/tokaev.webp'); background-size: cover; background-position: top;">
                <div class="w-full md:w-1/2 bg-slate-600 bg-opacity-90 md:bg-opacity-100 text-white flex items-center justify-center p-4 md:p-8">
                    <div class="text-center">
                        <h2 class="text-xl md:text-4xl font-heading font-bold mb-3 md:mb-6">{{ __('Message from the Head of State Kassym-Jomart Tokayev to the people of Kazakhstan') }}</h2>
                        <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'news' => 'ongirlik-koshbasshynyng-zhanga-martebesi-shakarim-university-alghash-ret-qs-world-university-rankings-2026-zhahandyq-reytingine-yendi']) }}">
                            <button class="mt-3 md:mt-6 bg-white text-shakarim-blue px-4 py-2 md:px-6 md:py-2 rounded-lg font-body font-semibold hover:bg-gray-100 transition text-sm md:text-base">
                                {{ __('More') }}
                            </button>
                        </a>
                    </div>
                </div>
                <div class="hidden md:block w-1/2 bg-cover bg-top" style="background-image: url('/img/tokaev.webp');"></div>
            </div>

            <!-- Slide 4: AI Sana -->
            <div class="slide absolute inset-0 flex opacity-0 transition-opacity duration-700"
                 style="background-image: url('/img/ai_sana.webp'); background-size: cover; background-position: center;">
                <div class="w-full md:w-1/2 bg-slate-700 bg-opacity-90 md:bg-opacity-100 text-white flex items-center justify-center p-4 md:p-8">
                    <div class="text-center">
                        <h2 class="text-xl md:text-4xl font-heading font-bold mb-3 md:mb-6">{{ __('Shakarim University AI-Sana Program Results') }}</h2>
                        <div class="grid grid-cols-4 gap-2 md:gap-4 mb-3 md:mb-6">
                            <div>
                                <div class="text-2xl md:text-4xl font-heading font-bold text-yellow-400">5</div>
                                <div class="text-xs md:text-sm font-body text-slate-200">{{ __('AI Agents') }}</div>
                            </div>
                            <div>
                                <div class="text-2xl md:text-4xl font-heading font-bold text-yellow-400">2</div>
                                <div class="text-xs md:text-sm font-body text-slate-200">{{ __('Ready solutions') }}</div>
                            </div>
                            <div>
                                <div class="text-2xl md:text-4xl font-heading font-bold text-yellow-400">3</div>
                                <div class="text-xs md:text-sm font-body text-slate-200">{{ __('In development') }}</div>
                            </div>
                            <div>
                                <div class="text-2xl md:text-4xl font-heading font-bold text-yellow-400">∞</div>
                                <div class="text-xs md:text-sm font-body text-slate-200">{{ __('Opportunities') }}</div>
                            </div>
                        </div>
                        <a href="https://aisana.shakarim.kz/">
                            <button class="bg-white text-slate-700 px-4 py-2 md:px-6 md:py-2 rounded-lg font-body font-semibold hover:bg-gray-100 transition text-sm md:text-base">
                                {{ __('More') }}
                            </button>
                        </a>
                    </div>
                </div>
                <div class="hidden md:block w-1/2 bg-cover bg-center" style="background-image: url('/img/ai_sana.webp');">
                </div>
            </div>

            <!-- Slide 1: QS Rankings -->
            <div class="slide active absolute inset-0 flex"
                 style="background-image: url('/img/qs_world_university_rankings.webp'); background-size: cover; background-position: center;">
                <div class="w-full md:w-1/2 bg-slate-600 bg-opacity-90 md:bg-opacity-100 text-white flex items-center justify-center p-4 md:p-8">
                    <div class="text-center">
                        <h2 class="text-xl md:text-4xl font-heading font-bold mb-3 md:mb-6">{{ __('QS World University Rankings') }}</h2>
                        <div class="text-3xl md:text-6xl font-heading font-bold text-yellow-400 mb-1 md:mb-2">#1401+</div>
                        <p class="text-sm md:text-lg font-body text-slate-200">{{ __('Shakarim University first entered the global ranking') }}</p>
                        <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'news' => 'ongirlik-koshbasshynyng-zhanga-martebesi-shakarim-university-alghash-ret-qs-world-university-rankings-2026-zhahandyq-reytingine-yendi']) }}">
                            <button class="mt-3 md:mt-6 bg-white text-shakarim-blue px-4 py-2 md:px-6 md:py-2 rounded-lg font-body font-semibold hover:bg-gray-100 transition text-sm md:text-base">
                                {{ __('More') }}
                            </button>
                        </a>
                    </div>
                </div>
                <div class="hidden md:block w-1/2 bg-cover bg-center" style="background-image: url('/img/qs_world_university_rankings.webp');"></div>
            </div>

            <!-- Slide Navigation -->
            <div class="absolute bottom-3 md:bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                <button class="slide-dot active w-2 h-2 md:w-3 md:h-3 rounded-full" data-slide="0"></button>
                <button class="slide-dot w-2 h-2 md:w-3 md:h-3 rounded-full" data-slide="1"></button>
                <button class="slide-dot w-2 h-2 md:w-3 md:h-3 rounded-full" data-slide="2"></button>
            </div>

            <!-- Navigation Arrows -->
            <button class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-20 text-white p-3 rounded-full hover:bg-opacity-30 transition z-10 hidden md:block" onclick="previousSlide()">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-20 text-white p-3 rounded-full hover:bg-opacity-30 transition z-10 hidden md:block" onclick="nextSlide()">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>

    <!-- Useful Links Section -->
    <section class="py-4 md:py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto p-4 overflow-hidden">
            <div class="text-center mb-4 md:mb-8">
                <h2 class="text-lg md:text-2xl font-heading font-bold text-shakarim-blue break-words">
                    <i class="fas fa-link mr-2 md:mr-3"></i>{{ __('Useful Links') }}
                </h2>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
                <!-- Талапкерлерге блок -->
                <div class="group bg-white rounded-xl p-4 md:p-6 border border-gray-100">
                    <div class="flex items-center mb-3 md:mb-4">
                        <i class="fas fa-user-plus text-xl md:text-2xl text-gray-800 mr-2 md:mr-3"></i>
                        <h3 class="font-heading font-bold text-lg md:text-lg text-gray-800 transition-colors duration-300">{{ __('For Applicants') }}</h3>
                    </div>
                    <p class="text-gray-800 text-base md:text-sm font-body mb-4 md:mb-4 transition-colors duration-300">{{ __('For prospective students') }}</p>
                    <div class="space-y-2 md:space-y-2 text-base md:text-sm font-body">
                        <a href="{{ route('university.about.index', ['locale' => app()->getLocale()]) }}" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• {{ __('Об университете') }}</a>
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'virtualdy-tur']) }}" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• {{ __('Виртуальный тур') }}</a>
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'studenttik-omir']) }}" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• {{ __('Студенческая жизнь') }}</a>
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'bailanys-1']) }}" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• {{ __('Контакты') }}</a>
                    </div>
                </div>

                <!-- Білім алушыларға блок -->
                <div class="group bg-white rounded-xl p-4 md:p-6 border border-gray-100">
                    <div class="flex items-center mb-3 md:mb-4">
                        <i class="fas fa-graduation-cap text-xl md:text-2xl text-gray-800 mr-2 md:mr-3 transition-colors duration-300"></i>
                        <h3 class="font-heading font-bold text-lg md:text-lg text-gray-800 transition-colors duration-300">{{ __('For Students') }}</h3>
                    </div>
                    <p class="text-gray-800 text-base md:text-sm font-body mb-4 md:mb-4 transition-colors duration-300">{{ __('For Shakarim students') }}</p>
                    <div class="space-y-2 md:space-y-2 text-base md:text-sm font-body">
                        <a href="https://platonus.shakarim.kz/" target="_blank" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• Platonus</a>
                        <a href="https://hub.shakarim.kz/" target="_blank" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• Shakarim Hub</a>
                        <a href="https://kitaphana.shakarim.kz/" target="_blank" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• {{ __('Библиотека') }}</a>
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'shakarim-top-100']) }}" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• Shakarim TOP-100</a>
                    </div>
                </div>

                <!-- Қызметкерлерге блок -->
                <div class="group bg-white rounded-xl p-4 md:p-6 border border-gray-100">
                    <div class="flex items-center mb-3 md:mb-4">
                        <i class="fas fa-users text-xl md:text-2xl text-gray-800 mr-2 md:mr-3 transition-colors duration-300"></i>
                        <h3 class="font-heading font-bold text-lg md:text-lg text-gray-800 transition-colors duration-300">{{ __('For Employees') }}</h3>
                    </div>
                    <p class="text-gray-800 text-base md:text-sm font-body mb-4 md:mb-4 transition-colors duration-300">{{ __('For our employees') }}</p>
                    <div class="space-y-2 md:space-y-2 text-base md:text-sm font-body">
                        <a href="https://platonus.shakarim.kz/" target="_blank" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• Platonus</a>
                        <a href="https://hub.shakarim.kz/" target="_blank" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• Shakarim Hub</a>
                        <a href="{{ route('structure.index', ['locale' => app()->getLocale()]) }}" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• {{ __('Организационная структура') }}</a>
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'mamandarga-arnalgan-kurstar']) }}" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• {{ __('Курсы для профессионалов') }}</a>
                    </div>
                </div>

                <!-- Серіктестерге блок -->
                <div class="group bg-white rounded-xl p-4 md:p-6 border border-gray-100">
                    <div class="flex items-center mb-3 md:mb-4">
                        <i class="fas fa-handshake text-xl md:text-2xl text-gray-800 mr-2 md:mr-3 transition-colors duration-300"></i>
                        <h3 class="font-heading font-bold text-lg md:text-lg text-gray-800 transition-colors duration-300">{{ __('For Partners') }}</h3>
                    </div>
                    <p class="text-gray-800 text-base md:text-sm font-body mb-4 md:mb-4 transition-colors duration-300">{{ __('For our partners') }}</p>
                    <div class="space-y-2 md:space-y-2 text-base md:text-sm font-body">
                        <a href="{{ route('structure.show', ['locale' => app()->getLocale(), 'structure' => 'international-cooperation-center']) }}" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• {{ __('Центр международного сотрудничества') }}</a>
                        <a href="{{ route('science.purchases', ['locale' => app()->getLocale()]) }}" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• {{ __('Научные государственные закупки') }}</a>
                        <a href="{{ route('structure.show', ['locale' => app()->getLocale(), 'structure' => 'public-procurement-department']) }}" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• {{ __('Отдел государственных закупок') }}</a>
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'innovaciialar-narygy']) }}" class="block text-gray-800 hover:text-shakarim-blue transition-colors duration-300 relative hover:bg-gray-100 hover:px-2 hover:-mx-2 rounded transition-all duration-300">• {{ __('Маркет инноваций') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-8 md:py-16 bg-shakarim-blue">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-4 md:gap-8">
                <!-- University Statistics -->
                <div class="bg-white rounded-xl p-4 md:p-8 shadow-lg">
                    <div class="flex items-center mb-4 md:mb-6">
                        <i class="fas fa-chart-line text-2xl md:text-3xl text-shakarim-blue mr-2 md:mr-4"></i>
                        <h3 class="font-heading font-bold text-lg md:text-2xl text-shakarim-blue">{{ __('Shakarim University Indicators') }}</h3>
                    </div>
                    <div class="grid grid-cols-2 gap-3 md:gap-6">
                        <div>
                            <div class="text-3xl md:text-4xl font-heading font-bold text-shakarim-blue mb-1 md:mb-2">57</div>
                            <div class="text-xs md:text-sm font-body text-gray-600">{{ __('Bachelor programs') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-heading font-bold text-shakarim-blue mb-1 md:mb-2">58</div>
                            <div class="text-xs md:text-sm font-body text-gray-600">{{ __('Master programs') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-heading font-bold text-shakarim-blue mb-1 md:mb-2">13</div>
                            <div class="text-xs md:text-sm font-body text-gray-600">{{ __('PhD programs') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-heading font-bold text-slate-600 mb-1 md:mb-2">91</div>
                            <div class="text-xs md:text-sm font-body text-gray-600">{{ __('Years of experience') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-heading font-bold text-slate-600 mb-1 md:mb-2">95%</div>
                            <div class="text-xs md:text-sm font-body text-gray-600">{{ __('Graduate employment rate') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-heading font-bold text-slate-600 mb-1 md:mb-2">5773</div>
                            <div class="text-xs md:text-sm font-body text-gray-600">{{ __('Students') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Rankings -->
                <div class="bg-white rounded-xl p-4 md:p-8 shadow-lg">
                    <div class="flex items-center mb-4 md:mb-6">
                        <i class="fas fa-trophy text-2xl md:text-3xl text-shakarim-blue mr-2 md:mr-4"></i>
                        <h3 class="font-heading font-bold text-lg md:text-2xl text-shakarim-blue">{{ __('Shakarim University in Rankings') }}</h3>
                    </div>
                    <div class="space-y-4 md:space-y-6">
                        <div class="flex flex-col items-start justify-between md:flex-row">
                            <div>
                                <div class="text-lg md:text-2xl font-heading font-bold text-shakarim-blue">{{ __('QS World University Rankings') }}</div>
                                <div class="text-xs md:text-sm font-body text-gray-600 mb-1">{{ __('2026 newly entered') }}</div>
                            </div>
                            <div class="text-2xl md:text-5xl font-heading font-bold text-shakarim-blue opacity-20 mt-1 md:mt-0">1401+</div>
                        </div>

                        <div class="flex flex-col items-start justify-between md:flex-row">
                            <div class="border-t border-gray-200 pt-3 md:pt-4">
                                <div class="text-lg md:text-2xl font-heading font-bold text-shakarim-blue mb-1">{{ __('QS Central Asia Rankings') }}</div>
                                <div class="text-xs md:text-sm font-body text-gray-600 mb-2">{{ __('In 2025 ranking') }}</div>
                                <div class="text-xs md:text-sm font-body text-gray-600"></div>
                            </div>
                            <div class="text-2xl md:text-5xl font-heading font-bold text-shakarim-blue opacity-20 mt-1 md:mt-0 md:text-right">301-350</div>
                        </div>

                        <div class="flex flex-col items-start justify-between md:flex-row">
                            <div class="border-t border-gray-200 pt-3 md:pt-4">
                                <div class="text-lg md:text-2xl font-heading font-bold text-shakarim-blue mb-1">{{ __('AD Scientific Index ranking') }}</div>
                                <div class="text-xs md:text-sm font-body text-gray-600">{{ __('In Kazakhstan') }}</div>
                            </div>
                            <div class="text-2xl md:text-5xl font-heading font-bold text-shakarim-blue opacity-20 mt-1 md:mt-4">#15</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News & Events -->
    <section class="py-6 md:py-8 pb-8 md:pb-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-8">
                <!-- News -->
                <div class="lg:col-span-2">
                    <h2 class="text-lg md:text-2xl font-bold text-shakarim-blue mb-4 md:mb-8">{{ __('News') }}</h2>
                    <div class="space-y-4 md:space-y-6">
                        @foreach($news as $item)
                            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                                <div class="flex flex-col md:flex-row h-auto md:h-48">
                                    <div class="w-full md:w-1/3 relative">
                                        <div class="h-32 md:h-full overflow-hidden bg-gray-100">
                                            <a href="{{ route('news.show', ['news' => $item, 'locale' => app()->getLocale()]) }}">
                                                @if($item->image)
                                                    <img src="{{ $item->getOptimizedImageUrl() }}" alt="news" alt="News" class="w-full h-full object-cover object-center">
                                                @else
                                                    <img src="{{ asset('img/university_building.webp') }}" alt="news" alt="News" class="w-full h-full object-cover object-center">
                                                @endif
                                            </a>

                                        </div>
                                    </div>
                                    <div class="p-3 md:p-4 w-full md:w-2/3 flex flex-col justify-between">
                                        <div>
                                            <div class="text-xs md:text-sm text-gray-500 mb-1 md:mb-2">
                                                {{ $item->getFormattedDate() }}
                                            </div>
                                            <a href="{{ route('news.show', ['news' => $item, 'locale' => app()->getLocale()]) }}">
                                                <h3 class="text-sm md:text-lg font-semibold mb-2 md:mb-3 hover:text-shakarim-blue cursor-pointer line-clamp-2">
                                                    {{ $item->{'title_' . app()->getLocale()} }}
                                                </h3>
                                            </a>
                                            <p class="text-gray-600 mb-2 md:mb-4 line-clamp-2 md:line-clamp-3 text-sm md:text-xs">
                                                {{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($item->{'content_' . app()->getLocale()})), 140) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <div class="text-center mt-6 md:mt-8">
                        <a href="{{ route('news', ['locale' => app()->getLocale()]) }}" 
                        class="bg-shakarim-blue text-white px-6 py-2 md:px-8 md:py-3 rounded-lg hover:bg-blue-700 transition text-sm md:text-base">
                            {{ __('All news') }}
                        </a>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6 md:space-y-8">
                    <!-- Events -->
                    <div class="bg-white rounded-xl shadow-md p-4 md:p-6">
                        <h3 class="text-lg md:text-xl font-bold text-shakarim-blue mb-4 md:mb-6">{{ __('Events') }}</h3>
                        <div class="space-y-3 md:space-y-4 grid grid-cols-1 gap-3 md:gap-4">
                            @foreach($announcements as $item)
                                <a href="{{ route('announcements.show', ['locale' => app()->getLocale(), 'id' => $item->id]) }}">
                                    <div class="border-l-4 border-shakarim-blue pl-3 md:pl-4">
                                        <div class="text-xs md:text-sm text-gray-500">{{ \Carbon\Carbon::createFromTimestamp($item->created_at)->locale(app()->getLocale())->isoFormat('D MMMM') }}</div>
                                        <h4 class="font-semibold text-sm md:text-base">{{ $item->{'name'} }}</h4>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Quick Access -->
                    <div class="bg-shakarim-blue text-white rounded-xl p-4 md:p-6">
                        <h3 class="text-lg md:text-xl font-bold mb-4 md:mb-6">{{ __('Quick Access') }}</h3>
                        <div class="space-y-2 md:space-y-3">
                            <a href="https://platonus.shakarim.kz" target="_blank"
                            class="block bg-white bg-opacity-20 p-2 md:p-3 rounded-lg hover:bg-opacity-30 transition text-sm md:text-base">
                                <i class="fas fa-user mr-2"></i> Platonus
                            </a>
                            <a href="https://hub.shakarim.kz" target="_blank"
                            class="block bg-white bg-opacity-20 p-2 md:p-3 rounded-lg hover:bg-opacity-30 transition text-sm md:text-base">
                                <i class="fas fa-envelope mr-2"></i> Shakarim Hub
                            </a>
                            <a href="https://mooc.semgu.kz" target="_blank"
                            class="block bg-white bg-opacity-20 p-2 md:p-3 rounded-lg hover:bg-opacity-30 transition text-sm md:text-base">
                                <i class="fas fa-book mr-2"></i> Moodle
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Links -->
    <section class="py-8 md:py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 10]) }}" class="group">
                    <div class="group bg-white p-4 md:p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center h-full flex flex-col justify-center">
                        <i class="fas fa-user-graduate text-2xl md:text-3xl text-shakarim-blue group-hover:text-white mb-2 md:mb-4 transition-colors"></i>
                        <h3 class="font-semibold font-heading mb-1 md:mb-2 text-gray-800 group-hover:text-white transition-colors text-xs md:text-base">{{ __('For Students') }}</h3>
                        <p class="text-xs md:text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Study process, scholarship, accommodation') }}</p>
                    </div>
                </a>                
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 28]) }}" class="group">
                    <div class="group bg-white p-4 md:p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center h-full flex flex-col justify-center">
                        <i class="fas fa-flask text-2xl md:text-3xl text-shakarim-blue group-hover:text-white mb-2 md:mb-4 transition-colors"></i>
                        <h3 class="font-semibold font-heading mb-1 md:mb-2 text-gray-800 group-hover:text-white transition-colors text-xs md:text-base">{{ __('Science') }}</h3>
                        <p class="text-xs md:text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Research, projects, publications') }}</p>
                    </div>
                </a>
                
                <a href="https://kitaphana.shakarim.kz" target="_blank" class="group">
                    <div class="bg-white p-4 md:p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center h-full flex flex-col justify-center">
                        <i class="fas fa-book text-2xl md:text-3xl text-shakarim-blue group-hover:text-white mb-2 md:mb-4 transition-colors"></i>
                        <h3 class="font-semibold font-heading mb-1 md:mb-2 text-gray-800 group-hover:text-white transition-colors text-xs md:text-base">{{ __('Library') }}</h3>
                        <p class="text-xs md:text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Electronic and print resources/books') }}</p>
                    </div>
                </a>
                <a href="{{ route('rector.blog', ['locale' => app()->getLocale()]) }}" class="group">
                    <div class="group bg-white p-4 md:p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center h-full flex flex-col justify-center">
                        <i class="fas fa-user-edit text-2xl md:text-3xl text-shakarim-blue group-hover:text-white mb-2 md:mb-4 transition-colors"></i>
                        <h3 class="font-semibold font-heading mb-1 md:mb-2 text-gray-800 group-hover:text-white transition-colors text-xs md:text-base">{{ __('Блог ректора') }}</h3>
                        <p class="text-xs md:text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Стратегия развития и ответы на вопросы') }}</p>
                    </div>
                </a>
                <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'tagylymdama-boiynsa-seriktes-uiymdar']) }}" class="group">
                    <div class="group bg-white p-4 md:p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center h-full flex flex-col justify-center">
                        <i class="fas fa-briefcase text-2xl md:text-3xl text-shakarim-blue group-hover:text-white mb-2 md:mb-4 transition-colors"></i>
                        <h3 class="font-semibold font-heading mb-1 md:mb-2 text-gray-800 group-hover:text-white transition-colors text-xs md:text-base">{{ __('Career') }}</h3>
                        <p class="text-xs md:text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Job opportunities and internships for students') }}</p>
                    </div>
                </a>
                <a href="{{ route('structure.show', ['locale' => app()->getLocale(), 'structure' => 'international-cooperation-center']) }}" class="group">
                    <div class="group bg-white p-4 md:p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center h-full flex flex-col justify-center">
                        <i class="fas fa-globe text-2xl md:text-3xl text-shakarim-blue group-hover:text-white mb-2 md:mb-4 transition-colors"></i>
                        <h3 class="font-semibold font-heading mb-1 md:mb-2 text-gray-800 group-hover:text-white transition-colors text-xs md:text-base">{{ __('International cooperation') }}</h3>
                        <p class="text-xs md:text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Partnerships and exchange programs') }}</p>
                    </div>
                </a>
                <a href="{{ route('under-development', ['locale' => app()->getLocale()]) }}" class="group">
                    <div class="group bg-white p-4 md:p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center h-full flex flex-col justify-center">
                        <i class="fas fa-donate text-2xl md:text-3xl text-shakarim-blue group-hover:text-white mb-2 md:mb-4 transition-colors"></i>
                        <h3 class="font-semibold font-heading mb-1 md:mb-2 text-gray-800 group-hover:text-white transition-colors text-xs md:text-base">{{ __('Endowment') }}</h3>
                        <p class="text-xs md:text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Make a contribution to the development of the university') }}</p>
                    </div>
                </a>
                <a href="{{ route('under-development', ['locale' => app()->getLocale()]) }}" class="group">
                    <div class="group bg-white p-4 md:p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center h-full flex flex-col justify-center">
                        <i class="fas fa-robot text-2xl md:text-3xl text-shakarim-blue group-hover:text-white mb-2 md:mb-4 transition-colors"></i>
                        <h3 class="font-semibold font-heading mb-1 md:mb-2 text-gray-800 group-hover:text-white transition-colors text-xs md:text-base">{{ __('Virtual Assistant') }}</h3>
                        <p class="text-xs md:text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Online help for students and teachersy') }}</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Partners Section -->
    <section class="py-6 md:py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-8 md:mb-12">
                <h2 class="text-lg md:text-2xl font-bold text-shakarim-blue mb-4 flex items-center justify-center">
                    <i class="fas fa-handshake text-sm md:text-base mr-2"></i>
                    {{ __('Наши партнеры') }}
                </h2>
            </div>
            
            <div class="relative flex items-center">
                <!-- Left Arrow -->
                <button id="partnersPrev" class="absolute left-0 z-10 bg-white shadow-lg rounded-full p-2 md:p-3 text-shakarim-blue hover:bg-shakarim-blue hover:text-white transition-colors hidden">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <!-- Partners container -->
                <div class="overflow-x-hidden scrollbar-hide flex-1 mx-8 md:mx-12" id="partnersContainer">
                    <div id="partnersWrapper" class="flex justify-center gap-6 md:gap-8 pb-4">
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 min-h-12 md:min-h-16 flex items-center justify-center p-2 md:p-3">
                            <a href="https://farabi.university/" target="_blank"><img src="{{ Storage::url('partners/farabi.webp') }}" alt="farabi" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 min-h-12 md:min-h-16 flex items-center justify-center p-2 md:p-3">
                            <a href="https://abu.edu.kz/" target="_blank"><img src="{{ Storage::url('partners/ABU.webp') }}" alt="ABU" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 min-h-12 md:min-h-16 flex items-center justify-center p-2 md:p-3">
                            <a href="https://global.kduniv.ac.kr/" target="_blank"><img src="{{ Storage::url('partners/KDU.webp') }}" alt="KDU" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 min-h-12 md:min-h-16 flex items-center justify-center p-2 md:p-3">
                            <a href="http://eurostudies.pl/" target="_blank"><img src="{{ Storage::url('partners/WSG.webp') }}" alt="WSG" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 min-h-12 md:min-h-16 flex items-center justify-center p-2 md:p-3">
                            <a href="https://astanait.edu.kz/" target="_blank"><img src="{{ Storage::url('partners/AITU.webp') }}" alt="AITU" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 min-h-12 md:min-h-16 flex items-center justify-center p-2 md:p-3">
                            <a href="https://dulaty.kz/" target="_blank"><img src="{{ Storage::url('partners/dulati.webp') }}" alt="dulati" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 min-h-12 md:min-h-16 flex items-center justify-center p-2 md:p-3">
                            <a href="https://mephi.ru/" target="_blank"><img src="{{ Storage::url('partners/mifi.webp') }}" alt="mifi" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 min-h-12 md:min-h-16 flex items-center justify-center p-2 md:p-3">
                            <a href="https://www.pittstate.edu/" target="_blank"><img src="{{ Storage::url('partners/pittstate.webp') }}" alt="pittstate" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 min-h-12 md:min-h-16 flex items-center justify-center p-2 md:p-3">
                            <a href="https://en.lzu.edu.cn/" target="_blank"><img src="{{ Storage::url('partners/lanzhou.webp') }}" alt="lanzhou" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 min-h-12 md:min-h-16 flex items-center justify-center p-2 md:p-3">
                            <a href="https://www.docmen-project.pl/" target="_blank"><img src="{{ Storage::url('partners/docmen.webp') }}" alt="docmen" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 min-h-12 md:min-h-16 flex items-center justify-center p-2 md:p-3">
                            <a href="#" target="_blank"><img src="{{ Storage::url('partners/complete.webp') }}" alt="complete" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 min-h-12 md:min-h-16 flex items-center justify-center p-2 md:p-3">
                            <a href="https://se-btrz.com/" target="_blank"><img src="{{ Storage::url('partners/SE.webp') }}" alt="SE" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 min-h-12 md:min-h-16 flex items-center justify-center p-2 md:p-3">
                            <a href="https://abai-museum.kz/" target="_blank"><img src="{{ Storage::url('partners/abaimuseum.webp') }}" alt="abaimuseum" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 min-h-12 md:min-h-16 flex items-center justify-center p-2 md:p-3">
                            <a href="#" target="_blank"><img src="{{ Storage::url('partners/semeymchs.webp') }}" alt="semeymchs" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                    </div>
                </div>
                
                <!-- Right Arrow -->
                <button id="partnersNext" class="absolute right-0 z-10 bg-white shadow-lg rounded-full p-2 md:p-3 text-shakarim-blue hover:bg-shakarim-blue hover:text-white transition-colors hidden">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/custom/slider.js') }}"></script>
    <script src="{{ asset('js/custom/slider2.js') }}"></script>
    
</x-layout>