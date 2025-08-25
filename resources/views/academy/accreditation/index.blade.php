<x-layout :metaTitle="__('Аккредитация')">

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 1]) }}" class="hover:text-shakarim-blue">{{ __('Образование') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Аккредитация') }}</span>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-8">{{ __('Аккредитация')}}</h1>
            
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Navigation -->
                <div class="lg:w-1/4">
                    <!-- Mobile horizontal tabs -->
                    <div class="lg:hidden mb-6">
                        <div class="flex overflow-x-auto space-x-2 pb-2">
                            <button onclick="showAccreditationTab('general')" id="tab-general" class="accreditation-tab-button active whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                {{ __('Рейтинги и общая информация')}}
                            </button>
                            <button onclick="showAccreditationTab('institutional')" id="tab-institutional" class="accreditation-tab-button  whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                {{ __('Институциональная')}}
                            </button>
                            <button onclick="showAccreditationTab('specialized')" id="tab-specialized" class="accreditation-tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                {{ __('Специализированная')}}
                            </button>
                        </div>
                    </div>

                    <!-- Desktop vertical tabs -->
                    <div class="hidden lg:block sticky top-24">
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Типы аккредитации')}}</h3>
                            <nav class="space-y-2">
                                <button onclick="showAccreditationTab('general')" id="desktop-tab-general" class="desktop-accreditation-tab-button active w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    {{ __('Рейтинги и общая информация')}}
                                </button>
                                <button onclick="showAccreditationTab('institutional')" id="desktop-tab-institutional" class="desktop-accreditation-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                    <i class="fas fa-building mr-2"></i>
                                    {{ __('Институциональная')}}
                                </button>
                                <button onclick="showAccreditationTab('specialized')" id="desktop-tab-specialized" class="desktop-accreditation-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                    <i class="fas fa-certificate mr-2"></i>
                                    {{ __('Специализированная')}}
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="lg:w-3/4">
                    <!-- General Information Tab -->
                    <div id="content-general" class="accreditation-tab-content hidden">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="p-6 space-y-8">
                                <!-- 2026 Rankings -->
                                <div class="mb-8">
                                    <div class="flex items-center mb-6">
                                        <h3 class="text-2xl font-bold text-gray-800">{{ __('Рейтинги 2026')}}</h3>
                                    </div>

                                    <div class="bg-gradient-to-br from-yellow-50 to-amber-50 border-yellow-500 rounded-lg p-6">
                                        <div class="flex items-start">
                                            <div>
                                                <h4 class="text-lg font-bold text-yellow-800 mb-2">QS World University Rankings 2026</h4>
                                                <p class="text-gray-700 text-sm leading-relaxed">
                                                    {{ __('19 июня 2025 года Университет Шакарима был официально включен в QS World University Rankings 2026 — один из самых престижных и влиятельных мировых рейтингов университетов. Среди них было 20 учреждений из Казахстана, включая трех новичков — и Университет Шакарима гордится тем, что является одним из них, войдя в топ-18% лучших университетов мира.')}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- 2025 Rankings -->
                                <div class="mb-8">
                                    <div class="flex items-center mb-6">
                                        <h3 class="text-2xl font-bold text-gray-800">{{ __('Рейтинги 2025')}}</h3>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- QS Asia Rankings -->
                                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                                            <div class="flex items-center mb-3">
                                                <h4 class="font-bold text-blue-800">QS Asia University Rankings 2025</h4>
                                            </div>
                                            <p class="text-gray-700 text-sm">
                                                {{ __('Университет Шакарима занимает позицию #501-520 среди 985 университетов Азии.')}}
                                            </p>
                                        </div>

                                        <!-- QS Sustainability -->
                                        <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                                            <div class="flex items-center mb-3">
                                                <h4 class="font-bold text-green-800">QS Sustainability Rankings 2025</h4>
                                            </div>
                                            <p class="text-gray-700 text-sm mb-3">
                                                {{ __('Рейтинг 1351-1400 среди 1744 университетов из 107 стран. Топ-10 среди казахстанских университетов.')}}
                                            </p>
                                            <div class="space-y-1 text-xs">
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">{{ __('Социальное воздействие в ЦА:')}}</span>
                                                    <span class="font-semibold text-green-700">{{ __('3 место')}}</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">{{ __('Экологическое воздействие в ЦА:')}}</span>
                                                    <span class="font-semibold text-green-700">{{ __('7 место')}}</span>
                                                </div>
                                                <div class="flex justify-between">
                                                    <span class="text-gray-600">{{ __('Экологические исследования в ЦА:')}}</span>
                                                    <span class="font-semibold text-green-700">{{ __('1 место')}}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- THE Impact Rankings -->
                                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-6">
                                            <div class="flex items-center mb-3">
                                                <h4 class="font-bold text-purple-800">THE Impact Rankings 2025</h4>
                                            </div>
                                            <p class="text-gray-700 text-sm">
                                                {{ __('В 2025 году Университет Шакарима дебютировал в престижном глобальном рейтинге THE Impact Rankings, который оценивает вклад университетов в Цели устойчивого развития ООН.')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- 2024 Rankings -->
                                <div class="mb-8">
                                    <div class="flex items-center mb-6">
                                        <h3 class="text-2xl font-bold text-gray-800">{{ __('Рейтинги 2024')}}</h3>
                                    </div>

                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                        <!-- QS Stars -->
                                        <div class="bg-gradient-to-br from-indigo-50 to-blue-50 border border-indigo-200 rounded-lg p-6">
                                            <div class="flex items-center mb-4">
                                                <div class="flex mr-3">
                                                    <i class="fas fa-star text-yellow-500"></i>
                                                    <i class="fas fa-star text-yellow-500"></i>
                                                    <i class="fas fa-star text-yellow-500"></i>
                                                    <i class="fas fa-star text-yellow-500"></i>
                                                    <i class="far fa-star text-gray-300"></i>
                                                </div>
                                                <h4 class="font-bold text-indigo-800">QS Stars International Ranking 2024</h4>
                                            </div>
                                            <p class="text-gray-700 text-sm mb-4">
                                                {{ __('Система международного рейтинга QS Stars присвоила нашему университету 4-звездочный рейтинг.')}}
                                            </p>
                                            
                                            <div class="space-y-2">
                                                <div class="text-xs">
                                                    <span class="font-semibold text-green-700">{{ __('5 звезд:')}}</span>
                                                    <span class="text-gray-600"> {{ __('Преподавание, Трудоустройство, Управление, Социальное воздействие')}}</span>
                                                </div>
                                                <div class="text-xs">
                                                    <span class="font-semibold text-blue-700">{{ __('4 звезды:')}}</span>
                                                    <span class="text-gray-600"> {{ __('Инфраструктура, Разнообразие, Академическое развитие')}}</span>
                                                </div>
                                            </div>
                                            
                                            <a href="https://www.topuniversities.com/universities/non-profit-joint-stock-company-shakarim-university" 
                                            target="_blank" 
                                            class="inline-flex items-center mt-3 text-xs text-indigo-600 hover:text-indigo-800 transition-colors">
                                                <i class="fas fa-external-link-alt mr-1"></i>
                                                {{ __('Подробная информация')}}
                                            </a>
                                        </div>

                                        <!-- UI Green Metric -->
                                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-200 rounded-lg p-6">
                                            <div class="flex items-center mb-3">
                                                <h4 class="font-bold text-green-800">UI Green Metric 2024</h4>
                                            </div>
                                            <p class="text-gray-700 text-sm mb-3">
                                                {{ __('662-е место среди самых экологически чистых образовательных учреждений в мире, 8-е место среди университетов Казахстана.')}}
                                            </p>
                                            <a href="https://greenmetric.ui.ac.id/rankings/overall-rankings-2024" 
                                            target="_blank" 
                                            class="inline-flex items-center text-xs text-green-600 hover:text-green-800 transition-colors">
                                                <i class="fas fa-external-link-alt mr-1"></i>
                                                {{ __('Официальный сайт')}}
                                            </a>
                                        </div>

                                        <!-- National H-index -->
                                        <div class="bg-gradient-to-br from-gray-50 to-slate-50 border border-gray-200 rounded-lg p-6">
                                            <div class="flex items-center mb-3">
                                                <h4 class="font-bold text-gray-800">National H-index 2024</h4>
                                            </div>
                                            <p class="text-gray-700 text-sm mb-3">
                                                {{ __('19-е место среди 84 университетов в рейтинге образовательных учреждений по научной продуктивности и публикационной активности.')}}
                                            </p>
                                            <a href="https://kz.h-index.com/en/shakarim-university" 
                                            target="_blank" 
                                            class="inline-flex items-center text-xs text-gray-600 hover:text-gray-800 transition-colors">
                                                <i class="fas fa-external-link-alt mr-1"></i>
                                                {{ __('Подробная информация')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- 2023 Rankings -->
                                <div class="mb-8">
                                    <div class="flex items-center mb-6">
                                        <h3 class="text-2xl font-bold text-gray-800">{{ __('Рейтинги 2023')}}</h3>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Website Rating -->
                                        <div class="bg-orange-50 border border-orange-200 rounded-lg p-6">
                                            <div class="flex items-center mb-3">
                                                <h4 class="font-bold text-orange-800">{{ __('Рейтинг веб-сайтов 2023')}}</h4>
                                            </div>
                                            <p class="text-gray-700 text-sm">
                                                {{ __('44-е место среди 103 университетов Казахстана в рейтинге веб-сайтов казахстанских вузов по данным Независимого агентства по обеспечению качества в образовании.')}}
                                            </p>
                                        </div>

                                        <!-- Scientific Publications -->
                                        <div class="bg-teal-50 border border-teal-200 rounded-lg p-6">
                                            <div class="flex items-center mb-3">
                                                <h4 class="font-bold text-teal-800">{{ __('Научные публикации 2023')}}</h4>
                                            </div>
                                            <p class="text-gray-700 text-sm">
                                                {{ __('20-е место среди 97 университетов Казахстана в рейтинге вузов по научным публикациям по данным Независимого агентства по обеспечению качества в образовании.')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Info -->
                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                                    <h4 class="font-bold text-blue-800 mb-3 flex items-center">
                                        {{ __('Рейтинг образовательных программ НПП «Атамекен»')}}
                                    </h4>
                                    <p class="text-gray-700 text-sm">
                                        {{ __('Результаты рейтинга образовательных программ Университета Шакарима были представлены на официальном сайте Национальной палаты предпринимателей Республики Казахстан «Атамекен».')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Institutional Accreditation Tab -->
                    <div id="content-institutional" class="accreditation-tab-content hidden">
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">{{ __('Институциональная аккредитация')}}</h2>
                            
                            <!-- Introduction -->
                            <div class="bg-blue-50 border-l-4 border-shakarim-blue p-6 rounded-r-lg mb-8">
                                <p class="text-gray-700 leading-relaxed text-sm">
                                    {{ __('Институциональная аккредитация подтверждает соответствие университета установленным стандартам качества образования и организационно-управленческой деятельности.') }}
                                </p>
                            </div>

                            <!-- Accreditation History -->
                            <div class="space-y-6 mb-8">
                                <h3 class="text-xl md:text-2xl font-semibold text-gray-800 mb-4">{{ __('История институциональной аккредитации') }}</h3>
                                
                                <div class="space-y-4">
                                    <!-- 2013 Accreditation -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-lg p-6">
                                        <div class="flex items-start">
                                            <div>
                                                <h4 class="text-md font-bold text-blue-800 mb-2">{{ __('Ноябрь 2013') }}</h4>
                                                <p class="text-gray-700 text-sm">
                                                    {{ __('Институциональная аккредитация Независимым агентством аккредитации и рейтинга (НААР).') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 2018 Accreditation -->
                                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-lg p-6">
                                        <div class="flex items-start">
                                            <div>
                                                <h4 class="text-md font-bold text-green-800 mb-2">{{ __('Ноябрь 2018') }}</h4>
                                                <p class="text-gray-700 text-sm">
                                                    {{ __('Институциональная аккредитация Независимым агентством по аккредитации и экспертизе качества образования (АРКА).') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 2023 Reaccreditation -->
                                    <div class="bg-gradient-to-r from-purple-50 to-violet-50 border border-purple-200 rounded-lg p-6">
                                        <div class="flex items-start">
                                            <div>
                                                <h4 class="text-md font-bold text-purple-800 mb-2">{{ __('Ноябрь 2023') }}</h4>
                                                <p class="text-gray-700 mb-2 text-sm">
                                                    {{ __('Институциональная реаккредитация Независимым агентством по признанию и обеспечению качества в образовании (АРКА) сроком на 7 лет.') }}
                                                </p>
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                                    <i class="fas fa-clock mr-2"></i>
                                                    {{ __('Действительна до 2030 года') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Certificate Image -->
                            <h3 class="text-xl md:text-2xl font-semibold text-gray-800 mb-4">{{ __('Сертификат институциональной аккредитации') }}</h3>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="flex justify-center">
                                    <div class="max-w-md">
                                        <img src="{{ Storage::url('certificates-institution/ins-kk.jpg') }}" 
                                            alt="{{ __('Сертификат институциональной аккредитации') }}" 
                                            class="w-full h-auto rounded-lg shadow-lg border border-gray-200 cursor-pointer hover:shadow-xl transition-shadow duration-300"
                                            onclick="openCertificateModal('{{ Storage::url('certificates-institution/ins-kk.jpg') }}', '{{ __('Сертификат институциональной аккредитации АРКА 2023') }}')">
                                        <p class="text-center text-sm text-gray-500 mt-2">
                                            {{ __('Нажмите на изображение для увеличения') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Benefits of Accreditation -->
                            <div class="mt-8 bg-gradient-to-br from-amber-50 to-orange-50 border border-amber-200 rounded-lg p-6">
                                <h3 class="text-md font-semibold text-amber-800 mb-4">
                                    <i class="fas fa-star mr-2"></i>
                                    {{ __('Преимущества институциональной аккредитации') }}
                                </h3>
                                <ul class="space-y-2 text-gray-700 text-sm">
                                    <li class="flex items-start">
                                        <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                        {{ __('Подтверждение соответствия международным стандартам качества образования') }}
                                    </li>
                                    <li class="flex items-start text-sm">
                                        <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                        {{ __('Повышение доверия студентов, работодателей и партнеров') }}
                                    </li>
                                    <li class="flex items-start text-sm">
                                        <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                        {{ __('Возможность участия в международных образовательных программах') }}
                                    </li>
                                    <li class="flex items-start text-sm">
                                        <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                        {{ __('Признание дипломов на международном уровне') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Specialized Accreditation Tab -->
                    <div id="content-specialized" class="accreditation-tab-content hidden">
                        <div class="bg-white rounded-xl shadow-lg">
                            <!-- Page Header -->
                            <div class="p-6 border-b border-gray-200">
                                <h2 class="text-xl md:text-2xl font-bold text-shakarim-blue mb-4">
                                    {{ __('Специализированная аккредитация') }}
                                </h2>
                                
                                <!-- Introduction -->
                                <div class="bg-blue-50 border-l-4 border-shakarim-blue p-6 rounded-r-lg">
                                    <p class="text-gray-700 leading-relaxed mb-3">
                                        {{ __('Аккредитация отдельных образовательных программ вуза.') }}
                                    </p>
                                    <p class="text-gray-700 leading-relaxed">
                                        {{ __('Наличие свидетельств специализированной аккредитации подтверждает то, что разработка образовательных программ в университете отвечает требованиями времени, что они совершенствуются в соответствии с потребностями современной экономики и рынка труда, нацелены на интеграцию в мировое образовательное пространство.') }}
                                    </p>
                                </div>
                            </div>

                            <div class="p-6">
                                @if($accreditationsByOrgan->count() > 0)
                                    <!-- Accreditation Organizations -->
                                    <div class="space-y-6">
                                        @foreach($accreditationsByOrgan as $organ => $accreditations)
                                            <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm bg-white">
                                                <!-- Organization Header -->
                                                <button class="w-full px-6 py-4 bg-shakarim-blue hover:from-shakarim-dark hover:to-blue-800 text-white text-left font-medium flex items-center justify-between transition-all duration-200"
                                                        type="button" 
                                                        onclick="toggleCollapse('organ-{{ $loop->index }}')">
                                                    <div class="flex items-center">
                                                        <i class="fas fa-university mr-3"></i>
                                                        <span class="text-lg font-semibold">{{ $organ }}</span>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm mr-3">
                                                            {{ $accreditations->count() }}
                                                        </span>
                                                        <i class="fas fa-chevron-down transform transition-transform duration-200" id="icon-organ-{{ $loop->index }}"></i>
                                                    </div>
                                                </button>

                                                <!-- Accreditations Table -->
                                                <div id="organ-{{ $loop->index }}" class="hidden">
                                                    <div class="overflow-x-auto">
                                                        <table class="w-full">
                                                            <thead class="bg-gray-50">
                                                                <tr>
                                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                        {{ __('Образовательные программы') }}
                                                                    </th>
                                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                        {{ __('Тип') }}
                                                                    </th>
                                                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                        {{ __('Сертификат') }}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="bg-white divide-y divide-gray-200">
                                                                @foreach($accreditations as $accreditation)
                                                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                                                        <td class="px-6 py-4">
                                                                            <div class="flex items-start">
                                                                                <div class="flex-shrink-0 mr-3">
                                                                                    @if($accreditation->accredited)
                                                                                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                                                    @else
                                                                                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                                                                    @endif
                                                                                </div>
                                                                                <div>
                                                                                    <div class="text-sm font-medium text-gray-900">
                                                                                        {{ $accreditation->name }}
                                                                                    </div>
                                                                                    @if($accreditation->validity_period)
                                                                                        <div class="text-xs text-gray-500">
                                                                                            {{ $accreditation->validity_period }}
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="px-6 py-4">
                                                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                                                @if($accreditation->type === 'Бакалавриат') bg-blue-100 text-blue-800
                                                                                @elseif($accreditation->type === 'Магистратура') bg-purple-100 text-purple-800
                                                                                @elseif($accreditation->type === 'Докторантура') bg-red-100 text-red-800
                                                                                @else bg-gray-100 text-gray-800 @endif">
                                                                                {{ $accreditation->type_display }}
                                                                            </span>
                                                                        </td>
                                                                        <td class="px-6 py-4 text-center">
                                                                            @if($accreditation->certificate_url)
                                                                                <button onclick="openCertificateModal('{{ $accreditation->certificate_url }}', '{{ $accreditation->name }}')"
                                                                                        class="inline-flex items-center px-3 py-2 bg-shakarim-blue hover:bg-shakarim-dark text-white rounded-lg transition-colors duration-200">
                                                                                    <i class="fas fa-eye"></i>
                                                                                </button>
                                                                            @else
                                                                                <span class="text-gray-400">—</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <!-- No Accreditations Message -->
                                    <div class="text-center py-16">
                                        <div class="max-w-md mx-auto">
                                            <i class="fas fa-certificate text-6xl text-gray-300 mb-4"></i>
                                            <h3 class="text-xl font-semibold text-gray-600 mb-2">
                                                {{ __('Аккредитации не найдены') }}
                                            </h3>
                                            <p class="text-gray-500">
                                                {{ __('В настоящее время нет данных об аккредитации') }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Certificate Modal (остается без изменений) -->
    <div id="certificateModal" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 flex items-center justify-center p-2 md:p-6">
    <div class="relative bg-white rounded-lg max-w-6xl max-h-full w-full overflow-hidden shadow-2xl">
        <!-- Modal Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200 bg-gray-50">
            <h3 id="modalTitle" class="text-lg font-semibold text-gray-900">
                {{ __('Сертификат') }}
            </h3>
            <button onclick="closeCertificateModal()" 
                    class="text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-full p-2 transition-colors duration-200">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        
        <!-- Modal Body -->
        <div class="relative bg-gray-100 flex items-center justify-center" style="max-height: 80vh;">
            <div class="relative max-w-full max-h-full overflow-auto">
                <img id="modalImage" 
                     src="" 
                     alt="Certificate" 
                     class="max-w-full max-h-full object-contain rounded"
                     style="max-height: 70vh;">
                
                <!-- Loading spinner -->
                <div id="imageLoader" class="absolute inset-0 flex items-center justify-center bg-gray-100">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
                </div>
            </div>
        </div>
        
        <!-- Modal Footer -->
        <div class="flex items-center justify-end p-4 border-t border-gray-200 bg-gray-50 space-x-3">
            <button onclick="downloadCertificate()" 
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                <i class="fas fa-download mr-2"></i>
                {{ __('Скачать') }}
            </button>
            <button onclick="closeCertificateModal()" 
                    class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-lg transition-colors duration-200">
                {{ __('Закрыть') }}
            </button>
        </div>
    </div>
</div>

<style>
    .accreditation-tab-button.active {
        background-color: #003163 !important;
        color: white !important;
    }

    .desktop-accreditation-tab-button.active {
        background-color: #003163 !important;
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

<!-- Certificates script  -->
<script>
    function openCertificateModal(imageUrl, title) {
        const modal = document.getElementById('certificateModal');
        const modalImage = document.getElementById('modalImage');
        const modalTitle = document.getElementById('modalTitle');
        const imageLoader = document.getElementById('imageLoader');
        
        modal.classList.remove('hidden');
        
        imageLoader.classList.remove('hidden');
        modalTitle.textContent = title || 'Сертификат';
        
        modalImage.onload = function() {
            imageLoader.classList.add('hidden');
        };
        
        modalImage.onerror = function() {
            imageLoader.classList.add('hidden');
            modalImage.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjNmNGY2Ii8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNiIgZmlsbD0iIzY2NzM4ZSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPtCe0YjQuNCx0LrQsCDQt9Cw0LPRgNGD0LfQutC4INC40LfQvtCx0YDQsNC20LXQvdC40Y88L3RleHQ+PC9zdmc+';
        };
        
        modalImage.src = imageUrl;
        
        // Блокируем скролл body
        document.body.style.overflow = 'hidden';
    }

    function closeCertificateModal() {
        const modal = document.getElementById('certificateModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    function downloadCertificate() {
        const modalImage = document.getElementById('modalImage');
        const modalTitle = document.getElementById('modalTitle');
        
        if (modalImage.src) {
            const link = document.createElement('a');
            link.href = modalImage.src;
            link.download = modalTitle.textContent.replace(/[^a-z0-9]/gi, '_').toLowerCase() + '.jpg';
            link.target = '_blank';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('certificateModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeCertificateModal();
            }
        });
        
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('certificateModal');
                if (!modal.classList.contains('hidden')) {
                    closeCertificateModal();
                }
            }
        });
    });
</script>

<script>
    // Tabs functionality
    function showAccreditationTab(tabName) {
        // Hide all tab contents
        const tabContents = document.querySelectorAll('.accreditation-tab-content');
        tabContents.forEach(content => {
            content.classList.add('hidden');
        });
        
        // Remove active class from all tab buttons (mobile)
        const tabButtons = document.querySelectorAll('.accreditation-tab-button');
        tabButtons.forEach(button => {
            button.classList.remove('active', 'bg-shakarim-blue', 'text-white');
            button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        });
        
        // Remove active class from all desktop tab buttons
        const desktopTabButtons = document.querySelectorAll('.desktop-accreditation-tab-button');
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

    // Initialize default styles for tabs
    document.addEventListener('DOMContentLoaded', function() {
        // Set default tab to general
        showAccreditationTab('general');
        
        // Set default styles for non-active tabs
        const tabButtons = document.querySelectorAll('.accreditation-tab-button:not(.active)');
        tabButtons.forEach(button => {
            button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        });
        
        const desktopTabButtons = document.querySelectorAll('.desktop-accreditation-tab-button:not(.active)');
        desktopTabButtons.forEach(button => {
            button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        });
    });

    // Остальные функции остаются без изменений
    function toggleCollapse(elementId) {
        const element = document.getElementById(elementId);
        const icon = document.getElementById('icon-' + elementId);
        
        if (element.classList.contains('hidden')) {
            element.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            element.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }
</script>
</x-layout>