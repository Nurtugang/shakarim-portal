<x-layout>

    <!-- Hero Section with Slider -->
    <section class="relative bg-white overflow-hidden">
        <div class="slider-container relative h-96 md:h-[500px]">
            <!-- Slide 1: QS Rankings -->
            <div class="slide active absolute inset-0 flex">
                <div class="w-full md:w-1/2 bg-slate-600 text-white flex items-center justify-center p-8">
                    <div class="text-center">
                        <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6">{{ __('QS World University Rankings') }}</h2>
                        <div class="text-5xl md:text-6xl font-heading font-bold text-yellow-400 mb-2">#1401+</div>
                        <p class="text-lg font-body text-slate-200">{{ __('Shakarim University first entered the global ranking') }}</p>
                    </div>
                </div>
                <div class="hidden md:block w-1/2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1541339907198-e08756dedf3f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
            </div>

            <!-- Slide 2: Modern Campus -->
            <div class="slide absolute inset-0 flex opacity-0 transition-opacity duration-700">
                <div class="w-full md:w-1/2 bg-shakarim-blue text-white flex items-center justify-center p-8">
                    <div class="text-center">
                        <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6">{{ __('Modern Campus') }}</h2>
                        <div class="text-5xl md:text-6xl font-heading font-bold text-blue-200 mb-2">12</div>
                        <p class="text-lg font-body text-blue-100">{{ __('Academic buildings, 700+ thousand books, 1300+ computers') }}</p>
                        <button class="mt-6 bg-white text-shakarim-blue px-6 py-2 rounded-lg font-body font-semibold hover:bg-gray-100 transition">
                            {{ __('More') }}
                        </button>
                    </div>
                </div>
                <div class="hidden md:block w-1/2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
            </div>

            <!-- Slide 3: Academic Programs -->
            <div class="slide absolute inset-0 flex opacity-0 transition-opacity duration-700">
                <div class="w-full md:w-1/2 bg-slate-700 text-white flex items-center justify-center p-8">
                    <div class="text-center">
                        <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6">{{ __('Educational Programs') }}</h2>
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div>
                                <div class="text-4xl font-heading font-bold text-yellow-400">45</div>
                                <div class="text-sm font-body text-slate-200">{{ __('Bachelor') }}</div>
                            </div>
                            <div>
                                <div class="text-4xl font-heading font-bold text-yellow-400">35</div>
                                <div class="text-sm font-body text-slate-200">{{ __('Master') }}</div>
                            </div>
                            <div>
                                <div class="text-4xl font-heading font-bold text-yellow-400">10</div>
                                <div class="text-sm font-body text-slate-200">{{ __('Doctorate') }}</div>
                            </div>
                        </div>
                        <button class="bg-white text-slate-700 px-6 py-2 rounded-lg font-body font-semibold hover:bg-gray-100 transition">
                            {{ __('View Programs') }}
                        </button>
                    </div>
                </div>
                <div class="hidden md:block w-1/2 bg-cover bg-center" style="background-image: url('https://shakarim.edu.kz/upload/photo-gallery/a33541f71ad5c2cd6c4a1c67f01677a2.jpeg');">
                </div>
            </div>

            <!-- Slide Navigation -->
            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                <button class="slide-dot active w-3 h-3 rounded-full bg-white" data-slide="0"></button>
                <button class="slide-dot w-3 h-3 rounded-full bg-white bg-opacity-50" data-slide="1"></button>
                <button class="slide-dot w-3 h-3 rounded-full bg-white bg-opacity-50" data-slide="2"></button>
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
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 overflow-hidden">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-4 break-words">
                    <i class="fas fa-link mr-3"></i>{{ __('Useful Links') }}
                </h2>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Талапкерлерге блок -->
                <div class="group bg-white rounded-xl p-6 shadow-lg transition-colors duration-300 hover:bg-shakarim-blue">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-user-plus text-2xl text-gray-800 mr-3 transition-colors duration-300 group-hover:text-white"></i>
                        <h3 class="font-heading font-bold text-lg text-gray-800 transition-colors duration-300 group-hover:text-white">{{ __('For Applicants') }}</h3>
                    </div>
                    <p class="text-gray-800 text-sm font-body mb-4 transition-colors duration-300 group-hover:text-white">{{ __('For prospective students') }}</p>
                    <div class="space-y-2 text-sm font-body">
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 1') }}</a>
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 2') }}</a>
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 3') }}</a>
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 4') }}</a>
                    </div>
                </div>

                <!-- Білім алушыларға блок -->
                <div class="group bg-white rounded-xl p-6 shadow-lg transition-colors duration-300 hover:bg-shakarim-blue">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-graduation-cap text-2xl text-gray-800 mr-3 transition-colors duration-300 group-hover:text-white"></i>
                        <h3 class="font-heading font-bold text-lg text-gray-800 transition-colors duration-300 group-hover:text-white">{{ __('For Students') }}</h3>
                    </div>
                    <p class="text-gray-800 text-sm font-body mb-4 transition-colors duration-300 group-hover:text-white">{{ __('For Shakarim students') }}</p>
                    <div class="space-y-2 text-sm font-body">
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 1') }}</a>
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 2') }}</a>
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 3') }}</a>
                    </div>
                </div>

                <!-- Қызметкерлерге блок -->
                <div class="group bg-white rounded-xl p-6 shadow-lg transition-colors duration-300 hover:bg-shakarim-blue">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-users text-2xl text-gray-800 mr-3 transition-colors duration-300 group-hover:text-white"></i>
                        <h3 class="font-heading font-bold text-lg text-gray-800 transition-colors duration-300 group-hover:text-white">{{ __('For Employees') }}</h3>
                    </div>
                    <p class="text-gray-800 text-sm font-body mb-4 transition-colors duration-300 group-hover:text-white">{{ __('For our employees') }}</p>
                    <div class="space-y-2 text-sm font-body">
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 1') }}</a>
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 2') }}</a>
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 3') }}</a>
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 4') }}</a>
                    </div>
                </div>

                <!-- Серіктестерге блок -->
                <div class="group bg-white rounded-xl p-6 shadow-lg transition-colors duration-300 hover:bg-shakarim-blue">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-handshake text-2xl text-gray-800 mr-3 transition-colors duration-300 group-hover:text-white"></i>
                        <h3 class="font-heading font-bold text-lg text-gray-800 transition-colors duration-300 group-hover:text-white">{{ __('For Partners') }}</h3>
                    </div>
                    <p class="text-gray-800 text-sm font-body mb-4 transition-colors duration-300 group-hover:text-white">{{ __('For our partners') }}</p>
                    <div class="space-y-2 text-sm font-body">
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 1') }}</a>
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 2') }}</a>
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 3') }}</a>
                        <a href="#" target="_blank" class="block text-gray-800 transition-colors duration-300 group-hover:text-white">• {{ __('Link 4') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 bg-shakarim-blue">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- University Statistics -->
                <div class="bg-white rounded-xl p-8 shadow-lg">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-chart-line text-3xl text-shakarim-blue mr-4"></i>
                        <h3 class="font-heading font-bold text-2xl text-shakarim-blue">{{ __('Shakarim University Indicators') }}</h3>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6">
                        <div>
                            <div class="text-4xl font-heading font-bold text-shakarim-blue mb-2">45</div>
                            <div class="text-sm font-body text-gray-600">{{ __('Bachelor programs') }}</div>
                        </div>
                        <div>
                            <div class="text-4xl font-heading font-bold text-shakarim-blue mb-2">35</div>
                            <div class="text-sm font-body text-gray-600">{{ __('Master programs') }}</div>
                        </div>
                        <div>
                            <div class="text-4xl font-heading font-bold text-slate-600 mb-2">90</div>
                            <div class="text-sm font-body text-gray-600">{{ __('Years of experience') }}</div>
                        </div>
                        <div>
                            <div class="text-4xl font-heading font-bold text-slate-600 mb-2">98%</div>
                            <div class="text-sm font-body text-gray-600">{{ __('Graduate employment rate') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Rankings -->
                <div class="bg-white rounded-xl p-8 shadow-lg">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-trophy text-3xl text-shakarim-blue mr-4"></i>
                        <h3 class="font-heading font-bold text-2xl text-shakarim-blue">{{ __('Shakarim University in Rankings') }}</h3>
                    </div>
                    <div class="space-y-6">
                        <div class="flex flex-col items-start justify-between md:flex-row">
                            <div>
                                <div class="text-2xl font-heading font-bold text-shakarim-blue">{{ __('QS World University Rankings') }}</div>
                                <div class="text-sm font-body text-gray-600 mb-1">{{ __('2026 newly entered') }}</div>
                            </div>
                            <div class="text-3xl md:text-5xl font-heading font-bold text-shakarim-blue opacity-20 mt-2 md:mt-0">1401+</div>
                        </div>

                        <div class="flex flex-col items-start justify-between md:flex-row">
                            <div class="border-t border-gray-200 pt-4">
                                <div class="text-2xl font-heading font-bold text-shakarim-blue mb-1">{{ __('QS Central Asia Rankings') }}</div>
                                <div class="text-sm font-body text-gray-600 mb-2">{{ __('In 2025 ranking') }}</div>
                                <div class="text-sm font-body text-gray-600"></div>
                            </div>
                            <div class="text-3xl md:text-5xl font-heading font-bold text-shakarim-blue opacity-20 mt-2 md:mt-4">301-350</div>
                        </div>

                        <div class="flex flex-col items-start justify-between md:flex-row">
                            <div class="border-t border-gray-200 pt-4">
                                <div class="text-2xl font-heading font-bold text-shakarim-blue mb-1">{{ __('AD Scientific Index ranking') }}</div>
                                <div class="text-sm font-body text-gray-600">{{ __('In Kazakhstan') }}</div>
                            </div>
                            <div class="text-3xl md:text-5xl font-heading font-bold text-shakarim-blue opacity-20 mt-2 md:mt-4">#15</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Links -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <div class="group bg-white p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center">
                    <i class="fas fa-user-graduate text-3xl text-shakarim-blue group-hover:text-white mb-4 transition-colors"></i>
                    <h3 class="font-semibold font-heading mb-2 text-gray-800 group-hover:text-white transition-colors">{{ __('For Students') }}</h3>
                    <p class="text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Study process, scholarship, accommodation') }}</p>
                </div>
                
                <div class="group bg-white p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center">
                    <i class="fas fa-flask text-3xl text-shakarim-blue group-hover:text-white mb-4 transition-colors"></i>
                    <h3 class="font-semibold font-heading mb-2 text-gray-800 group-hover:text-white transition-colors">{{ __('Science') }}</h3>
                    <p class="text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Research, projects, publications') }}</p>
                </div>
                
                <a href="https://kitaphana.shakarim.kz" target="_blank" class="group">
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center">
                        <i class="fas fa-book text-3xl text-shakarim-blue group-hover:text-white mb-4 transition-colors"></i>
                        <h3 class="font-semibold font-heading mb-2 text-gray-800 group-hover:text-white transition-colors">{{ __('Library') }}</h3>
                        <p class="text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Electronic and print resources/books') }}</p>
                    </div>
                </a>
                <div class="group bg-white p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center">
                    <i class="fas fa-calendar text-3xl text-shakarim-blue group-hover:text-white mb-4 transition-colors"></i>
                    <h3 class="font-semibold font-heading mb-2 text-gray-800 group-hover:text-white transition-colors">{{ __('Calendar') }}</h3>
                    <p class="text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Academic calendar and important dates') }}</p>
                </div>
                <div class="group bg-white p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center">
                    <i class="fas fa-briefcase text-3xl text-shakarim-blue group-hover:text-white mb-4 transition-colors"></i>
                    <h3 class="font-semibold font-heading mb-2 text-gray-800 group-hover:text-white transition-colors">{{ __('Career') }}</h3>
                    <p class="text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Job opportunities and internships') }}</p>
                </div>
                <div class="group bg-white p-6 rounded-xl shadow-md hover:shadow-lg hover:bg-shakarim-blue transition text-center">
                    <i class="fas fa-globe text-3xl text-shakarim-blue group-hover:text-white mb-4 transition-colors"></i>
                    <h3 class="font-semibold font-heading mb-2 text-gray-800 group-hover:text-white transition-colors">{{ __('International') }}</h3>
                    <p class="text-sm text-gray-600 font-body group-hover:text-white transition-colors">{{ __('Partnerships and exchange programs') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- News & Events -->
    <section class="py-8 pb-4 md:pb-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-8">
                <!-- News -->
                <div class="lg:col-span-2">
                    <h2 class="text-2xl md:text-3xl font-bold text-shakarim-blue mb-6 md:mb-8">{{ __('News') }}</h2>
                    <div class="space-y-6">
                        @foreach($news as $item)
                            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full md:w-1/3 relative">
                                        <div class="h-48 md:h-full overflow-hidden bg-gray-100">
                                            <a href="{{ route('news.show', ['news' => $item, 'locale' => app()->getLocale()]) }}">
                                                <img src="{{ Storage::url('news/' . $item->image) }}" alt="News" class="w-full h-full object-cover object-center">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-4 md:p-6 w-full md:w-2/3">
                                        <div class="text-sm text-gray-500 mb-2">
                                            {{ \Carbon\Carbon::createFromTimestamp($item->date)->locale(app()->getLocale())->isoFormat('D MMMM, YYYY') }}
                                        </div>
                                        <a href="{{ route('news.show', ['news' => $item, 'locale' => app()->getLocale()]) }}">
                                            <h3 class="text-lg md:text-xl font-semibold mb-3 hover:text-shakarim-blue cursor-pointer line-clamp-2">
                                                {{ $item->{'title_' . app()->getLocale()} }}
                                            </h3>
                                        </a>
                                        <p class="text-gray-600 mb-4 line-clamp-2 md:line-clamp-3 text-sm md:text-base">
                                            {{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($item->{'content_' . app()->getLocale()})), 140) }}
                                        </p>
                                        <a href="{{ route('news.show', ['news' => $item, 'locale' => app()->getLocale()]) }}"
                                        class="text-shakarim-blue font-semibold hover:underline text-sm md:text-base">
                                            {{ __('Read more') }} →
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <div class="text-center mt-8">
                        <a href="{{ route('news', ['locale' => app()->getLocale()]) }}" 
                        class="bg-shakarim-blue text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                            {{ __('All news') }}
                        </a>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Events -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-xl font-bold text-shakarim-blue mb-6">{{ __('Events') }}</h3>
                        <div class="space-y-4">
                            <div class="border-l-4 border-shakarim-blue pl-4">
                                <div class="text-sm text-gray-500">{{ __('August 10') }}</div>
                                <h4 class="font-semibold">{{ __('New student enrollment') }}</h4>
                            </div>
                            <div class="border-l-4 border-shakarim-blue pl-4">
                                <div class="text-sm text-gray-500">{{ __('August 15') }}</div>
                                <h4 class="font-semibold">{{ __('Career Day') }}</h4>
                            </div>
                            <div class="border-l-4 border-shakarim-blue pl-4">
                                <div class="text-sm text-gray-500">{{ __('August 20') }}</div>
                                <h4 class="font-semibold">{{ __('Open House Day') }}</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Quick Access -->
                    <div class="bg-shakarim-blue text-white rounded-xl p-6">
                        <h3 class="text-xl font-bold mb-6">{{ __('Quick Access') }}</h3>
                        <div class="space-y-3">
                            <a href="https://platonus.shakarim.kz" target="_blank"
                            class="block bg-white bg-opacity-20 p-3 rounded-lg hover:bg-opacity-30 transition">
                                <i class="fas fa-user mr-2"></i> Platonus
                            </a>
                            <a href="https://hub.shakarim.kz" target="_blank"
                            class="block bg-white bg-opacity-20 p-3 rounded-lg hover:bg-opacity-30 transition">
                                <i class="fas fa-envelope mr-2"></i> Shakarim Hub
                            </a>
                            <a href="https://mooc.semgu.kz" target="_blank"
                            class="block bg-white bg-opacity-20 p-3 rounded-lg hover:bg-opacity-30 transition">
                                <i class="fas fa-book mr-2"></i> Moodle
                            </a>
                        </div>
                    </div>
                    <!-- Contacts -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-xl font-bold text-shakarim-blue mb-6">{{ __('Contact') }}</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-shakarim-blue mr-3 mt-1"></i>
                                <span>{{ __('071412, Semey, Glinka street, 20A') }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone text-shakarim-blue mr-3"></i>
                                <span>+7 (7182) 67-36-69</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-shakarim-blue mr-3"></i>
                                <span>info@shakarim.edu.kz</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/custom/slider.js') }}"></script>
</x-layout>
