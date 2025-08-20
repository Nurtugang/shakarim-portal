<x-layout metaTitle="Об университете - Университет Шакарима">

<!-- Breadcrumbs -->
<section class="bg-gray-100 py-3 border-b">
    <div class="max-w-7xl mx-auto px-4">
        <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница')}}</a>
            <span>&#8250;</span>
            <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 1]) }}" class="hover:text-shakarim-blue">{{ __('Университет')}}</a>
            <span>&#8250;</span>
            <span class="text-shakarim-blue font-semibold">{{ __('Об университете')}}</span>
        </nav>
    </div>
</section>

<!-- Main Content -->
<section class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-8">{{ __('Об университете')}}</h1>
        
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Navigation -->
            <div class="lg:w-1/4">
                <!-- Mobile horizontal tabs -->
                <div class="lg:hidden mb-6">
                    <div class="flex overflow-x-auto space-x-2 pb-2">
                        <button onclick="showTab('about')" id="tab-about" class="tab-button active whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            {{ __('Об университете')}}
                        </button>
                        <button onclick="showTab('period1')" id="tab-period1" class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            1930-1950
                        </button>
                        <button onclick="showTab('period2')" id="tab-period2" class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            1950-1980
                        </button>
                        <button onclick="showTab('period3')" id="tab-period3" class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            1981-2000
                        </button>
                        <button onclick="showTab('period4')" id="tab-period4" class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            2001-настоящее
                        </button>
                    </div>
                </div>

                <!-- Desktop vertical tabs -->
                <div class="hidden lg:block sticky top-24">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Разделы')}}</h3>
                        <nav class="space-y-2">
                            <button onclick="showTab('about')" id="desktop-tab-about" class="desktop-tab-button active w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-university mr-2"></i>
                                {{ __('Об университете')}}
                            </button>
                            <button onclick="showTab('period1')" id="desktop-tab-period1" class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-history mr-2"></i>
                                1930-1950 годы
                            </button>
                            <button onclick="showTab('period2')" id="desktop-tab-period2" class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-history mr-2"></i>
                                1950-1980 годы
                            </button>
                            <button onclick="showTab('period3')" id="desktop-tab-period3" class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-history mr-2"></i>
                                1981-2000 годы
                            </button>
                            <button onclick="showTab('period4')" id="desktop-tab-period4" class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-history mr-2"></i>
                                2001-настоящее время
                            </button>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:w-3/4">
                <!-- About Tab -->
                <div id="content-about" class="tab-content">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="mb-6">
                            <img src="{{ asset('img/building.webp') }}" alt="Университет Шакарима" class="w-full h-48 md:h-64 object-cover rounded-lg shadow-md">
                        </div>
                        <div class="prose max-w-none text-gray-700 space-y-4">
                            <p><strong>Шәкәрім Университет</strong> – это современный учебно-методический, научный и культурный центр северо-восточного региона Казахстана.</p>
                            <p><strong>Шәкәрім Университет –</strong> это вуз, образованный на базе педагогического, зоо-ветеринарного, финансово-экономического и технологического институтов.</p>
                            <p><strong>Шәкәрім Университет</strong> – это многопрофильный вуз с богатым опытом работы.</p>
                            <p><strong>Шәкәрім Университет</strong> – на 5 факультетах обучаются около 7 тысяч студентов, магистрантов и докторантов по 45 образовательным программам бакалавриата, 37 ОП магистратуры и 10 ОП докторантуры PhD.</p>
                            <p><strong>Шәкәрім Университет</strong> – это востребованный высококвалифицированный профессорско-преподавательский состав, насчитывающий 971 преподавателей и сотрудников, в том числе 28 докторов наук и профессоров, 155 кандидатов наук и доцентов, 181 магистров.</p>
                            <p><strong>Шәкәрім Университет</strong> – с 2004 года внедрена кредитная технология обучения. С 2009 года осуществляется обучение на основе дистанционных образовательных технологий (ДОТ).</p>
                            <p><strong>Шәкәрім Университет</strong> – это качественная учебно-методическая и мощная материально-техническая база. Имеются 12 учебных корпусов, учебные и научные лаборатории и мастерские с современным оборудованием, научная библиотека с богатым книжным фондом (более 700 тысяч книг), с медиатекой и учебным залом, компьютерный паркинг (более 1300 компьютеров), бассейн и 2 тренажерных зала, 2 спорткомплекса со специально оборудованным футбольным полем, 1 спортивный зал, медицинский центр с лечебно-профилактическим оборудованием, Дом студентов, общежития квартирного типа.</p>
                            <p><strong>Шәкәрім Университет</strong> – 70 ученых университета являются обладателями государственного гранта «Лучший преподаватель вуза».</p>
                            <p><strong>Шәкәрім Университет</strong> – это крупный вуз с широкими международными связями. Сотрудничает с вузами США, Китая, Монголии, Германии, Нидерландов, Великобритании, Японии, Турции, Чехии, Словении, Польши, России, Республики Беларусь, Украины и стран Балтийского побережья. Является членом авторитетных международных организаций.</p>
                        </div>
                    </div>
                </div>

                <!-- Period 1: 1930-1950 -->
                <div id="content-period1" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <!-- Historical Events Table -->
                        <div class="overflow-x-auto mb-8">
                            <table class="min-w-full border border-gray-200 rounded-lg">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Год</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Событие</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">1934 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Основан Семипалатинский педагогический институт</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">1936 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Институту было присвоено имя Сакена Сейфуллина</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">1938 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Было построено первое студенческое общежитие</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">1939 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Институту было присвоено имя Н. К. Крупской</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">1942 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Впервые был осуществлен прием студентов на отделение казахского языка и литературы</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Leaders of this period -->
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Руководители периода</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/417d3866-c92e-4947-9ae7-7d212cd2e427.jpg" alt="СЕМЕНЯК ГРИГОРИЙ ВАСИЛЬЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">СЕМЕНЯК ГРИГОРИЙ ВАСИЛЬЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1934 по 1935 гг. директор Семипалатинского двухгодичного учительского института</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/0db5cb02-a8a6-414a-89a7-c192d63fbb3b.svg" alt="МУХАМБЕТОВА" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">МУХАМБЕТОВА</h4>
                                <p class="text-xs text-gray-600 mt-1">Директор Семипалатинского учительского института 03.1935-12.1935 гг.</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/51bdccff-21ad-4362-96e8-0fac6c691934.svg" alt="СУХОВ И.Я." class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">СУХОВ И.Я.</h4>
                                <p class="text-xs text-gray-600 mt-1">Директор Семипалатинского учительского института 01.1936 - 03.1937 гг.</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/5d034e15-4315-42e6-b939-036aa38e332e.jpg" alt="ИНТЫКБАЕВ АХМЕТГАЛИ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">ИНТЫКБАЕВ АХМЕТГАЛИ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 6 марта по 2 октября 1937 года – директор Семипалатинского учительского института</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/a3053d86-bdde-4841-a1ae-cdabf8383ca8.jpg" alt="МАЛЫШЕВ ПАВЕЛ ИГНАТЬЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">МАЛЫШЕВ ПАВЕЛ ИГНАТЬЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1937 по 1938 гг. исполняющий обязанности директора Семипалатинского педагогического института</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/313468b8-42dc-474b-994a-e852b421e17d.jpg" alt="САННИКОВ АНДРЕЙ МИХАЙЛОВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">САННИКОВ АНДРЕЙ МИХАЙЛОВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1938 по 1942 гг. директор Семипалатинского педагогического института</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/e3135ff9-c747-4ca2-9b73-afcfb6838575.jpg" alt="КИМ НИКОЛАЙ СЕРГЕЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">КИМ НИКОЛАЙ СЕРГЕЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1942 по 1945 гг. директор Семипалатинского педагогического института</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/014ebd48-cf70-4a5a-9e81-e56a64502d0a.jpg" alt="БАРЛЫБАЕВ РАХИМ БАРЛЫБАЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">БАРЛЫБАЕВ РАХИМ БАРЛЫБАЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1945 по 1951 гг. ректор Семипалатинского педагогического института</p>
                            </div>
                        </div>

                        <div class="mt-8 p-4 bg-blue-50 rounded-lg">
                            <p class="text-sm text-blue-800">
                                <i class="fas fa-info-circle mr-2"></i>
                                За {{ date('Y') - 1934 }} лет истории университета его возглавляли более 20 руководителей, каждый из которых внес свой вклад в развитие высшего образования в регионе.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Period 2: 1950-1980 -->
                <div id="content-period2" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="overflow-x-auto mb-8">
                            <table class="min-w-full border border-gray-200 rounded-lg">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Год</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Событие</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">1950-1960 гг.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Выведена шерстяная порода коз</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">1960 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Студенческий театр получил звание народного театра</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">1964 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Создан вокально-инструментальный ансамбль «Армандастар»</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">1970 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Был создан первый в Казахстане женский строительный отряд «Аэлита»</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">1980 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Создан Семипалатинский технологический институт мясной и молочной промышленности</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Руководители периода</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/e0a4f33d-68b0-43d5-9ea1-4841941e7735.jpg" alt="ДАУКЕЕВ КЕНЖЕБЕК ДАУКЕЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">ДАУКЕЕВ КЕНЖЕБЕК ДАУКЕЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1951 по 1953 гг. ректор Семипалатинского педагогического института имени Н.К.Крупской</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/c581405a-df54-40e0-b076-886b0b7201c5.jpg" alt="КУРОЧКИН АЛЕКСАНДР АНТОНОВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">КУРОЧКИН АЛЕКСАНДР АНТОНОВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1953 по 1971 гг. ректор Семипалатинского педагогического института имени Н.К.Крупской</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/4a9e806b-9f71-46fd-bf22-46374b398d00.jpg" alt="ТАШМУХАМЕТОВ УМИРАЛИ ТАШМУХАМЕТОВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">ТАШМУХАМЕТОВ УМИРАЛИ ТАШМУХАМЕТОВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1951 по 1954 гг. директор Семипалатинского зоотехническо-ветеринарного института</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/98978435-2214-4ec2-b304-35eb6e7e5d2e.jpg" alt="САДЫКОВ БАЙДОЛЛА ХАМЗИЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">САДЫКОВ БАЙДОЛЛА ХАМЗИЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1954 по 1967 гг. ректор Семипалатинского зоотехническо-ветеринарного института</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/4cc6a980-8bba-4504-baee-5bc28dc1bfd3.jpg" alt="ТАЛАЛАЕВ ВЛАДИМИР ДМИТРИЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">ТАЛАЛАЕВ ВЛАДИМИР ДМИТРИЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1965 по 1980 гг. ректор Семипалатинского технологического института мясной и молочной промышленности</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/8020dbce-b4fd-40a0-a1fd-38682d73a842.jpg" alt="АБДИЛЬМАНОВ УАЛХАН АБДИЛЬМАНОВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">АБДИЛЬМАНОВ УАЛХАН АБДИЛЬМАНОВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1967 по 1982 гг. ректор Семипалатинского зоотехническо-ветеринарного института</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/45a351de-fb11-40dd-9f9b-25e2715b355e.jpg" alt="ЧЕРНОВ ЮРИЙ ГЕОРГИЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">ЧЕРНОВ ЮРИЙ ГЕОРГИЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1971 по 1983 гг. ректор Семипалатинского педагогического института имени Н.К.Крупской</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/84578076-144a-4b1b-8812-a14fc8abd360.jpg" alt="РАХЫЖАНОВ ОРЫНГАЗЫ РАХЫЖАНОВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">РАХЫЖАНОВ ОРЫНГАЗЫ РАХЫЖАНОВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1980 по 1986 гг. ректор Семипалатинского технологического института мясной и молочной промышленности</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Period 3: 1981-2000 -->
                <div id="content-period3" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="overflow-x-auto mb-8">
                            <table class="min-w-full border border-gray-200 rounded-lg">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Год</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Событие</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">1988 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Создан студенческий учебно-научно-ветеринарный отряд</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">1993 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Институту было присвоено имя Шакарима Кудайбердиева</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">1995 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Создан Государственный университет «Семей»</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Руководители периода</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/e458b956-c1d9-47e1-bc36-8d4fb203f904.jpg" alt="ПАНИН МИХАИЛ СЕМЕНОВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">ПАНИН МИХАИЛ СЕМЕНОВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1985 по 1995 гг. ректор Семипалатинского педагогического института имени Н.К. Крупской, с 1995 по 1997 гг. ректор государственного университета «Семей»</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/3e439272-5452-4f2f-8f53-6c8118c01d9a.jpg" alt="ГАМАРНИК ГЕННАДИЙ НИКОЛАЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">ГАМАРНИК ГЕННАДИЙ НИКОЛАЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1997 по 2000 гг. ректор Семипалатинского государственного финансового института</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/c99f9dff-1e9b-4986-afec-1a446e02d945.jpg" alt="АПСАЛЯМОВ НАДИРБЕК АПСАЛЯМОВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">АПСАЛЯМОВ НАДИРБЕК АПСАЛЯМОВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1990 по 1996 гг. ректор Семипалатинского технологического института мясной и молочной промышленности, с 1996 по 1997 гг. ректор Семипалатинского государственного финансового института</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/62b65abe-6947-40f4-8016-4f180f50a5fa.jpg" alt="ТУСУПБЕКОВ ТЛЕУГАЛИ ТЕМИРГАЛИЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">ТУСУПБЕКОВ ТЛЕУГАЛИ ТЕМИРГАЛИЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1994 по 1995 гг. ректор Семипалатинского государственного финансового института</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/21683623-5c4e-4e36-ab9a-2027ce410f79.jpg" alt="ВОРОБЬЕВ ВЛАДИМИР ИВАНОВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">ВОРОБЬЕВ ВЛАДИМИР ИВАНОВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1986 по 1990 гг. ректор Семипалатинского технологического института мясной и молочной промышленности</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/319b5ef4-a1da-441b-b285-6b351a8af3d5.jpg" alt="КУЗНЕЦОВ ЕВГЕНИЙ АЛЕКСАНДРОВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">КУЗНЕЦОВ ЕВГЕНИЙ АЛЕКСАНДРОВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1983 по 1985 гг. ректор Семипалатинского педагогического института имени Н.К.Крупской</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/d0bf765e-c8dd-4193-9efa-a863f0bcdaea.jpg" alt="ТОКАЕВ ЗЕЙНОЛЛА КАЛЫМБЕКОВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">ТОКАЕВ ЗЕЙНОЛЛА КАЛЫМБЕКОВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1982 по 1995 гг. ректор Семипалатинского зоотехническо-ветеринарного института</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Period 4: 2001-Present -->
                <div id="content-period4" class="tab-content hidden">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="overflow-x-auto mb-8">
                            <table class="min-w-full border border-gray-200 rounded-lg">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Год</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Событие</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">2007 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Создан Национальный научный центр радиоэкологических исследований</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">2009 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Была подписана Великая хартия университетов</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">2020 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Предоставлена академическая свобода</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900">2021 г.</td>
                                        <td class="px-4 py-3 text-sm text-gray-700">Создан интеллектуальный центр «Шакарим жастары»</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Современные руководители</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <a href="{{ route('rector.blog', ['locale' => app()->getLocale()]) }}">
                                <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-lg p-4 text-center border-2 border-blue-200 transition-transform duration-200 hover:scale-105">
                                    <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                        <img src="/storage/pages/5935f7d8-92f4-4490-bd86-3509dc2a9b32.jpg" alt="ОРЫНБЕКОВ ДУМАН РЫМГАЛИЕВИЧ" class="w-full h-full object-cover">
                                    </div>
                                    <h4 class="font-bold text-sm text-blue-800">ОРЫНБЕКОВ ДУМАН РЫМГАЛИЕВИЧ</h4>
                                    <p class="text-xs text-blue-600 mt-2 font-medium">Действующий ректор</p>
                                    <p class="text-xs text-gray-600 mt-1">С июля 2023 г. по настоящее время Председатель Правления-Ректор НАО «Шәкәрім Университет»</p>
                                </div>
                            </a>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/8cd9e8c4-a8f3-498a-93b1-1e83f3b933cb.jpg" alt="ЕРДЕМБЕКОВ БАУРЖАН АМАНГЕЛЬДЫЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">ЕРДЕМБЕКОВ БАУРЖАН АМАНГЕЛЬДЫЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 2021 по 2023 гг. Председатель Правления-Ректор НАО «Университет имени Шакарима города Семей»</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/d3e013eb-a8fb-4936-b552-8d1ba8741485.jpg" alt="БАЙЖУМАНОВ МУХТАР КАЗБЕКУЛЫ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">БАЙЖУМАНОВ МУХТАР КАЗБЕКУЛЫ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 2020 по 2021 гг. Председатель Правления-Ректор НАО «Университет имени Шакарима города Семей»</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/4e506830-685f-47ed-8bcc-19912b6521c3.jpg" alt="ЕСКЕНДИРОВ МЕИР ГАРИПОЛЛАЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">ЕСКЕНДИРОВ МЕИР ГАРИПОЛЛАЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 2008 по 2012 гг. ректор Семипалатинского государственного педагогического института, с 2016 по 2020 гг. ректор государственного университета имени Шакарима города Семей</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/7d2dc3f2-35da-4408-bb4f-05955f377073.jpg" alt="АМИРБЕКОВ ШАРИПБЕК АГАБАЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">АМИРБЕКОВ ШАРИПБЕК АГАБАЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 2011 по 2016 гг. ректор Семипалатинского государственного университета имени Шакарима</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/edf0a5e5-5654-4447-a283-9305cd8d186c.jpg" alt="БЕКТЕМЕСОВ МАКТАГАЛИ АБДИМАЖИТОВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">БЕКТЕМЕСОВ МАКТАГАЛИ АБДИМАЖИТОВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 2012 по 2013 гг. ректор Семипалатинского государственного педагогического института</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/e61a6827-706d-4855-aae4-e2736c9db63d.jpg" alt="СЫДЫКОВ ЕРЛАН БАТТАШЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">СЫДЫКОВ ЕРЛАН БАТТАШЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 1997 по 2004 гг. ректор государственного университета «Семей», с 2004 по 2008 гг. ректор Семипалатинского государственного педагогического института, с 2008 по 2011 гг. ректор Семипалатинского государственного университета имени Шакарима</p>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <div class="w-24 h-32 mx-auto mb-3 rounded-lg overflow-hidden">
                                    <img src="/storage/pages/0daeaec4-a962-48dd-bc21-cbc973e13888.jpg" alt="АДИЛОВ ЖЕКСЕНБЕК МАКЕЕВИЧ" class="w-full h-full object-cover">
                                </div>
                                <h4 class="font-semibold text-sm">АДИЛОВ ЖЕКСЕНБЕК МАКЕЕВИЧ</h4>
                                <p class="text-xs text-gray-600 mt-1">С 2004 по 2008 гг. ректор Семипалатинского государственного университета имени Шакарима</p>
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
</script>

<style>
    .tab-button.active {
        background-color: #003163 !important;
        color: white !important;
    }

    .desktop-tab-button.active {
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


                
</x-layout>
