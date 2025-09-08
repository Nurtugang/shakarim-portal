<x-layout metaTitle="{{ __('Корпоративтік басқару - Басқарма') }}">

<!-- Breadcrumbs and Section -->
<section class="bg-gray-100 py-3 border-b">
    <div class="max-w-7xl mx-auto px-4">
        <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
            <span>&#8250;</span>
            <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 1]) }}" class="hover:text-shakarim-blue">{{ __('Университет') }}</a>
            <span>&#8250;</span>
            <span class="text-shakarim-blue font-semibold">{{ __('Корпоративтік басқару - Басқарма') }}</span>
        </nav>
    </div>
</section>

<!-- Main Content -->
<section class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-8 mt-2">{{ __('Корпоративтік басқару - Басқарма') }}</h1>
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Navigation -->
                <div class="lg:w-1/4">
                    <!-- Mobile horizontal tabs -->
                    <div class="lg:hidden mb-6">
                        <div class="flex overflow-x-auto space-x-2 pb-2">
                            <button onclick="showTab('boardofdirectors')" id="tab-boardofdirectors" class="tab-button active whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                {{ __('Директорлар кеңесі')}}
                            </button>
                            <button onclick="showTab('board')" id="tab-board" class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                {{ __('Басқарма')}}
                            </button>
                            <button onclick="showTab('corporatesecretary')" id="tab-corporatesecretary" class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                {{ __('Корпоративті хатшы')}}
                            </button>
                            <button onclick="showTab('internalauditservice')" id="tab-internalauditservice" class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                {{ __('Ішкі аудит қызметі')}}
                            </button>
                            <button onclick="showTab('complianceservice')" id="tab-complianceservice" class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                {{ __('Комплаенс қызметі')}}
                            </button>
                        </div>
                    </div>
                    <!-- Desktop vertical tabs -->
                    <div class="hidden lg:block sticky top-24">
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Разделы')}}</h3>
                            <nav class="space-y-2">
                                <button onclick="showTab('boardofdirectors')" id="desktop-tab-boardofdirectors" class="desktop-tab-button active w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                    <i class="fas fa-users-cog mr-2"></i>
                                    {{ __('Директорлар кеңесі')}}
                                </button>
                                <button onclick="showTab('board')" id="desktop-tab-board" class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                    <i class="fas fa-sitemap mr-2"></i>
                                    {{ __('Басқарма')}}
                                </button>
                                <button onclick="showTab('corporatesecretary')" id="desktop-tab-corporatesecretary" class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                    <i class="fas fa-file-signature mr-2"></i>
                                    {{ __('Корпоративті хатшы')}}
                                </button>
                                <button onclick="showTab('internalauditservice')" id="desktop-tab-internalauditservice" class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                    <i class="fas fa-search-dollar mr-2"></i>
                                    {{ __('Ішкі аудит қызметі')}}
                                </button>
                                <button onclick="showTab('complianceservice')" id="desktop-tab-complianceservice" class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                    <i class="fas fa-shield-alt mr-2"></i>
                                    {{ __('Комплаенс қызметі')}}
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Main Content Area -->
                <div class="lg:w-3/4">
                    <!-- Board of Directors Tab -->
                    <div id="content-boardofdirectors" class="tab-content">
                        <div class="grid gap-6">
                            <!-- Нұрбаев Орман Кәрімұлы -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/ac8d0fcaaf30d8b99fb27c4076b091c8.webp') }}" 
                                                alt="{{ __('Нұрбаев Орман Кәрімұлы') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('nurbaev-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="nurbaev-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Нұрбаев Орман Кәрімұлы') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Директорлар кеңесінің төрағасы, тәуелсіз директор') }}
                                            </p>
                                            <button onclick="toggleDetails('nurbaev-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="nurbaev-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="nurbaev-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('Красноярск жоғары командалық әуе шабуылына қарсы қорғаныс радиоэлектроника училищесі (1987)') }}</li>
                                                    <li>{{ __('Қазақстан Республикасы Президенті жанындағы Мемлекеттік басқару ұлттық жоғары мектебі (1997)') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('Әр түрлі әскери бөлімдерде радиолокациялық станция бастығы (1987-1994)') }}</li>
                                                    <li>{{ __('«Нарбота» қайырымдылық коммерциялық-кәсіпкерлік орталығының менеджері, бас директоры (1994-1996)') }}</li>
                                                    <li>{{ __('Ұлттық мемлекеттік басқару жоғары мектебінің тыңдаушысы (1996-1997)') }}</li>
                                                    <li>{{ __('Сыртқы істер министрлігінің үшінші, екінші, бірінші хатшысы, бөлім бастығы (1997-2000)') }}</li>
                                                    <li>{{ __('Қазақстан Республикасының Малайзиядағы елшілігінің бірінші хатшысы (2000-2001)') }}</li>
                                                    <li>{{ __('Қазақстан Республикасының Тәжікстандағы елшілігінің бірінші хатшысы (2001-2002)') }}</li>
                                                    <li>{{ __('Қазақстан Республикасының Өзбекстандағы елшілігінің бірінші хатшысы, кеңесшісі (2002-2004)') }}</li>
                                                    <li>{{ __('Қазақстан Республикасы Президенті Әкімшілігінің Ішкі саясат басқармасының Ситуациялық орталығының сектор меңгерушісі (2005-2006)') }}</li>
                                                    <li>{{ __('Қазақстан Республикасы Экономика және бюджеттік жоспарлау министрлігінің Халықаралық қатынастар департаментінің директоры (2006-2007)') }}</li>
                                                    <li>{{ __('Қазақстан Республикасының Моңғолиядағы Төтенше және Өкілетті елшісі (2007-2012)') }}</li>
                                                    <li>{{ __('Қазақстан Республикасының Түркіменстандағы Төтенше және Өкілетті елшісі (2012-2017)') }}</li>
                                                    <li>{{ __('«Қазақстан инжиниринг» ҰК» АҚ Басқарма төрағасы (08.2017-07.2018)') }}</li>
                                                    <li>{{ __('Қазақстан Республикасы Премьер-Министрі Кеңсесі басшысының орынбасары (2018-2019)') }}</li>
                                                    <li>{{ __('«KUSTO GROUP» ЖШС Басқарушы директоры, Қазақстан Республикасы Премьер-Министрінің штаттан тыс кеңесшісі (2019- 2022)') }}</li>
                                                    <li>{{ __('«QazaqGeography» РҚБ Басқару кеңесінің Төрағасы (30.10.2019-03.06.2020)') }}</li>
                                                    <li>{{ __('«QazaqGeography» РҚБ Басқарма Төрағасы (04.06.2020 – қазіргі уақытқа дейін)') }}</li>
                                                    <li>{{ __('Л. Н. Гумилев атындағы Еуразия ұлттық университеті» КеАқ директорлар кеңесінің мүшесі, тәуелсіз директор (21.04.2021- қазіргі уақытқа дейін)') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Орынбеков Думан Рымғалиұлы -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/55627f971685a1d174693a4a8b1c9474.webp') }}" 
                                                alt="{{ __('Орынбеков Думан Рымғалиұлы') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('orynbekov-board-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="orynbekov-board-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Орынбеков Думан Рымғалиұлы') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Басқарма төрағасы - Ректор, Директорлар кеңесінің мүшесі') }}
                                            </p>
                                            <button onclick="toggleDetails('orynbekov-board-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="orynbekov-board-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="orynbekov-board-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('2005 жыл - Шәкәрім атындағы Семей мемлекеттік университетінің "Тамақ өндірісіндегі технологиялық машиналар мен жабдықтар (сала бойынша)" мамандығы бойынша "Инженер-механик" біліктілігі берілді') }}</li>
                                                    <li>{{ __('2020 жыл - Қазақ инновациялық гуманитарлық-заң университетінің "Экономика" мамандығы бойынша "Экономика және бизнес" бакалавры дәрежесі берілді') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('01.11.2008 - 01.04.2011 - Шәкәрім атындағы Семей мемлекеттік университетінің "Тамақ өндірісінің машиналары мен аппараттары" кафедрасының аға оқытушысы') }}</li>
                                                    <li>{{ __('01.04.2011 - 01.09.2012 - Шәкәрім атындағы Семей мемлекеттік университетінің Ғылым, халықаралық байланыстар және жоғары оқу орнынан кейінгі білім бөлімінің басшысы') }}</li>
                                                    <li>{{ __('06.09.2012 - 03.01.2019 - Л.Н.Гумилев атындағы Еуразия ұлттық университеті Ғылыми-техникалық бағдарламалар бөлімінің басшысы') }}</li>
                                                    <li>{{ __('04.01.2019 - 14.11.2019 - Қазақстан Республикасы Білім және ғылым министрлігінің «Ұлттық тестілеу орталығы» РМҚК директорының орынбасары') }}</li>
                                                    <li>{{ __('15.11.2019 - 27.11.2020 - Л.Н.Гумилев атындағы Еуразия ұлттық университеті Ғылым және инновация департаментінің директоры') }}</li>
                                                    <li>{{ __('30.11.2020 - 06.10.2022 - Қазақстан Республикасы Білім және ғылым министрлігі Ғылым комитеті төраға орынбасары') }}</li>
                                                    <li>{{ __('10.10.2022 - 30.06.2023 - Қазақстан Республикасы Ғылым және жоғары білім министрлігі Ғылым комитеті төраға орынбасары') }}</li>
                                                    <li>{{ __('01.07.2023 - қазіргі уақытта - «Шәкәрім университеті» КеАҚ Басқарма төрағасы - Ректоры') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Қожахмет Мадияр Дүйсенбайұлы -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/8a7025ecd63b842c128981e7b1703f27.webp') }}" 
                                                alt="{{ __('Қожахмет Мадияр Дүйсенбайұлы') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('kozhakhmet-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="kozhakhmet-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Қожахмет Мадияр Дүйсенбайұлы') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Директорлар кеңесінің мүшесі') }}
                                            </p>
                                            <div class="space-y-2">
                                            </div>
                                            <button onclick="toggleDetails('kozhakhmet-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="kozhakhmet-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="kozhakhmet-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('Л.Н.Гумилев атындағы Еуразия Ұлттық университетін тәмамдаған, халықаралық құқық магистрі') }}</li>
                                                    <li>{{ __('Чехияда «Болашақ» бағдарламасы бойынша экономика және менеджмент магистріне оқыған') }}</li>
                                                    <li>{{ __('Қазақ, орыс, ағылшын және түрік тілдерін меңгерген') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('Жоғары білім беру жүйесінде ҚР Білім және ғылым министрлігінде басқарма басшысы, департамент директорының орынбасары, департамент директоры қызметтерін атқарған (2008-2012)') }}</li>
                                                    <li>{{ __('ҚР Президент Әкімшілігінің Мемлекеттік бақылау және аумақтық-ұйымдастыру жұмысы бөлімінің инспекторы (2012-2014)') }}</li>
                                                    <li>{{ __('Солтүстік Қазақстан облысы әкімі аппаратының басшысы (2014-2017)') }}</li>
                                                    <li>{{ __('Солтүстік Қазақстан облысы әкімінің орынбасары. Білім саласын жетекшілік етті (2017-2019)') }}</li>
                                                    <li>{{ __('Ақпарат және қоғамдық даму министрлігі Жастар және отбасы істері комитетінің төрағасы (2019-2020)') }}</li>
                                                    <li>{{ __('Ақпарат және қоғамдық даму министрлігі Азаматтық қоғам істері комитетінің төрағасы (2020-2023)') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Кәрібаева Мамыр Қуанышқызы -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/6c892a85aefa1d0f92d8b59205ff4656.webp') }}" 
                                                alt="{{ __('Кәрібаева Мамыр Қуанышқызы') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('karibaeva-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="karibaeva-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Кәрібаева Мамыр Қуанышқызы') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Директорлар кеңесінің мүшесі') }}
                                            </p>
                                            <button onclick="toggleDetails('karibaeva-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="karibaeva-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="karibaeva-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('Алматы қаласы Қазақ қыздар педагогикалық институты, ұлттық мектепте орыс тілі әдебиеті пәнінің мұғалімі (1993)') }}</li>
                                                    <li>{{ __('С.Сейфуллин атындағы Қазақ аграрлық университеті, Астана қаласы, экономист (2003)') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('Қазақстан Республикасы Қаржы министрлігі Мемлекеттік мүлік және жекешелендіру комитетінің Ұйымдастыру-инспекторлық жұмыс басқармасының ведомстволық актілермен жұмыс бөлімінің жетекші маманы (04.07.2001-03.01.2002)') }}</li>
                                                    <li>{{ __('Қазақстан Республикасы Қаржы министрлігі Мемлекеттік мүлік және жекешелендіру комитетінің Республикалық мемлекеттік меншік объектілерін сату басқармасы республикалық мемлекеттік меншік объектілерін сатуды ұйымдастыру бөлімінің бас маманы (14.01.2002 - 01.06.2008)') }}</li>
                                                    <li>{{ __('Қазақстан Республикасы Қаржы министрлігі Мемлекеттік мүлік және жекешелендіру комитетінің қызметін ұйымдастыру басқармасының сарапшысы (01.06.2008 -15.08.2014)') }}</li>
                                                    <li>{{ __('Қазақстан Республикасы Қаржы министрлігі Мемлекеттік мүлік және жекешелендіру комитетінің мемлекет қатысатын мемлекеттік емес заңды тұлғалармен жұмыс жөніндегі басқармасының бас сарапшысы, Астана қаласы. (15.08.2014 - қазіргі уақытқа дейін)') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Молдакасимов Ербол Бахтиярұлы -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/5102f825f11ede3cd8184be31333e251.webp') }}" 
                                                alt="{{ __('Молдакасимов Ербол Бахтиярұлы') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('moldakasimov-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="moldakasimov-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Молдакасимов Ербол Бахтиярұлы') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Директорлар кеңесінің мүшесі, тәуелсіз директор') }}
                                            </p>
                                            <button onclick="toggleDetails('moldakasimov-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="moldakasimov-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="moldakasimov-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('Әл-Фараби атындағы ҚазҰУ, Алматы қ. (2006). («Батыс Еуропа» аймағы бойынша мамандық, Аймақтану бакалавры (үздік диплом)') }}</li>
                                                    <li>{{ __('Иорк университеті, Ұлыбритания (2008). «Мемлекеттік басқару» мамандығының магистрі') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('«ҚР Президенті жанындағы Мемлекеттік басқару академиясы» РМҚК. Аға сарапшы, сыртқы байланыстар қызметі басшысының орынбасары (2008-2012)') }}</li>
                                                    <li>{{ __('ҚР БҒМ «Ақпараттық-талдау орталығы» АҚ. Білім беру менеджментін зерттеу басқармасының жетекші талдаушысы, ТжКБ жобалары басқармасының бастығы, халықаралық салыстырмалы зерттеулер Департаментінің директоры (2012-2016)') }}</li>
                                                    <li>{{ __('ҚР ҰЭМ «Экономикалық зерттеулер институты» АҚ. Жобаларды үйлестірушісі, кәсіпкерлікті дамыту орталығының директоры м. а. (2016)') }}</li>
                                                    <li>{{ __('ҚР ПМК, ҚР ЕХӘҚМ, ҚР АШМ, БҰҰДБ, Boston Consulting Group және т. б. тапсырысы бойынша жобаларда білім беру, еңбек нарығы, адами капиталды дамыту саласында тәуелсіз зерттеуші (2016-2018)') }}</li>
                                                    <li>{{ __('«BTS Digital» ЖШС. Кеңесші, білім беру орталығының зерттеу жетекшісі (2018-2021)') }}</li>
                                                    <li>{{ __('ҚР БҒМ «Болон процесі және академиялық ұтқырлық орталығы» ШЖҚ РМК Директоры (2021-2022)') }}</li>
                                                    <li>{{ __('Қазақстан Республикасы халқының табысын арттырудың 2025 жылға дейінгі бағдарламасы шеңберінде білім беру, еңбек нарығы саласындағы тәуелсіз зерттеуші, жоба бойынша әдіснаманың форсайты (2022 жылғы сәуірден бастап)') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Мукашев Балтабек Кумарбекович -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/d97de3dad96ec2f6928b841d33cdce1f.webp') }}" 
                                                alt="{{ __('Мукашев Балтабек Кумарбекович') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('mukashev-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="mukashev-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Мукашев Балтабек Кумарбекович') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Директорлар кеңесінің мүшесі, тәуелсіз директор') }}
                                            </p>
                                            <button onclick="toggleDetails('mukashev-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="mukashev-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="mukashev-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('Семей педагогикалық институты, Тарих және қоғамтану мұғалімі, тәрбие жұмысы бойынша әдіскер (1991)') }}</li>
                                                    <li>{{ __('Ресей Федерациясының Мәскеу қаласындағы Халық шаруашылығы академиясы, МВА (2001)') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('1991-2001 жж. аралықта – «Еуразия Голд» компаниясының директоры') }}</li>
                                                    <li>{{ __('2007-2010 жж. аралықта – «Қазақ Кейп голд» компаниясының директоры') }}</li>
                                                    <li><strong>{{ __('2010 жылдан қазіргі уақытқа дейін – Директорлар кеңесінің төрағасы:') }}</strong></li>
                                                    <li class="ml-4">{{ __('Еуразия Алтын (пайдалы қазбаларды барлау және өндіру)') }}</li>
                                                    <li class="ml-4">{{ __('Еуразия РЕД (Жылжымайтын мүлік)') }}</li>
                                                    <li class="ml-4">{{ __('Еуразия Агрохолдингі (Семей ет комбинаты)') }}</li>
                                                    <li class="ml-4">{{ __('Әл-қарал (биотехнологиялық холдинг)') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Board Tab -->
                    <div id="content-board" class="tab-content hidden">
                        <div class="grid gap-6">
                            <!-- Орынбеков Думан Рымғалиұлы -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/55627f971685a1d174693a4a8b1c9474.webp') }}" 
                                                alt="{{ __('Орынбеков Думан Рымғалиұлы') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('board-orynbekov-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="board-orynbekov-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Орынбеков Думан Рымғалиұлы') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Басқарма төрағасы - Ректор') }}
                                            </p>
                                            <button onclick="toggleDetails('board-orynbekov-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="board-orynbekov-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="board-orynbekov-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('2005 жыл - Шәкәрім атындағы Семей мемлекеттік университетінің "Тамақ өндірісіндегі технологиялық машиналар мен жабдықтар (сала бойынша)" мамандығы бойынша "Инженер-механик" біліктілігі берілді') }}</li>
                                                    <li>{{ __('2020 жыл - Қазақ инновациялық гуманитарлық-заң университетінің "Экономика" мамандығы бойынша "Экономика және бизнес" бакалавры дәрежесі берілді') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('01.11.2008 - 01.04.2011 - Шәкәрім атындағы Семей мемлекеттік университетінің "Тамақ өндірісінің машиналары мен аппараттары" кафедрасының аға оқытушысы') }}</li>
                                                    <li>{{ __('01.04.2011 - 01.09.2012 - Шәкәрім атындағы Семей мемлекеттік университетінің Ғылым, халықаралық байланыстар және жоғары оқу орнынан кейінгі білім бөлімінің басшысы') }}</li>
                                                    <li>{{ __('06.09.2012 - 03.01.2019 - Л.Н.Гумилев атындағы Еуразия ұлттық университеті Ғылыми-техникалық бағдарламалар бөлімінің басшысы') }}</li>
                                                    <li>{{ __('04.01.2019 - 14.11.2019 - Қазақстан Республикасы Білім және ғылым министрлігінің «Ұлттық тестілеу орталығы» РМҚК директорының орынбасары') }}</li>
                                                    <li>{{ __('15.11.2019 - 27.11.2020 - Л.Н.Гумилев атындағы Еуразия ұлттық университеті Ғылым және инновация департаментінің директоры') }}</li>
                                                    <li>{{ __('30.11.2020 - 06.10.2022 - Қазақстан Республикасы Білім және ғылым министрлігі Ғылым комитеті төраға орынбасары') }}</li>
                                                    <li>{{ __('10.10.2022 - 30.06.2023 - Қазақстан Республикасы Ғылым және жоғары білім министрлігі Ғылым комитеті төраға орынбасары') }}</li>
                                                    <li>{{ __('01.07.2023 - қазіргі уақытта - «Шәкәрім университеті» КеАҚ Басқарма төрағасы - Ректоры') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Дарибаев Беимбет Серикович -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/01K3T9KRMNQT9AP0WWK82HCY5A.webp') }}" 
                                                alt="{{ __('Дарибаев Беимбет Серикович') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('daribaev-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="daribaev-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Дарибаев Беимбет Серикович') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Басқарма мүшесі - академиялық мәселелер жөніндегі проректор') }}
                                            </p>
                                            <button onclick="toggleDetails('daribaev-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="daribaev-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="daribaev-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('2005-2009 жж. – Әл-Фараби атындағы Қазақ ұлттық университеті, Механика-математика факультеті, мамандығы: «6B060200 – Информатика» (бакалавр)') }}</li>
                                                    <li>{{ __('2009-2011 жж. – Әл-Фараби атындағы Қазақ ұлттық университеті, Механика-математика факультеті, мамандығы: «6M060200 –Информатика» (магистр)') }}</li>
                                                    <li>{{ __('2011-2014 жж. – Әл-Фараби атындағы Қазақ ұлттық университеті, Механика-математика факультеті, мамандығы: «6D060200 – Информатика» (PhD)') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('01.09.2009 жылдан бастап – Математика және механика ғылыми-зерттеу институты, инженер-программист, кіші ғылыми қызметкер, ғылыми қызметкер, компьютерлік ғылымдар зертханасының аға ғылыми қызметкері') }}</li>
                                                    <li>{{ __('09.01.2011 жылдан бастап – әл-Фараби атындағы Қазақ ұлттық университеті, механика-математика факультеті, информатика кафедрасы – оқытушы ассистенті, оқытушы, аға оқытушы, доцент') }}</li>
                                                    <li>{{ __('2019-2020 жж. – компьютерлік ғылымдар зертханасының меңгерушісі') }}</li>
                                                    <li>{{ __('01.09.2020 – 01.09.2021 жж. – Халықаралық бизнес университеті (UIB) Бизнес информатика кафедрасының меңгерушісі') }}</li>
                                                    <li>{{ __('01.09.2021 – 02.03.2025 жж. – Әл-Фараби атындағы ҚазҰУ компьютерлік ғылымдар кафедрасының меңгерушісі') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Қалибекқызы Жанар -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/f331bd400b3f41511be1a2d9cd799d89.webp') }}" 
                                                alt="{{ __('Қалибекқызы Жанар') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('zhanar-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="zhanar-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Қалибекқызы Жанар') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Басқарма мүшесі - ғылым жөніндегі проректор') }}
                                            </p>
                                            <button onclick="toggleDetails('zhanar-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="zhanar-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="zhanar-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('09.1990 - 08.1995 Семей технологиялық ет және сүт өнеркәсібі институты') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('09.2001-09.2006 жж. - Стандарттау және биотехнология кафедрасының аға оқытушысы') }}</li>
                                                    <li>{{ __('01.2007-12.2011 жж. - Стандарттау және биотехнология кафедрасының доценті') }}</li>
                                                    <li>{{ __('12.2011 - 11.2013 жж. - Семей қаласының Шәкәрім атындағы МУ инженерлік-технологиялық факультеті деканының оқу-әдістемелік жұмысы жөніндегі орынбасары') }}</li>
                                                    <li>{{ __('11.2013 - 08.2016 жж. - Семей қаласы Шәкәрім атындағы МУ оқу бөлімінің бастығы') }}</li>
                                                    <li>{{ __('09.2016 - 04.2021 жж. - «Тамақ өнімдері мен жеңіл өнеркәсіп өнімдерінің технологиясы» кафедрасының меңгерушісі') }}</li>
                                                    <li>{{ __('04.2021-12.2021 жж. - Ғылым департаментінің директоры') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Дулатбай Ерасыл Алтайұлы -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/01K3T9NMA7BS1DH1Z597TNYQ6Z.webp') }}" 
                                                alt="{{ __('Дулатбай Ерасыл Алтайұлы') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('dulatbay-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="dulatbay-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Дулатбай Ерасыл Алтайұлы') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Басқарма мүшесі - интернационалдандыру және инновациялар жөніндегі проректор') }}
                                            </p>
                                            <button onclick="toggleDetails('dulatbay-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="dulatbay-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="dulatbay-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('2011 - 2015 жж. – "Абылай хан атындағы Қазақ халықаралық қатынастар және әлем тілдері университеті" АҚ, бакалавриат') }}</li>
                                                    <li>{{ __('2015 - 2017 жж. – "Қазақ ұлттық аграрлық университеті" КеАҚ, «Тағам қауіпсіздігі» мамандығы, дәрежесі - техника және технология магистрі') }}</li>
                                                    <li>{{ __('2017 - 2023 жж. – "Солтүстік-Батыс ауыл және орман шаруашылығы университеті" (ҚХР), «Ауыл шаруашылығы экономикасы және менеджмент» мамандығы, дәрежесі – PhD') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('01.09.2016 - 17.11.2016 жж. – «Халықаралық білім беру бағдарламалар бөлімінің» біліктілігі жоғары деңгейдегі маманы, Қазақ ұлттық аграрлық университеті, Алматы қ.') }}</li>
                                                    <li>{{ __('17.11.2016 - 01.06.2017 жж. – «Академиялық ұтқырлық және халықаралық білім бағадарламалары орталығының» біліктілігі жоғары деңгейдегі маманы, Қазақ ұлттық аграрлық университеті, Алматы қ.') }}</li>
                                                    <li>{{ __('01.09.2020 - 01.09.2022 жж. – «Халықаралық ынтымақтастық бөлімінің» жетекші маманы, Жәңгір хан атындағы Батыс Қазақстан аграрлық-техникалық университеті, Орал қ.') }}</li>
                                                    <li>{{ __('01.09.2022- 09.03.2023 жж. – «Халықаралық ынтымақтастық бөліміне қарасты жобалық кеңсенің» жетекшісі, Жәңгір хан атындағы Батыс Қазақстан аграрлық-техникалық университеті, Орал қ.') }}</li>
                                                    <li>{{ __('09.03.2023 - 30.08.2024 жж. – «Agrotech Hub» бөлімінің жетекшісі, Жәңгір хан атындағы Батыс Қазақстан аграрлық-техникалық университеті, Орал қ.') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Қасымов Асқар Бағдатұлы -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/6d4769c57c8a7aa6929ee5a3ec96085c.webp') }}" 
                                                alt="{{ __('Қасымов Асқар Бағдатұлы') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('kasymov-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="kasymov-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Қасымов Асқар Бағдатұлы') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Басқарма мүшесі - стратегия және әлеуметтік даму жөніндегі проректор') }}
                                            </p>
                                            <button onclick="toggleDetails('kasymov-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="kasymov-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="kasymov-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('2010 ж. – Шәкәрім атындағы Семей мемлекеттік университеті (бакалавриат)') }}</li>
                                                    <li>{{ __('2011 ж. – Қазақ гуманитарлық-заң инновациялық университеті (бакалавриат)') }}</li>
                                                    <li>{{ __('2012 ж. – Шәкәрім атындағы Семей мемлекеттік университеті (магистратура)') }}</li>
                                                    <li>{{ __('2015 ж. – К.И. Сәтбаев атындағы Қазақ ұлттық зерттеу техникалық университеті (докторантура)') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('01.09.2014 - 31 05.2015 – Жалпы және теориялық физика кафедрасының ассистенті, Қ.И. Сәтбаев атындағы Қазақ ұлттық зерттеу техникалық университеті') }}</li>
                                                    <li>{{ __('01.09.2015 - 31.05.2017 – Техникалық физика және жылуэнергетика кафедрасының аға оқытушысы, Шәкәрім атындағы Семей мемлекеттік университеті') }}</li>
                                                    <li>{{ __('01.06.2017 - 20.01.2019 –Shakarim Kyundong Academic Collaboration Centre халықаралық факультетінің декан орынбасары') }}</li>
                                                    <li>{{ __('21.01.2019 - 02.06.2024 – Техникалық физика және жылуэнергетика кафедрасының қауымдастырылған профессор м.а., «Семей қаласының Шәкәрім атындағы университеті» КеАҚ') }}</li>
                                                    <li>{{ __('03.06.2024 - 01.12.2024 – Физика және химия ғылымдары зерттеу мектебінің деканы, «Семей қаласының Шәкәрім атындағы университеті» КеАҚ') }}</li>
                                                    <li>{{ __('02.12.2024 – қазіргі уақытқа дейін – Басқарма мүшесі – Стратегия және әлеуметтік даму жөніндегі проректор, «Шәкәрім университеті» КеАҚ') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Corporate Secretary Tab -->
                    <div id="content-corporatesecretary" class="tab-content hidden">
                        <div class="grid gap-6">
                            <!-- Маусымбаева Аида Ардаковна -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/fd35e08bf6877a1feb15cf73ee10b68d.webp') }}" 
                                                alt="{{ __('Маусымбаева Аида Ардаковна') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('mausymbaeva-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="mausymbaeva-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Маусымбаева Аида Ардаковна') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Корпоративтік хатшы') }}
                                            </p>
                                            <button onclick="toggleDetails('mausymbaeva-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="mausymbaeva-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="mausymbaeva-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('2004 - 2008 жж. - Л.Н. Гумилев атындағы Еуразия ұлттық университеті. дәрежесі – бакалавр, факультет – экономика, мамандығы – қаржы') }}</li>
                                                    <li>{{ __('2010 - 2012 жж. – Тұран-Астана университеті, дәрежесі – бакалавр, факультет – заң, мамандығы – құқықтану') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('«Акушерлік және гинекология ғылыми орталығы» АҚ Директорлар кеңесінің корпоративтік хатшысы (қараша 2022 жыл – маусым 2023 жыл)') }}</li>
                                                    <li>{{ __('«AO Jusan mobile» еншілес кәсіпорны «Modern Telecommunication Systems» ЖШС сату жөніндегі бас маманы (қаңтар 2021 ж. – қараша 2022 ж.)') }}</li>
                                                    <li>{{ __('«Ұлттық ақпараттық технологиялар» АҚ Инфрақұрылымдық қызметтер басқармасының бас маманы (ақпан 2018 ж. – наурыз 2020 ж.)') }}</li>
                                                    <li>{{ __('«Проблемалық несиелер қоры» АҚ тұрақты даму бөлімінің бас маманы (шілде 2017 ж. – желтоқсан 2017 ж.)') }}</li>
                                                    <li>{{ __('«Қазпочта» АҚ сатып алу және коммуналдық шаруашылық бөлімінің менеджері (қаңтар 2016 ж.– маусым 2017 ж.)') }}</li>
                                                    <li>{{ __('«Астана» ӘКК ҰК» АҚ жетекші менеджері (қараша 2013 ж.– маусым 2017 ж.)') }}</li>
                                                    <li>{{ __('«Қазақстанның тұрғын үй құрылыс жинақ банкі» АҚ несие бөлімінің жетекші маманы (қазан 2008 ж. – қыркүйек 2013 ж.)') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Internal Audit Service Tab -->
                    <div id="content-internalauditservice" class="tab-content hidden">
                        <div class="grid gap-6">
                            <!-- Жаркенова Гульбахыт Елубаевна -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/5e3894c72fc2f311be384d71ba774c18.webp') }}" 
                                                alt="{{ __('Жаркенова Гульбахыт Елубаевна') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('zharkenova-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="zharkenova-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Жаркенова Гульбахыт Елубаевна') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Ішкі аудит қызметінің басшысы') }}
                                            </p>
                                            <button onclick="toggleDetails('zharkenova-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="zharkenova-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="zharkenova-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('Бөкетов атындағы Қарағанды мемлекеттік университеті -1986- 1990жж., экономика факультеті, бухгалтерлік есеп және АФХД (мамандығы экономист)') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('Ішкі аудит қызметінің басшысы ҚР МСМ МК «Қазақ ұлттық хореография академиясы» (2022-2023жж.)') }}</li>
                                                    <li>{{ __('Экономика департаментінің директоры «ҚТЖ - Жүк тасымалы» ЖШС (2021-2022жж.)') }}</li>
                                                    <li>{{ __('Ішкі аудит қызметінің басшысы «ҚазАқпарат Халықаралық ақпарат агенттігі» АҚ (2020-2021жж.)') }}</li>
                                                    <li>{{ __('Ішкі аудит қызметінің басшысы "Зерде" ҰИХ (2016-2019жж.)') }}</li>
                                                    <li>{{ __('Ішкі аудит қызметінің басшысы «Хабар» агенттігі» АҚ (2014-2016жж.)') }}</li>
                                                    <li>{{ __('Ішкі аудит қызметінің басшысы «ҚазАгроҚаржы» АҚ (2007-2014 жж.)') }}</li>
                                                    <li>{{ __('Бас аудитор «Қазақстан темір жолы» ҰҚ» АҚ (2006-2007жж.)') }}</li>
                                                    <li>{{ __('Директордың орынбасары, клиенттермен жұмыс жөніндегі бөлім бастығы «Тұрғын үй құрылыс жинақ банкі» АҚ (2004-2006 жж.)') }}</li>
                                                    <li>{{ __('Ішкі аудитор «Қазақстан Ұлттық Банкі» (1993-2004жж.)') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Тасмағамбетов Мейрам Тоқтарұлы -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/231bf2a4a028192c115006d39575e308.webp') }}" 
                                                alt="{{ __('Тасмағамбетов Мейрам Тоқтарұлы') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('tasmagambetov-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="tasmagambetov-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Тасмағамбетов Мейрам Тоқтарұлы') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Аудитор') }}
                                            </p>
                                            <button onclick="toggleDetails('tasmagambetov-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="tasmagambetov-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="tasmagambetov-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('Шәкәрім атындағы Семей мемлекеттік университеті, «Бухгалтерлік есеп және аудит» мамандығы, «Экономист-бухглтер» біліктілігі (2004)') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('№20 жалпы орта білім беретің мектептің бухгалтері (2005-2007)') }}</li>
                                                    <li>{{ __('Семей қаласының мемлекеттік медицина университеті бас бухгалтердің орынбасары (2007-2017)') }}</li>
                                                    <li>{{ __('«Әділет Аудит» ЖШС аудитор көмекшісі (2017-2018)') }}</li>
                                                    <li>{{ __('«Iv plus емхана» ЖШС бухгалтері (2018-2023)') }}</li>
                                                    <li>{{ __('«Диаком-Химтэко» ЖШС бухгалтері (2019-2023)') }}</li>
                                                    <li>{{ __('«СемМедТорг» ЖШС директоры (2021-2023)') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="mt-4 p-4 bg-blue-50 rounded-lg">
                                            <h4 class="text-lg font-semibold text-shakarim-blue mb-2">{{ __('Дағдылар') }}</h4>
                                            <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                <li>{{ __('Аудитордың біліктілік сертификаты') }}</li>
                                                <li>{{ __('Кәсіби бухгалтер сертификаты') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Compliance Service Tab -->
                    <div id="content-complianceservice" class="tab-content hidden">
                        <div class="grid gap-6">
                            <!-- Аубакиров Жомартбек Заманбекұлы -->
                            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                                <div class="p-6">
                                    <div class="flex flex-row md:flex-row gap-4 md:gap-6">
                                        <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                            <img src="{{ Storage::url('board/318890e1ca6d7c684477e23390720154.webp') }}" 
                                                alt="{{ __('Аубакиров Жомартбек Заманбекұлы') }}" 
                                                class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover">
                                            <button onclick="toggleDetails('aubakirov-details')" 
                                                class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-3 h-3 ml-1 transform transition-transform" id="aubakirov-arrow-mobile" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex-grow">
                                            <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                                {{ __('Аубакиров Жомартбек Заманбекұлы') }}
                                            </h3>
                                            <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                                {{ __('Комплаенс қызметінің басшысы') }}
                                            </p>
                                            <button onclick="toggleDetails('aubakirov-details')" 
                                                class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                                <span>{{ __('Подробнее') }}</span>
                                                <svg class="w-4 h-4 ml-2 transform transition-transform" id="aubakirov-arrow" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div id="aubakirov-details" class="hidden mt-6 pt-6 border-t border-gray-200">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Білімі') }}</h4>
                                                <ul class="space-y-2 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('Қазақстан Республикасының ІІМ Семей заң колледжі (1997-1999)') }}</li>
                                                    <li>{{ __('Алматы қаласының Орталық Азиа Университеті (2003-2007)') }}</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-semibold text-shakarim-blue mb-3">{{ __('Еңбек өтілі') }}</h4>
                                                <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                                                    <li>{{ __('Шығыс Қазақстан облысы полиция департаменті Жарма ауданының полиция бөлімі, Шар полиция бөлімінің аға тергеушісі (1999-2006)') }}</li>
                                                    <li>{{ __('Шығыс Қазақстан облысы полиция департаменті Жарма ауданының полиция бөлімі, Шар полиция бөлімінің тергеу бөлімшесінің бастығы (2006-2008)') }}</li>
                                                    <li>{{ __('Семей қаласы полиция басқармасының Тергеу бөлімінің аға тергеушісі (2008-2011)') }}</li>
                                                    <li>{{ __('Шығыс Қазақстан облысы полиция департаменті Өзіндік қауіпсіздік басқармасының аса маңызды істер жөніндегі аға тергеушісі (2011-2022)') }}</li>
                                                    <li>{{ __('Абай облысы полиция департаментінің Экстремизмге қарсы іс-қимыл басқармасының бөлім бастығы (2022- 2023)') }}</li>
                                                    <li>{{ __('ІІМ зейнеткері (07.09.2023 жылдан)') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="mt-4 p-4 bg-green-50 rounded-lg">
                                            <div class="flex items-start gap-2">
                                                <svg class="w-5 h-5 text-green-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clipRule="evenodd"/>
                                                </svg>
                                                <div>
                                                    <p class="text-sm text-green-800 font-medium">{{ __('Мамандық бойынша тәжірибе') }}</p>
                                                    <p class="text-sm text-green-700">{{ __('24 жылдан астам ІІМ қызметкерлеріне қатысты тергеп-тексеру жүргізу тәжірибесі бар') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    

<script>
    function showTab(tabName) {
        // Hide all tab contents
        const tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach(content => {
            content.classList.add('hidden');
        });
        
        // Remove active class from all tab buttons (mobile)
        const tabButtons = document.querySelectorAll('.tab-button');
        tabButtons.forEach(button => {
            button.classList.remove('active', 'bg-shakarim-blue', 'text-white');
            button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        });
        
        // Remove active class from all desktop tab buttons
        const desktopTabButtons = document.querySelectorAll('.desktop-tab-button');
        desktopTabButtons.forEach(button => {
            button.classList.remove('active', 'bg-shakarim-blue', 'text-white');
            button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        });
        
        // Show selected tab content
        const selectedContent = document.getElementById('content-' + tabName);
        if (selectedContent) {
            selectedContent.classList.remove('hidden');
        }
        
        // Add active class to clicked tab button (mobile)
        const activeTabButton = document.getElementById('tab-' + tabName);
        if (activeTabButton) {
            activeTabButton.classList.remove('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
            activeTabButton.classList.add('active', 'bg-shakarim-blue', 'text-white');
        }
        
        // Add active class to clicked desktop tab button
        const activeDesktopTabButton = document.getElementById('desktop-tab-' + tabName);
        if (activeDesktopTabButton) {
            activeDesktopTabButton.classList.remove('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
            activeDesktopTabButton.classList.add('active', 'bg-shakarim-blue', 'text-white');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.tab-button:not(.active)');
        tabButtons.forEach(button => {
            button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        });
        
        const desktopTabButtons = document.querySelectorAll('.desktop-tab-button:not(.active)');
        desktopTabButtons.forEach(button => {
            button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        });
        
        const activeTabButtons = document.querySelectorAll('.tab-button.active, .desktop-tab-button.active');
        activeTabButtons.forEach(button => {
            button.classList.add('bg-shakarim-blue', 'text-white');
        });
    });

    function showTab(tabName) {
        // Hide all tab contents
        const tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach(content => {
            content.classList.add('hidden');
        });
        
        // Remove active class from all tab buttons (mobile)
        const tabButtons = document.querySelectorAll('.tab-button');
        tabButtons.forEach(button => {
            button.classList.remove('active', 'bg-shakarim-blue', 'text-white');
            button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        });
        
        // Remove active class from all desktop tab buttons
        const desktopTabButtons = document.querySelectorAll('.desktop-tab-button');
        desktopTabButtons.forEach(button => {
            button.classList.remove('active', 'bg-shakarim-blue', 'text-white');
            button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        });
        
        // Show selected tab content
        const selectedContent = document.getElementById('content-' + tabName);
        if (selectedContent) {
            selectedContent.classList.remove('hidden');
        }
        
        // Add active class to clicked tab button (mobile)
        const activeTabButton = document.getElementById('tab-' + tabName);
        if (activeTabButton) {
            activeTabButton.classList.remove('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
            activeTabButton.classList.add('active', 'bg-shakarim-blue', 'text-white');
        }
        
        // Add active class to clicked desktop tab button
        const activeDesktopTabButton = document.getElementById('desktop-tab-' + tabName);
        if (activeDesktopTabButton) {
            activeDesktopTabButton.classList.remove('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
            activeDesktopTabButton.classList.add('active', 'bg-shakarim-blue', 'text-white');
        }
    }

    function toggleDetails(detailsId) {
        const details = document.getElementById(detailsId);
        const arrowId = detailsId.replace('-details', '-arrow');
        const arrow = document.getElementById(arrowId);
        
        if (details) {
            if (details.classList.contains('hidden')) {
                details.classList.remove('hidden');
                if (arrow) {
                    arrow.classList.add('rotate-180');
                }
            } else {
                details.classList.add('hidden');
                if (arrow) {
                    arrow.classList.remove('rotate-180');
                }
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tab button styles
        const tabButtons = document.querySelectorAll('.tab-button:not(.active)');
        tabButtons.forEach(button => {
            button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        });
        
        const desktopTabButtons = document.querySelectorAll('.desktop-tab-button:not(.active)');
        desktopTabButtons.forEach(button => {
            button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        });
        
        const activeTabButtons = document.querySelectorAll('.tab-button.active, .desktop-tab-button.active');
        activeTabButtons.forEach(button => {
            button.classList.add('bg-shakarim-blue', 'text-white');
        });
    });
</script>

<style>
    /* Определение цвета shakarim-blue, если он не определен в CSS */
    .bg-shakarim-blue {
        background-color: #314266 !important;
    }
    
    .text-shakarim-blue {
        color: #314266 !important;
    }
    
    .hover\:text-shakarim-blue:hover {
        color: #314266 !important;
    }

    /* Tab button active states */
    .tab-button.active {
        background-color: #314266 !important;
        color: white !important;
    }

    .desktop-tab-button.active {
        background-color: #314266 !important;
        color: white !important;
    }

    /* Custom scrollbar for mobile tabs */
    .flex.overflow-x-auto::-webkit-scrollbar {
        height: 4px;
    }

    .flex.overflow-x-auto::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 2px;
    }

    .flex.overflow-x-auto::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 2px;
    }

    .flex.overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }

    /* Smooth transitions */
    .transition-transform {
        transition: transform 0.2s ease-in-out;
    }

    .transition-colors {
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    }

    .rotate-180 {
        transform: rotate(180deg);
    }

    /* Enhanced card hover effects */
    .shadow-lg {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .shadow-lg:hover {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        transition: box-shadow 0.3s ease-in-out;
    }

    /* Button hover effects */
    .hover\:bg-blue-700:hover {
        background-color: #1d4ed8;
    }

    .hover\:bg-gray-200:hover {
        background-color: #e5e7eb;
    }

    /* Responsive font classes if not available */
    .font-heading {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-weight: 700;
    }

    /* Grid and flex utilities for older browsers */
    .grid {
        display: grid;
    }

    .gap-6 {
        gap: 1.5rem;
    }
    
    @media (max-width: 767px) {
        .desktop-only {
            display: none !important;
        }
    }

    @media (min-width: 768px) {
        .md\:grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .md\:flex-row {
            flex-direction: row;
        }

        .md\:w-40 {
            width: 10rem;
        }

        .md\:h-40 {
            height: 10rem;
        }

        .md\:text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }
    }

    @media (min-width: 1024px) {
        .lg\:w-1\/4 {
            width: 25%;
        }

        .lg\:w-3\/4 {
            width: 75%;
        }

        .lg\:flex-row {
            flex-direction: row;
        }

        .lg\:hidden {
            display: none;
        }

        .lg\:block {
            display: block;
        }
    }

    .tab-button.active {
        background-color: #314266 !important;
        color: white !important;
    }

    .desktop-tab-button.active {
        background-color: #314266 !important;
        color: white !important;
    }

    /* Custom scrollbar for mobile tabs */
    .flex.overflow-x-auto::-webkit-scrollbar {
        height: 4px;
    }

    .flex.overflow-x-auto::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 2px;
    }

    .flex.overflow-x-auto::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 2px;
    }

    .flex.overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>
</x-layout>