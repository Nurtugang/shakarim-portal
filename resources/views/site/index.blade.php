<x-layout>

<!-- Hero Section with Slider -->
    <section class="relative bg-white overflow-hidden">
        <div class="slider-container relative h-96 md:h-[500px]">
            <!-- Slide 1: QS Rankings -->
            <div class="slide active absolute inset-0 flex">
                <div class="w-full md:w-1/2 bg-slate-600 text-white flex items-center justify-center p-8">
                    <div class="text-center">
                        <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6">QS World University Rankings</h2>
                        <div class="text-5xl md:text-6xl font-heading font-bold text-yellow-400 mb-2">#1401+</div>
                        <p class="text-lg font-body text-slate-200">Shakarim University алғаш рет жаһандық рейтингке енді</p>
                    </div>
                </div>
                <div class="hidden md:block w-1/2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1541339907198-e08756dedf3f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
            </div>

            <!-- Slide 2: Modern Campus -->
            <div class="slide absolute inset-0 flex opacity-0 transition-opacity duration-700">
                <div class="w-full md:w-1/2 bg-shakarim-blue text-white flex items-center justify-center p-8">
                    <div class="text-center">
                        <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6">Заманауи кампус</h2>
                        <div class="text-5xl md:text-6xl font-heading font-bold text-blue-200 mb-2">12</div>
                        <p class="text-lg font-body text-blue-100">Оқу ғимараты, 700+ мың кітап, 1300+ компьютер</p>
                        <button class="mt-6 bg-white text-shakarim-blue px-6 py-2 rounded-lg font-body font-semibold hover:bg-gray-100 transition">
                            Толығырақ
                        </button>
                    </div>
                </div>
                <div class="hidden md:block w-1/2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
            </div>

            <!-- Slide 3: Academic Programs -->
            <div class="slide absolute inset-0 flex opacity-0 transition-opacity duration-700">
                <div class="w-full md:w-1/2 bg-slate-700 text-white flex items-center justify-center p-8">
                    <div class="text-center">
                        <h2 class="text-3xl md:text-4xl font-heading font-bold mb-6">Білім беру бағдарламалары</h2>
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div>
                                <div class="text-4xl font-heading font-bold text-yellow-400">45</div>
                                <div class="text-sm font-body text-slate-200">Бакалавриат</div>
                            </div>
                            <div>
                                <div class="text-4xl font-heading font-bold text-yellow-400">35</div>
                                <div class="text-sm font-body text-slate-200">Магистратура</div>
                            </div>
                            <div>
                                <div class="text-4xl font-heading font-bold text-yellow-400">10</div>
                                <div class="text-sm font-body text-slate-200">Докторантура</div>
                            </div>
                        </div>
                        <button class="bg-white text-slate-700 px-6 py-2 rounded-lg font-body font-semibold hover:bg-gray-100 transition">
                            Бағдарламаларды көру
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
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-heading font-bold text-shakarim-blue mb-4">
                    <i class="fas fa-link mr-3"></i>Пайдалы сілтемелер
                </h2>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Талапкерлерге блок -->
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-user-plus text-2xl text-shakarim-blue mr-3"></i>
                        <h3 class="font-heading font-bold text-lg text-shakarim-blue">Талапкерлерге</h3>
                    </div>
                    <p class="text-gray-600 text-sm font-body mb-4">Оқуға түсушілер үшін</p>
                    <div class="space-y-2 text-sm font-body">
                        <a href="#" class="block text-shakarim-light hover:text-shakarim-blue transition">• Сілтеме 1</a>
                        <a href="#" class="block text-shakarim-light hover:text-shakarim-blue transition">• Сілтеме 2</a>
                        <a href="#" class="block text-shakarim-light hover:text-shakarim-blue transition">• Сілтеме 3</a>
                        <a href="#" class="block text-shakarim-light hover:text-shakarim-blue transition">• Сілтеме 4</a>
                    </div>
                </div>

                <!-- Білім алушыларға блок -->
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-graduation-cap text-2xl text-shakarim-blue mr-3"></i>
                        <h3 class="font-heading font-bold text-lg text-shakarim-blue">Білім алушыларға</h3>
                    </div>
                    <p class="text-gray-600 text-sm font-body mb-4">Shakarim студенттері үшін</p>
                    <div class="space-y-2 text-sm font-body">
                        <a href="#" class="block text-shakarim-light hover:text-shakarim-blue transition">• Сілтеме 1</a>
                        <a href="#" class="block text-shakarim-light hover:text-shakarim-blue transition">• Сілтеме 2</a>
                        <a href="#" class="block text-shakarim-light hover:text-shakarim-blue transition">• Сілтеме 3</a>
                    </div>
                </div>

                <!-- Қызметкерлерге блок -->
                <div class="bg-shakarim-blue text-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-users text-2xl text-white mr-3"></i>
                        <h3 class="font-heading font-bold text-lg">Қызметкерлерге</h3>
                    </div>
                    <p class="text-slate-200 text-sm font-body mb-4">Біздің қызметкерлеріміз үшін</p>
                    <div class="space-y-2 text-sm font-body">
                        <a href="#" class="block text-slate-200 hover:text-white transition">• Сілтеме 1</a>
                        <a href="#" class="block text-slate-200 hover:text-white transition">• Сілтеме 2</a>
                        <a href="#" class="block text-slate-200 hover:text-white transition">• Сілтеме 3</a>
                        <a href="#" class="block text-slate-200 hover:text-white transition">• Сілтеме 4</a>
                    </div>
                    <div class="mt-6 p-4 bg-white bg-opacity-20 rounded-lg">
                        <div class="w-16 h-16 bg-white bg-opacity-30 rounded-lg mx-auto flex items-center justify-center">
                            <i class="fas fa-qrcode text-2xl text-white"></i>
                        </div>
                    </div>
                </div>

                <!-- Серіктестерге блок -->
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-handshake text-2xl text-shakarim-blue mr-3"></i>
                        <h3 class="font-heading font-bold text-lg text-shakarim-blue">Серіктестерге</h3>
                    </div>
                    <p class="text-gray-600 text-sm font-body mb-4">Біздің серіктестерімізге</p>
                    <div class="space-y-2 text-sm font-body">
                        <a href="#" class="block text-shakarim-light hover:text-shakarim-blue transition">• Сілтеме 1</a>
                        <a href="#" class="block text-shakarim-light hover:text-shakarim-blue transition">• Сілтеме 2</a>
                        <a href="#" class="block text-shakarim-light hover:text-shakarim-blue transition">• Сілтеме 3</a>
                        <a href="#" class="block text-shakarim-light hover:text-shakarim-blue transition">• Сілтеме 4</a>
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
                        <h3 class="font-heading font-bold text-2xl text-shakarim-blue">Shakarim University көрсеткіштері</h3>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <div class="text-4xl font-heading font-bold text-shakarim-blue mb-2">45</div>
                            <div class="text-sm font-body text-gray-600">Бакалавриат бағдарламалары</div>
                        </div>
                        <div>
                            <div class="text-4xl font-heading font-bold text-shakarim-blue mb-2">35</div>
                            <div class="text-sm font-body text-gray-600">Магистратура бағдарламалары</div>
                        </div>
                        <div>
                            <div class="text-4xl font-heading font-bold text-slate-600 mb-2">90</div>
                            <div class="text-sm font-body text-gray-600">Жыл тәжірибе</div>
                        </div>
                        <div>
                            <div class="text-4xl font-heading font-bold text-slate-600 mb-2">98%</div>
                            <div class="text-sm font-body text-gray-600">Түлектердің жұмысқа орналасуы</div>
                        </div>
                    </div>
                </div>

                <!-- Rankings -->
                <div class="bg-white rounded-xl p-8 shadow-lg">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-trophy text-3xl text-shakarim-blue mr-4"></i>
                        <h3 class="font-heading font-bold text-2xl text-shakarim-blue">Shakarim University рейтингтерде</h3>
                    </div>
                    <div class="space-y-6">
                        <div class="flex items-start justify-between">
                            <div>
                                <div class="text-2xl font-heading font-bold text-shakarim-blue">QS World University Rankings</div>
                                <div class="text-sm font-body text-gray-600 mb-1"> 2026 жаңадан енген</div>
                            </div>
                            <div class="text-5xl font-heading font-bold text-shakarim-blue opacity-20 mt-">1401+</div>
                        </div>

                        <div class="flex items-start justify-between">
                            <div class="border-t border-gray-200 pt-4">
                                <div class="text-2xl font-heading font-bold text-shakarim-blue mb-1">QS Central Asia Rankings</div>
                                <div class="text-sm font-body text-gray-600 mb-2">2025 рейтингінде</div>
                                <div class="text-sm font-body text-gray-600"></div>
                            </div>
                            <div class="text-5xl font-heading font-bold text-shakarim-blue opacity-20 mt-4">301-350</div>
                        </div>

                        <div class="flex items-start justify-between">
                            <div class="border-t border-gray-200 pt-4">
                                <div class="text-2xl font-heading font-bold text-shakarim-blue mb-1">AD Scientific Index рейтингінде</div>
                                <div class="text-sm font-body text-gray-600">Қазақстанда</div>
                            </div>
                            <div class="text-5xl font-heading font-bold text-shakarim-blue opacity-20 mt-4">#15</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Links -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition text-center">
                    <i class="fas fa-user-graduate text-3xl text-shakarim-blue mb-4"></i>
                    <h3 class="font-semibold font-heading mb-2">Студенттерге</h3>
                    <p class="text-sm text-gray-600 font-body">Оқу процесі, стипендия, тұрғын үй</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition text-center">
                    <i class="fas fa-flask text-3xl text-shakarim-blue mb-4"></i>
                    <h3 class="font-semibold font-heading mb-2">Ғылым</h3>
                    <p class="text-sm text-gray-600 font-body">Зерттеулер, жобалар, жарияланымдар</p>
                </div>
                <a href="https://kitaphana.shakarim.kz" target="_blank" >
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition text-center">
                        <i class="fas fa-book text-3xl text-shakarim-blue mb-4"></i>
                        <h3 class="font-semibold font-heading mb-2">Кітапхана</h3>
                        <p class="text-sm text-gray-600 font-body">Электронды және басылым ресурстар/кітаптар</p>
                    </div>
                </a>
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition text-center">
                    <i class="fas fa-calendar text-3xl text-shakarim-blue mb-4"></i>
                    <h3 class="font-semibold font-heading mb-2">Күнтізбе</h3>
                    <p class="text-sm text-gray-600 font-body">Оқу күнтізбесі және маңызды күндер</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition text-center">
                    <i class="fas fa-briefcase text-3xl text-shakarim-blue mb-4"></i>
                    <h3 class="font-semibold font-heading mb-2">Мансап</h3>
                    <p class="text-sm text-gray-600 font-body">Жұмыс орындары және стажировка</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition text-center">
                    <i class="fas fa-globe text-3xl text-shakarim-blue mb-4"></i>
                    <h3 class="font-semibold font-heading mb-2">Халықаралық</h3>
                    <p class="text-sm text-gray-600 font-body">Серіктестік және алмасу бағдарламалары</p>
                </div>
            </div>
        </div>
    </section>

    <!-- News & Events -->
    <section class="py-16 pb-4 md:pb-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- News -->
                <div class="lg:col-span-2">
                    <h2 class="text-3xl font-bold text-shakarim-blue mb-8">Жаңалықтар</h2>
                    <div class="space-y-6">
                        @foreach($news as $item)
                            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                                <div class="md:flex">
                                    <div class="md:w-1/3">
                                        <img src="{{  asset('storage/news/' . $item->image) }} ?? 'https://via.placeholder.com/300x200/314266/ffffff?text=News' }}" alt="News" class="w-full h-48 md:h-full object-cover">
                                    </div>
                                    <div class="p-6 md:w-2/3">
                                        <div class="text-sm text-gray-500 mb-2">
                                            {{ \Carbon\Carbon::createFromTimestamp($item->date)->translatedFormat('j MMMM, Y') }}
                                        </div>
                                        <h3 class="text-xl font-semibold mb-3 hover:text-shakarim-blue cursor-pointer">
                                            {{ $item->{'title_' . app()->getLocale()} }}
                                        </h3>
                                        <p class="text-gray-600 mb-4">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($item->{'content_' . app()->getLocale()}), 140) }}
                                        </p>
                                        <a href="{{ route('news.show', ['news' => $item, 'locale' => app()->getLocale()]) }}"
                                        class="text-shakarim-blue font-semibold hover:underline">
                                            Толығырақ оқу →
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach

                    </div>
                    <div class="text-center mt-8">
                        <a href="{{ route('news', ['locale' => app()->getLocale()]) }}" class="bg-shakarim-blue text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">Барлық жаңалықтар</a>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Events -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-xl font-bold text-shakarim-blue mb-6">Іс-шаралар</h3>
                        <div class="space-y-4">
                            <div class="border-l-4 border-shakarim-blue pl-4">
                                <div class="text-sm text-gray-500">10 тамыз</div>
                                <h4 class="font-semibold">Жаңа студенттерді қабылдау</h4>
                            </div>
                            <div class="border-l-4 border-shakarim-blue pl-4">
                                <div class="text-sm text-gray-500">15 тамыз</div>
                                <h4 class="font-semibold">Карьера күні</h4>
                            </div>
                            <div class="border-l-4 border-shakarim-blue pl-4">
                                <div class="text-sm text-gray-500">20 тамыз</div>
                                <h4 class="font-semibold">Ашық есік күні</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Access -->
                    <div class="bg-shakarim-blue text-white rounded-xl p-6">
                        <h3 class="text-xl font-bold mb-6">Жылдам кіру</h3>
                        <div class="space-y-3">
                            <a href="https://platonus.shakarim.kz" target="_blank" class="block bg-white bg-opacity-20 p-3 rounded-lg hover:bg-opacity-30 transition">
                                <i class="fas fa-user mr-2"></i> Platonus
                            </a>
                            <a href="https://hub.shakarim.kz" class="block bg-white bg-opacity-20 p-3 rounded-lg hover:bg-opacity-30 transition">
                                <i class="fas fa-envelope mr-2"></i> Shakarim Hub
                            </a>
                            <a href="https://mooc.semgu.kz" class="block bg-white bg-opacity-20 p-3 rounded-lg hover:bg-opacity-30 transition">
                                <i class="fas fa-book mr-2"></i> Moodle
                            </a>
                        </div>
                    </div>

                    <!-- Contacts -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-xl font-bold text-shakarim-blue mb-6">Байланыс</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-shakarim-blue mr-3 mt-1"></i>
                                <span>071412, Семей қ., Глинки көшесі, 20А</span>
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

</x-layout>
