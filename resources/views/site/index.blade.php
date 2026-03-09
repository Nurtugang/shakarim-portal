@vite(['resources/css/custom/slider.css'])

<x-layout>

    <!-- Hero Section with Slider -->
    <section>
        <div class="max-w-full mx-auto">
            <div id="unique-hero-slider">
                <div class="slider-container overflow-hidden">
                    @foreach($sliderNews as $slideNews)
                        <div class="slide @if($loop->first) active @endif">
                            <div class="slide-inner">
                                <div class="slide-content">
                                    <div class="content-wrapper">
                                        <h2 class="slide-title">{{ $slideNews->{'title_' . app()->getLocale()} }}</h2>
                                        <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'news' => $slideNews->alias]) }}">
                                            <button class="slide-button">{{ __('More') }}</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="slide-image-box" style="background-image: url('{{ $slideNews->getSliderImageUrl() }}');"></div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Slide: Tokayev -->
                    <div class="slide @if($sliderNews->isEmpty()) active @endif">
                        <div class="slide-inner">
                            <div class="slide-content">
                                <div class="content-wrapper">
                                    <h2 class="slide-title">{{ __('Message from the Head of State Kassym-Jomart Tokayev to the people of Kazakhstan') }}</h2>
                                    <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'news' => 'duman-orynbekov-sakarim-universitetinin-rektory-texnologiialyq-serpilis-pen-cifrlyq-transformaciia-sakarim-universitetinin-zoldaudan-tuyndaityn-zana-bastamalarga-ulesi']) }}">
                                        <button class="slide-button">{{ __('More') }}</button>
                                    </a>
                                </div>
                            </div>
                            <div class="slide-image-box" style="background-image: url('/img/tokaev.webp');"></div>
                        </div>
                    </div>

                    <div class="slide @if($sliderNews->isEmpty()) active @endif">
                        <div class="slide-inner">
                            <div class="slide-content">
                                <div class="content-wrapper">
                                    <h2 class="slide-title">{{ __('Admissions Office for applicants to Shakarim University') }}</h2>
                                    <a href="https://promo.shakarim.kz/ru/">
                                        <button class="slide-button">{{ __('More') }}</button>
                                    </a>
                                </div>
                            </div>
                            <div class="slide-image-box" style="background-image: url('/img/jpg.jpg');"></div>
                        </div>
                    </div>

                    <!-- Slide: AI Sana -->
                    <div class="slide">
                        <div class="slide-inner">
                            <div class="slide-content">
                                <div class="content-wrapper">
                                    <h2 class="slide-title">{{ __('Shakarim University AI-Sana Program Results') }}</h2>
                                    <div class="slide-stats">
                                        <div class="stat">
                                            <span class="stat-number">5</span>
                                            <span class="stat-label">{{ __('AI Agents') }}</span>
                                        </div>
                                        <div class="stat">
                                            <span class="stat-number">5</span>
                                            <span class="stat-label">{{ __('Ready solutions') }}</span>
                                        </div>
                                        <div class="stat">
                                            <span class="stat-number">0</span>
                                            <span class="stat-label">{{ __('In development') }}</span>
                                        </div>
                                        <div class="stat">
                                            <span class="stat-number">∞</span>
                                            <span class="stat-label">{{ __('Opportunities') }}</span>
                                        </div>
                                    </div>
                                    <a target="_blank" href="https://aisana.shakarim.kz/">
                                        <button class="slide-button">{{ __('More') }}</button>
                                    </a>
                                </div>
                            </div>
                            <div class="slide-image-box" style="background-image: url('/img/ai_sana.webp');"></div>
                        </div>
                    </div>

                    <!-- Slide: QS -->
                    <div class="slide">
                        <div class="slide-inner">
                            <div class="slide-content">
                                <div class="content-wrapper">
                                    <h2 class="slide-title">{{ __('QS World University Rankings 2026') }}</h2>
                                    <div class="slide-stats">
                                        <div class="stat">
                                            <span class="stat-number">1401+</span>
                                            <span class="stat-label">{{ __('в мире') }}</span>
                                        </div>
                                        <div class="stat">
                                            <span class="stat-number">493</span>
                                            <span class="stat-label">{{ __('в Азии') }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'news' => 'shakarim-university-aziianyn-uzdik-500-universitetinin-qatarynda']) }}">
                                        <button class="slide-button">{{ __('Подробнее') }}</button>
                                    </a>
                                </div>
                            </div>
                            <div class="slide-image-box" style="background-image: url('/img/qs_world_university_rankings_asia.webp');"></div>
                        </div>
                    </div>

                    @php
                        $totalSlides = $sliderNews->count() + 3;
                    @endphp

                    @if($totalSlides > 1)
                        <!-- Navigation Arrows -->
                        <button class="nav-arrow prev" onclick="previousSlide()">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="nav-arrow next" onclick="nextSlide()">
                            <i class="fas fa-chevron-right"></i>
                        </button>

                        <!-- Navigation Dots -->
                        <div class="slide-dots">
                            @for ($i = 0; $i < $totalSlides; $i++)
                                <button class="slide-dot @if($i == 0) active @endif" data-slide="{{ $i }}"></button>
                            @endfor
                        </div>
                    @endif
                 </div>
            </div>
        </div>
    </section>

    @php
        $referendumBannerPath = 'banners/referendum.png';
        $referendumBannerUrl = Storage::disk('public')->exists($referendumBannerPath)
            ? Storage::url($referendumBannerPath)
            : 'https://farabi.university/static/img/content/referendum.png';
    @endphp
    <section class="referendum-banner" style="width: 100%; padding:0;margin:20px; overflow: hidden; background: #fff;">
        <a href="https://www.election.gov.kz/kaz/" style="display: flex; justify-content: center; align-items: center; width: 100%;" tabindex="0">
            <img src="{{ $referendumBannerUrl }}" alt="Референдум 15 марта" title="Референдум 15 марта - Әркайсымыздың дауысымыз маңызды! Важен голос каждого из нас!" style="width: 50%; height: auto; display: block; max-height: 150px; object-fit: cover;">
        </a>
    </section>

    <!-- Useful Links Section -->
    <section class="py-6 md:py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
                <!-- University Block -->
                <div class="bg-white rounded-xl p-3 md:p-6 shadow-md border-2 border-transparent hover:border-shakarim-blue hover:shadow-xl transition-all duration-300">
                    <div class="flex flex-col items-center text-center mb-3 md:mb-4">
                        <div class="w-8 h-8 md:w-12 md:h-12 bg-shakarim-blue rounded-2xl flex items-center justify-center mb-2 md:mb-3">
                            <i class="fas fa-university text-sm md:text-xl text-white"></i>
                        </div>
                        <h3 class="font-heading font-bold text-sm md:text-lg text-gray-800">{{ __('University') }}</h3>
                    </div>
                    <div class="space-y-1.5 md:space-y-2">
                        <a href="{{ route('university.about.index', ['locale' => app()->getLocale()]) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-info-circle mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Об университете') }}</span>
                        </a>
                        <a href="https://shakarim.kz/" target="_blank" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-user-circle mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Шәкәрім Құдайбердіұлы') }}</span>
                        </a>
                        
                        <a href="{{ route('app.index', app()->getLocale()) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-mobile-alt mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Mobile App') }}</span>
                        </a>
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'virtualdy-tur']) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-vr-cardboard mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Виртуальный тур') }}</span>
                        </a>
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'sybailas-zemqorlyqsyz-universitet']) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-globe mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Сыбайлас жемқорлықсыз университет') }}</span>
                        </a>
                    </div>
                </div>

                <!-- For Applicants Block -->
                <div class="bg-white rounded-xl p-3 md:p-6 shadow-md border-2 border-transparent hover:border-shakarim-blue hover:shadow-xl transition-all duration-300">
                    <div class="flex flex-col items-center text-center mb-3 md:mb-4">
                        <div class="w-8 h-8 md:w-12 md:h-12 bg-shakarim-blue rounded-2xl flex items-center justify-center mb-2 md:mb-3">
                            <i class="fas fa-user-graduate text-sm md:text-xl text-white"></i>
                        </div>
                        <h3 class="font-heading font-bold text-sm md:text-lg text-gray-800">{{ __('For Applicants') }}</h3>
                    </div>
                    <div class="space-y-1.5 md:space-y-2">
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'pandik-olimpiadalar-men-baiqaular']) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-book-open mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Конкурсы и Предметные олимпиады') }}</span>
                        </a>
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'xalyqaralyq-bagdarlamamlar']) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-globe mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Халықаралық бағдарламамлар') }}</span>
                        </a>
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'akademiialyq-utqyrlyq']) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-exchange-alt mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Академиялық ұтқырлық') }}</span>
                        </a>
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'kampus-resurstary-men-qyzmetter']) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-building mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Кампус ресурстары') }}</span>
                        </a>
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'qabyldau-komissiiasymen-bailanystary']) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-phone mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Приемная комиссия') }}</span>
                        </a>
                        <a href="{{ route('public-reception.index', ['locale' => app()->getLocale()]) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-envelope mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Общественный прием') }}</span>
                        </a>
                    </div>
                </div>

                <!-- For Students Block -->
                <div class="bg-white rounded-xl p-3 md:p-6 shadow-md border-2 border-transparent hover:border-shakarim-blue hover:shadow-xl transition-all duration-300">
                    <div class="flex flex-col items-center text-center mb-3 md:mb-4">
                        <div class="w-8 h-8 md:w-12 md:h-12 bg-shakarim-blue rounded-2xl flex items-center justify-center mb-2 md:mb-3">
                            <i class="fas fa-book-reader text-sm md:text-xl text-white"></i>
                        </div>
                        <h3 class="font-heading font-bold text-sm md:text-lg text-gray-800">{{ __('For Students') }}</h3>
                    </div>
                    <div class="space-y-1.5 md:space-y-2">
                        <a href="{{ route('academy.schools', ['locale' => app()->getLocale()]) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-school mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Высшие/Исследовательские школы') }}</span>
                        </a>
                        <a href="https://platonus.shakarim.kz/" target="_blank" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-laptop mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">Platonus</span>
                        </a>
                        <a href="https://hub.shakarim.kz/" target="_blank" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-inbox mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">Shakarim Hub</span>
                        </a>
                        <a href="https://kitaphana.shakarim.kz/" target="_blank" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-book mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Библиотека') }}</span>
                        </a>
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'bilim-alusynyn-zolsiltemesi']) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-map-marked-alt mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Путеводитель обучающегося') }}</span>
                        </a>
                    </div>
                </div>

                <!-- For Partners Block -->
                <div class="bg-white rounded-xl p-3 md:p-6 shadow-md border-2 border-transparent hover:border-shakarim-blue hover:shadow-xl transition-all duration-300">
                    <div class="flex flex-col items-center text-center mb-3 md:mb-4">
                        <div class="w-8 h-8 md:w-12 md:h-12 bg-shakarim-blue rounded-2xl flex items-center justify-center mb-2 md:mb-3">
                            <i class="fas fa-handshake text-sm md:text-xl text-white"></i>
                        </div>
                        <h3 class="font-heading font-bold text-sm md:text-lg text-gray-800">{{ __('For Partners') }}</h3>
                    </div>
                    <div class="space-y-1.5 md:space-y-2">
                        <a href="{{ route('structure.show', ['locale' => app()->getLocale(), 'structure' => 'international-cooperation-center']) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-globe-americas mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Центр международного сотрудничества') }}</span>
                        </a>
                        <a href="{{ route('science.purchases', ['locale' => app()->getLocale()]) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-flask mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Научные закупки') }}</span>
                        </a>
                        <a href="https://agrohub.shakarim.kz/" target="_blank"
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-shopping-cart mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">AgroHub</span>
                        </a>
                        <a href="{{ route('page', ['locale' => app()->getLocale(), 'page' => 'innovaciialar-narygy']) }}" 
                        class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                            <i class="fas fa-lightbulb mr-1.5 md:mr-2 text-xs"></i>
                            <span class="font-body text-xs md:text-sm">{{ __('Маркет инноваций') }}</span>
                        </a>
                        <a href="{{ route('university.endowment.index', ['locale' => app()->getLocale()]) }}" 
                            class="flex items-center px-2 py-1.5 md:px-3 md:py-2 text-xs md:text-sm bg-gray-50 rounded-lg hover:bg-shakarim-blue hover:text-white transition-colors duration-200">
                                <i class="fas fa-donate mr-1.5 md:mr-2 text-xs"></i>
                                <span class="font-body text-xs md:text-sm">{{ __('Endowment') }}</span>
                            </a>
                        </a>
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
                            <div class="text-3xl md:text-4xl font-heading font-bold text-shakarim-blue mb-1 md:mb-2">72</div>
                            <div class="text-xs md:text-sm font-body text-gray-600">{{ __('Bachelor programs') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-heading font-bold text-shakarim-blue mb-1 md:mb-2">60</div>
                            <div class="text-xs md:text-sm font-body text-gray-600">{{ __('Master programs') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-heading font-bold text-shakarim-blue mb-1 md:mb-2">10</div>
                            <div class="text-xs md:text-sm font-body text-gray-600">{{ __('PhD programs') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-heading font-bold text-slate-600 mb-1 md:mb-2">91</div>
                            <div class="text-xs md:text-sm font-body text-gray-600">{{ __('Years of experience') }}</div>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-heading font-bold text-slate-600 mb-1 md:mb-2">90%</div>
                            <div class="text-xs md:text-sm font-body text-gray-600">{{ __('Graduate employment rate') }}</div>
                        </div>

                        <div>
                            <div class="text-3xl md:text-4xl font-heading font-bold text-slate-600 mb-1 md:mb-2">
                                {{ $regularStudents }}
                            </div>
                            <div class="text-xs md:text-sm font-body text-gray-600">{{ __('Students') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Rankings -->
                <div class="bg-white rounded-xl p-4 md:p-8 shadow-lg">
                    <div class="flex items-center mb-4 md:mb-6">
                        <i class="fas fa-trophy text-2xl md:text-3xl text-shakarim-blue mr-2 md:mr-4"></i>
                        <h3 class="font-heading font-bold text-md md:text-2xl text-shakarim-blue">{{ __('Shakarim University in Rankings') }}</h3>
                    </div>
                    <div class="space-y-4 md:space-y-6">
                        <!-- QS World University Rankings -->
                        <div class="flex flex-col md:flex-row justify-between">
                            <div>
                                <div class="text-md md:text-xl font-heading font-bold text-shakarim-blue mb-1">
                                    QS World University Rankings
                                </div>
                                <div class="text-xs md:text-sm font-body text-gray-600">
                                    {{ __('2026 newly entered') }}
                                </div>
                            </div>
                            <div class="ml-auto w-24 md:w-40 text-right text-xl md:text-5xl font-heading font-bold text-shakarim-blue opacity-20">
                                1401+
                            </div>
                        </div>

                        <!-- QS Sustainability Rankings -->
                        <div class="pt-1 flex flex-col md:flex-row justify-between">
                            <div>
                                <div class="text-md md:text-xl font-heading font-bold text-shakarim-blue mb-1">
                                    QS Sustainability Rankings
                                </div>
                                <div class="text-xs md:text-sm font-body text-gray-600">
                                    {{ __('In 2026 rankings') }}
                                </div>
                            </div>
                            <div class="ml-auto w-24 md:w-40 text-right text-xl md:text-5xl font-heading font-bold text-shakarim-blue opacity-20">
                                1501+
                            </div>
                        </div>

                        <!-- QS Asia -->
                        <div class="pt-1 flex flex-col md:flex-row justify-between">
                            <div>
                                <div class="text-md md:text-xl font-heading font-bold text-shakarim-blue mb-1">
                                    QS World University Rankings: Asia
                                </div>
                                <div class="text-xs md:text-sm font-body text-gray-600">
                                    {{ __('In 2026 rankings') }}
                                </div>
                            </div>
                            <div class="ml-auto w-24 md:w-40 text-right text-xl md:text-5xl font-heading font-bold text-shakarim-blue opacity-20">
                                493
                            </div>
                        </div>

                        <!-- UI Green Metric -->
                        <div class="pt-1 flex flex-col md:flex-row justify-between">
                            <div>
                                <div class="text-md md:text-xl font-heading font-bold text-shakarim-blue mb-1">
                                    UI Green Metric
                                </div>
                                <div class="text-xs md:text-sm font-body text-gray-600">
                                    {{ __('In Kazakhstan') }}
                                </div>
                            </div>
                            <div class="ml-auto w-24 md:w-40 text-right text-xl md:text-5xl font-heading font-bold text-shakarim-blue opacity-20">
                                #5
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- YouTube Channels -->
    <section class="py-6 md:py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Main YouTube Channel Block - Full Width -->
            <a href="https://www.youtube.com/@ShakarimUniversity-v4m/videos" target="_blank" rel="noopener noreferrer" 
               class="group bg-gradient-to-r from-shakarim-blue via-blue-700 to-blue-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 flex flex-col md:flex-row items-center justify-between p-6 md:p-10 text-white mb-4 md:mb-6">
                <div class="flex-1 text-center md:text-left mb-4 md:mb-0 md:mr-8">
                    <h3 class="font-heading font-bold text-2xl md:text-3xl mb-3">Shakarim Media</h3>
                    <p class="text-sm md:text-lg text-blue-100 mb-4 max-w-2xl">{{ __('Видео материалы о жизни и деятельности университета') }}</p>
                    <span class="inline-flex items-center text-sm md:text-base font-medium text-white group-hover:underline">
                        {{ __('Перейти на YouTube') }}
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </span>
                </div>
                <div class="w-24 h-24 md:w-36 md:h-36 rounded-full bg-white/10 backdrop-blur flex items-center justify-center group-hover:scale-110 transition-transform duration-300 flex-shrink-0">
                    <svg class="w-12 h-12 md:w-16 md:h-16 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </div>
            </a>

            <!-- Video Preview Block -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                <!-- Video 1 -->
                <div class="group relative bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 w-full cursor-pointer">
                    <div class="relative aspect-video bg-gray-200 overflow-hidden">
                        <img src="{{ Storage::url('banners/mqdefault_6s.webp') }}" 
                             alt="{{ __('Видео университета') }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition-colors"></div>
                        <a href="javascript:void(0)" class="absolute inset-0 flex items-center justify-center js-video-button" data-video-id="GRHlEur_w2s">
                            <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-white/90 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <svg class="w-8 h-8 md:w-10 md:h-10 text-shakarim-blue ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div class="p-4 md:p-5">
                        <h4 class="font-heading font-bold text-shakarim-blue text-base md:text-lg mb-1">{{ __('Основной YouTube канал') }}</h4>
                        <p class="text-sm text-gray-500">{{ __('Официальный канал университета') }}</p>
                    </div>
                </div>

                <!-- Video 2 -->
                <div class="group relative bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 w-full cursor-pointer">
                    <div class="relative aspect-video bg-gray-200 overflow-hidden">
                        <img src="{{ Storage::url('banners/mqdefault_55.webp') }}" 
                             alt="{{ __('Видео университета') }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition-colors"></div>
                        <a href="javascript:void(0)" class="absolute inset-0 flex items-center justify-center js-video-button" data-video-id="2Wug2boH_Xk">
                            <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-white/90 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <svg class="w-8 h-8 md:w-10 md:h-10 text-shakarim-blue ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div class="p-4 md:p-5">
                        <h4 class="font-heading font-bold text-shakarim-blue text-base md:text-lg mb-1">{{ __('Второй YouTube канал') }}</h4>
                        <p class="text-sm text-gray-500">{{ __('Шәкәрім университеті') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Modal -->
    <div id="videoModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 backdrop-blur-sm p-4">
        <div class="relative w-full max-w-4xl">
            <button id="closeVideoModal" class="absolute -top-10 right-0 md:-right-10 z-10 w-10 h-10 flex items-center justify-center bg-white/10 hover:bg-white/20 rounded-full text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="relative aspect-video bg-black rounded-xl overflow-hidden shadow-2xl">
                <iframe id="videoIframe" class="w-full h-full" frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('videoModal');
            var iframe = document.getElementById('videoIframe');
            var closeBtn = document.getElementById('closeVideoModal');
            var videoButtons = document.querySelectorAll('.js-video-button');

            videoButtons.forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    var videoId = this.getAttribute('data-video-id');
                    iframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    document.body.style.overflow = 'hidden';
                });
            });

            function closeModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                iframe.src = '';
                document.body.style.overflow = '';
            }

            closeBtn.addEventListener('click', closeModal);
            modal.addEventListener('click', function(e) {
                if (e.target === modal) closeModal();
            });
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') closeModal();
            });
        });
    </script>
<!-- News & Events -->
    <section class="py-6 md:py-8 pb-8 md:pb-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-8">
                <!-- News -->
                <div class="lg:col-span-2" x-data="{ viewMode: 'list' }">
                    <div class="flex items-center justify-between mb-4 md:mb-8">
                        <h2 class="text-lg md:text-2xl font-bold text-shakarim-blue">{{ __('News') }}</h2>
                        <!-- Buttons (Скрыты на мобильных: hidden md:flex) -->
                        <div class="hidden md:flex space-x-2">
                            <button @click="viewMode = 'grid'" 
                                    :class="viewMode === 'grid' ? 'bg-shakarim-blue text-white' : 'bg-gray-100 text-gray-700'"
                                    class="inline-flex items-center justify-center w-8 h-8 md:w-10 md:h-10 rounded-lg hover:bg-shakarim-blue hover:text-white transition duration-200"
                                    title="{{ __('Сетка')}}">
                                <i class="fas fa-th"></i>
                            </button>
                            <button @click="viewMode = 'list'" 
                                    :class="viewMode === 'list' ? 'bg-shakarim-blue text-white' : 'bg-gray-100 text-gray-700'"
                                    class="inline-flex items-center justify-center w-8 h-8 md:w-10 md:h-10 rounded-lg hover:bg-shakarim-blue hover:text-white transition duration-200"
                                    title="{{ __('Список')}}">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>

                    <!-- LIST VIEW (Default) -->
                    <div x-show="viewMode === 'list'" class="space-y-4 md:space-y-6">
                        @foreach($news as $item)
                            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                                <div class="flex flex-col md:flex-row h-auto md:h-48">
                                    <div class="w-full md:w-1/3 relative">
                                        <div class="h-32 md:h-full overflow-hidden bg-gray-100">
                                            <a href="{{ route('news.show', ['news' => $item, 'locale' => app()->getLocale()]) }}">
                                                @if($item->image)
                                                    <img src="{{ $item->getThumbnailUrl() }}" alt="News" class="w-full h-full object-cover object-center">
                                                @else
                                                    <img src="{{ asset('img/stub.webp') }}" alt="News" class="w-full h-full object-cover object-center">
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

                    <!-- GRID VIEW -->
                    <div x-show="viewMode === 'grid'" style="display: none;" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($news as $item)
                            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition flex flex-col h-full">
                                <div class="h-48 overflow-hidden bg-gray-100 relative">
                                    <a href="{{ route('news.show', ['news' => $item, 'locale' => app()->getLocale()]) }}">
                                        @if($item->image)
                                            <img src="{{ $item->getThumbnailUrl() }}" alt="News" class="w-full h-full object-cover object-center hover:scale-105 transition-transform duration-300">
                                        @else
                                            <img src="{{ asset('img/stub.webp') }}" alt="News" class="w-full h-full object-cover object-center hover:scale-105 transition-transform duration-300">
                                        @endif
                                    </a>
                                </div>
                                <div class="p-4 flex flex-col flex-1 justify-between">
                                    <div>
                                        <div class="text-xs text-gray-500 mb-2">
                                            {{ $item->getFormattedDate() }}
                                        </div>
                                        <a href="{{ route('news.show', ['news' => $item, 'locale' => app()->getLocale()]) }}">
                                            <h3 class="text-sm md:text-base font-semibold mb-3 hover:text-shakarim-blue cursor-pointer line-clamp-3">
                                                {{ $item->{'title_' . app()->getLocale()} }}
                                            </h3>
                                        </a>
                                    </div>
                                    <a href="{{ route('news.show', ['news' => $item, 'locale' => app()->getLocale()]) }}" 
                                       class="text-shakarim-blue text-sm hover:underline mt-auto">
                                        {{ __('Подробнее') }} &rarr;
                                    </a>
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
                        <h3 class="text-lg md:text-xl font-bold text-shakarim-blue mb-4 md:mb-6">{{ __('Объявления') }}</h3>
                        <div class="space-y-3 md:space-y-4 grid grid-cols-1 gap-3 md:gap-4">
                            @foreach($announcements as $item)
                                <a href="{{ route('announcements.show', ['locale' => app()->getLocale(), 'id' => $item->id]) }}">
                                    <div class="border-l-4 {{ $item->type && $item->type->value === 'competition' ? 'border-orange-500' : 'border-shakarim-blue' }} pl-3 md:pl-4">
                                        <div class="flex items-center gap-2 mb-1">
                                            <div class="text-xs md:text-sm text-gray-500">{{ \Carbon\Carbon::createFromTimestamp($item->date)->locale(app()->getLocale())->isoFormat('D MMMM') }}</div>
                                            @if($item->type && $item->type->value === 'competition')
                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-semibold bg-orange-100 text-orange-700">
                                                    <i class="fas fa-trophy text-xs"></i>
                                                </span>
                                            @endif
                                        </div>
                                        <h4 class="font-semibold text-sm md:text-base">{{ $item->{'name'} }}</h4>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('announcements.index', ['locale' => app()->getLocale()]) }}" 
                        class="inline-block bg-shakarim-blue text-white px-4 py-2 md:px-6 md:py-2 rounded-lg hover:bg-blue-700 transition text-sm md:text-base">
                            {{ __('Все объявления') }}
                        </a>
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
                            <a href="https://mooc.shakarim.kz" target="_blank"
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
                <a href="{{ route('internship.index', ['locale' => app()->getLocale()]) }}" class="group">
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
                <a href="{{ route('awards.index', ['locale' => app()->getLocale()]) }}" class="group">
                    <div class="group bg-white p-4 md:p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center h-full flex flex-col justify-center">
                        <i class="fas fa-trophy text-2xl md:text-3xl text-shakarim-blue group-hover:text-white mb-2 md:mb-4 transition-colors"></i>
                        <h3 class="font-semibold font-heading mb-1 md:mb-2 text-gray-800 group-hover:text-white transition-colors text-xs md:text-base">{{ __('Награды') }}</h3>
                        <p class="text-xs md:text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Награды, полученные сотрудниками нашего университета') }}</p>
                    </div>
                </a>
                <a target="_blank" href="https://t.me/ShakarimAdmissionBot" class="group">
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
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-4 md:mb-6">
                <h2 class="text-lg md:text-2xl font-bold text-shakarim-blue mb-4 flex items-center justify-center">
                    <i class="fas fa-handshake text-sm md:text-base mr-2"></i>
                    {{ __('Наши партнеры') }}
                </h2>
            </div>
            
            <div class="relative px-4">
                <!-- Left Arrow -->
                <button id="partnersPrev" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white shadow-lg rounded-full p-2 text-shakarim-blue hover:bg-shakarim-blue hover:text-white transition-colors">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <!-- Partners container -->
                <div class="overflow-x-auto scrollbar-hide mx-8" id="partnersContainer">
                    <div id="partnersWrapper" class="flex justify-start items-center gap-1 md:gap-8 py-4">
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="https://farabi.university/" target="_blank"><img src="{{ Storage::url('partners/farabi.webp') }}" alt="farabi" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="https://abu.edu.kz/" target="_blank"><img src="{{ Storage::url('partners/ABU.webp') }}" alt="ABU" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="https://global.kduniv.ac.kr/" target="_blank"><img src="{{ Storage::url('partners/KDU.webp') }}" alt="KDU" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="http://eurostudies.pl/" target="_blank"><img src="{{ Storage::url('partners/WSG.webp') }}" alt="WSG" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="https://astanait.edu.kz/" target="_blank"><img src="{{ Storage::url('partners/AITU.webp') }}" alt="AITU" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="https://auezov.edu.kz/" target="_blank"><img src="{{ Storage::url('partners/auezov.webp') }}" alt="auezov" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="https://dulaty.kz/" target="_blank"><img src="{{ Storage::url('partners/dulati.webp') }}" alt="dulati" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="https://mephi.ru/" target="_blank"><img src="{{ Storage::url('partners/mifi.webp') }}" alt="mifi" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="https://www.pittstate.edu/" target="_blank"><img src="{{ Storage::url('partners/pittstate.webp') }}" alt="pittstate" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="https://en.lzu.edu.cn/" target="_blank"><img src="{{ Storage::url('partners/lanzhou.webp') }}" alt="lanzhou" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="https://www.docmen-project.pl/" target="_blank"><img src="{{ Storage::url('partners/docmen.webp') }}" alt="docmen" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="#" target="_blank"><img src="{{ Storage::url('partners/complete.webp') }}" alt="complete" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="https://se-btrz.com/" target="_blank"><img src="{{ Storage::url('partners/SE.webp') }}" alt="SE" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="https://abai-museum.kz/" target="_blank"><img src="{{ Storage::url('partners/abaimuseum.webp') }}" alt="abaimuseum" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                        <div class="partner-item flex-shrink-0 w-20 md:w-28 h-20 flex items-center justify-center p-2">
                            <a href="#" target="_blank"><img src="{{ Storage::url('partners/semeymchs.webp') }}" alt="semeymchs" class="max-w-full max-h-full object-contain opacity-70 hover:opacity-100 transition-opacity"></a>
                        </div>
                    </div>
                </div>
                
                <!-- Right Arrow -->
                <button id="partnersNext" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-white shadow-lg rounded-full p-2 text-shakarim-blue hover:bg-shakarim-blue hover:text-white transition-colors">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/custom/slider.js') }}"></script>
    <script src="{{ asset('js/custom/slider2.js') }}"></script>
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none; /* IE and Edge */
            scrollbar-width: none; /* Firefox */
        }
    </style>
    
</x-layout>