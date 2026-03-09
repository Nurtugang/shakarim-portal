<x-layout :metaTitle="__('Психологический отдел')">
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="#" class="hover:text-shakarim-blue">{{ __('Университет') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Психологический отдел') }}</span>
            </nav>
        </div>
    </section>

    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="mb-8 mt-2">
                <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">
                    {{ __('Психологический отдел') }}
                </h1>
                <p class="text-gray-600 mt-2">{{ __('Психологическая служба поддержки студентов и сотрудников Шәкәрім Университеті') }}</p>
            </div>

            <div class="mb-6">
                <div class="lg:hidden">
                    <div class="flex overflow-x-auto space-x-2 pb-2 border-b border-gray-200">
                        <a href="#main" onclick="showTab('main', event)" id="tab-main" class="dept-tab-button active whitespace-nowrap px-4 py-3 text-sm font-medium transition-colors border-b-2">
                            <i class="fas fa-home mr-2"></i>{{ __('Главная') }}
                        </a>
                        <a href="#about" onclick="showTab('about', event)" id="tab-about" class="dept-tab-button whitespace-nowrap px-4 py-3 text-sm font-medium transition-colors border-b-2">
                            <i class="fas fa-info-circle mr-2"></i>{{ __('О нас') }}
                        </a>
                        <a href="#students" onclick="showTab('students', event)" id="tab-students" class="dept-tab-button whitespace-nowrap px-4 py-3 text-sm font-medium transition-colors border-b-2">
                            <i class="fas fa-user-graduate mr-2"></i>{{ __('Студентам') }}
                        </a>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <div class="border-b border-gray-200">
                        <nav class="flex space-x-8">
                            <a href="#main" onclick="showTab('main', event)" id="desktop-tab-main" class="desktop-dept-tab-button active py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                                <i class="fas fa-home mr-2"></i>{{ __('Главная') }}
                            </a>
                            <a href="#about" onclick="showTab('about', event)" id="desktop-tab-about" class="desktop-dept-tab-button py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                                <i class="fas fa-info-circle mr-2"></i>{{ __('О нас') }}
                            </a>
                            <a href="#students" onclick="showTab('students', event)" id="desktop-tab-students" class="desktop-dept-tab-button py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                                <i class="fas fa-user-graduate mr-2"></i>{{ __('Студентам') }}
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            <div id="content-main" class="dept-tab-content">
                
                <div class="relative rounded-xl shadow-sm mb-12 overflow-hidden bg-cover bg-center" style="background-image: url('{{ asset('path/to/image_e8dbb5.png') }}');">
                    <div class="absolute inset-0 bg-white/70"></div>
                    <div class="relative p-8 md:p-12 text-center">
                        <p class="text-lg md:text-xl font-medium text-gray-800 leading-relaxed max-w-4xl mx-auto">
                            <i class="fas fa-quote-left text-shakarim-blue opacity-50 mr-2"></i>
                            {{ __('Служба психологической поддержки — это элемент современной образовательной системы, направленный на формирование комфортной социально-психологической среды и предоставление психологической помощи.') }}
                            <i class="fas fa-quote-right text-shakarim-blue opacity-50 ml-2"></i>
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12 items-stretch">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 flex flex-col justify-center">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mr-4 text-shakarim-blue">
                                <i class="fas fa-bullseye text-xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800">{{ __('Цели психологической службы') }}</h2>
                        </div>
                        <ul class="space-y-4 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span>{{ __('Обеспечение психологического благополучия студентов, преподавателей и сотрудников вуза.') }}</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span>{{ __('Профилактика эмоциональных, стрессовых и кризисных состояний.') }}</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span>{{ __('Содействие успешной адаптации к образовательной среде и учебным нагрузкам.') }}</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span>{{ __('Оказание кризисной и экстренной психологической помощи.') }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="rounded-xl overflow-hidden shadow-sm h-full min-h-[300px]">
                        <img src="{{ asset('storage/psychological-support/1.png') }}" alt="Цели службы" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12 items-stretch">
                    <div class="rounded-xl overflow-hidden shadow-sm h-full min-h-[300px] order-2 lg:order-1">
                        <img src="{{ asset('storage/psychological-support/2.png') }}" alt="Функции службы" class="w-full h-full object-cover">
                    </div>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 flex flex-col justify-center order-1 lg:order-2">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mr-4 text-shakarim-blue">
                                <i class="fas fa-cogs text-xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800">{{ __('Функции') }}</h2>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-md transition-shadow border border-gray-100">
                                <i class="fas fa-comments text-shakarim-blue text-3xl mb-3"></i>
                                <h3 class="font-semibold text-gray-800">{{ __('Консультирование') }}</h3>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-md transition-shadow border border-gray-100">
                                <i class="fas fa-shield-alt text-shakarim-blue text-3xl mb-3"></i>
                                <h3 class="font-semibold text-gray-800">{{ __('Психопрофилактика') }}</h3>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-md transition-shadow border border-gray-100">
                                <i class="fas fa-clipboard-list text-shakarim-blue text-3xl mb-3"></i>
                                <h3 class="font-semibold text-gray-800">{{ __('Психодиагностика') }}</h3>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-md transition-shadow border border-gray-100">
                                <i class="fas fa-hands-helping text-shakarim-blue text-3xl mb-3"></i>
                                <h3 class="font-semibold text-gray-800">{{ __('Психокоррекция') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 flex flex-col justify-center">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mr-4 text-shakarim-blue">
                                <i class="fas fa-list-ul text-xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800">{{ __('Задачи психологической службы') }}</h2>
                        </div>
                        <div class="space-y-4 text-gray-600">
                            <div class="flex items-start">
                                <div class="min-w-2 mt-2 h-2 rounded-full bg-shakarim-blue mr-3"></div>
                                <p>{{ __('Проведение индивидуального и группового психологического консультирования.') }}</p>
                            </div>
                            <div class="flex items-start">
                                <div class="min-w-2 mt-2 h-2 rounded-full bg-shakarim-blue mr-3"></div>
                                <p>{{ __('Психодиагностика уровня тревожности, стрессоустойчивости, мотивации и социального климата.') }}</p>
                            </div>
                            <div class="flex items-start">
                                <div class="min-w-2 mt-2 h-2 rounded-full bg-shakarim-blue mr-3"></div>
                                <p>{{ __('Информирование обучающихся о способах поддержания психического здоровья.') }}</p>
                            </div>
                            <div class="flex items-start">
                                <div class="min-w-2 mt-2 h-2 rounded-full bg-shakarim-blue mr-3"></div>
                                <p>{{ __('Взаимодействие с кафедрами и администрацией по вопросам психолого-педагогического сопровождения.') }}</p>
                            </div>
                            <div class="flex items-start">
                                <div class="min-w-2 mt-2 h-2 rounded-full bg-shakarim-blue mr-3"></div>
                                <p>{{ __('Разработка методических материалов, программ развития и поддержки.') }}</p>
                            </div>
                            <div class="flex items-start">
                                <div class="min-w-2 mt-2 h-2 rounded-full bg-shakarim-blue mr-3"></div>
                                <p>{{ __('Организация профилактических мероприятий, тренингов и семинаров.') }}</p>
                            </div>
                            <div class="flex items-start">
                                <div class="min-w-2 mt-2 h-2 rounded-full bg-shakarim-blue mr-3"></div>
                                <p>{{ __('Сопровождение первокурсников и иностранных студентов в период адаптации.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-xl overflow-hidden shadow-sm h-full min-h-[300px]">
                        <img src="{{ asset('storage/psychological-support/3.png') }}" alt="Задачи службы" class="w-full h-full object-cover">
                    </div>
                </div>

            </div>

            <div id="content-about" class="dept-tab-content hidden">
                <div class="flex items-center mb-8">
                    <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mr-4 text-shakarim-blue">
                        <i class="fas fa-users-cog text-xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">{{ __('Команда службы') }}</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    @if($structure->filteredData)
                        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all text-center flex flex-col items-center group">
                            <div class="w-32 h-32 md:w-40 md:h-40 mb-4 overflow-hidden rounded-2xl ring-4 ring-gray-50 group-hover:ring-shakarim-blue/10 transition-all">
                                <img src="{{ $structure->filteredData->getPhoto() }}" 
                                    alt="{{ $structure->filteredData->leader_name }}" 
                                    class="w-full h-full object-cover">
                            </div>
                            <h4 class="font-bold text-gray-800 text-base md:text-lg mb-1 leading-tight">
                                {{ $structure->filteredData->leader_name }}
                            </h4>
                            <p class="text-shakarim-blue text-xs font-bold uppercase tracking-wider mb-2">
                                {{ __('Руководитель') }}
                            </p>
                            <p class="text-gray-500 text-sm italic leading-snug">
                                {{ $structure->filteredData->leader_position }}
                            </p>
                            
                            @if($structure->filteredData->email)
                                <div class="mt-4 pt-4 border-t border-gray-50 w-full">
                                    <a href="mailto:{{ $structure->filteredData->email }}" class="text-gray-400 hover:text-shakarim-blue transition-colors text-sm">
                                        <i class="fas fa-envelope mr-1"></i> {{ $structure->filteredData->email }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif

                    @foreach($structure->employees as $employee)
                        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all text-center flex flex-col items-center group">
                            <div class="w-32 h-32 md:w-40 md:h-40 mb-4 overflow-hidden rounded-2xl ring-4 ring-gray-50 group-hover:ring-shakarim-blue/10 transition-all">
                                <img src="{{ $employee->getPhoto() }}" 
                                    alt="{{ $employee->{'fullname_'.app()->getLocale()} }}" 
                                    class="w-full h-full object-cover">
                            </div>
                            <h4 class="font-bold text-gray-800 text-base md:text-lg mb-1 leading-tight">
                                @php
                                    $fullname = $employee->{'fullname_'.app()->getLocale()};
                                    $words = explode(' ', trim($fullname));
                                @endphp
                                {{ $fullname }}
                            </h4>
                            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-2">
                                {{ __('Специалист') }}
                            </p>
                            <p class="text-gray-500 text-sm italic leading-snug">
                                {{ $employee->{'position_'.app()->getLocale()} }}
                            </p>
                        </div>
                    @endforeach

                </div>

                @if($structure->filteredData)
                    <div class="mt-12 bg-gray-50 rounded-2xl p-6 grid grid-cols-1 md:grid-cols-3 gap-6 border border-gray-100">
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-map-marker-alt text-shakarim-blue text-xl"></i>
                            <div>
                                <p class="text-xs text-gray-400 uppercase font-bold">{{ __('Наш адрес') }}</p>
                                <p class="text-gray-700 font-medium">{{ $structure->filteredData->address }} {{ $structure->filteredData->cabinet ? ', ' . $structure->filteredData->cabinet : '' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 border-l border-gray-200 pl-6">
                            <i class="fas fa-clock text-shakarim-blue text-xl"></i>
                            <div>
                                <p class="text-xs text-gray-400 uppercase font-bold">{{ __('График работы') }}</p>
                                <p class="text-gray-700 font-medium">Пн-Пт: 09:00 - 18:00</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div id="content-students" class="dept-tab-content hidden">
                
                <div class="mb-12">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mr-4 text-shakarim-blue">
                            <i class="fas fa-brain text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">{{ __('Полезные методики') }}</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                            <div class="h-48 bg-gray-100 overflow-hidden">
                                <img src="{{ asset('storage/psychological-support/4.png') }}" alt="Метод Pomodoro" class="w-full h-full object-cover">
                            </div>
                            <div class="p-6 flex-grow flex flex-col">
                                <h3 class="text-xl font-bold text-gray-800 mb-3">{{ __('Метод Pomodoro') }}</h3>
                                <p class="text-sm text-gray-600 mb-2"><strong>{{ __('Цель:') }}</strong> {{ __('Повысить концентрацию и бороться с прокрастинацией.') }}</p>
                                <div class="text-sm text-gray-600 mb-4 flex-grow">
                                    <strong>{{ __('Инструкция:') }}</strong>
                                    <ul class="list-disc pl-5 mt-1 space-y-1">
                                        <li>{{ __('Поставь таймер на 25 минут и полностью сосредоточься на одной задаче.') }}</li>
                                        <li>{{ __('После — 5 минут перерыва (встать, размяться, налить воды).') }}</li>
                                        <li>{{ __('Повтори 4 раза = 1 «помодоро-сессия».') }}</li>
                                        <li>{{ __('После 4 циклов сделай длинный перерыв (15–30 мин).') }}</li>
                                    </ul>
                                </div>
                                <div class="bg-blue-50 p-3 rounded-lg text-sm text-shakarim-blue mt-auto">
                                    <strong>{{ __('Результат:') }}</strong> {{ __('Работа в ритме снижает тревожность и помогает встраивать усилия в привычку.') }}
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                            <div class="h-48 bg-gray-100 overflow-hidden">
                                <img src="{{ asset('storage/psychological-support/5.png') }}" alt="Квадрат самооценки" class="w-full h-full object-cover">
                            </div>
                            <div class="p-6 flex-grow flex flex-col">
                                <h3 class="text-xl font-bold text-gray-800 mb-3">{{ __('«Квадрат самооценки»') }}</h3>
                                <p class="text-sm text-gray-600 mb-2"><strong>{{ __('Цель:') }}</strong> {{ __('Выявить уровень, адекватность и структуру самооценки личности.') }}</p>
                                <div class="text-sm text-gray-600 mb-4 flex-grow">
                                    <strong>{{ __('Инструкция:') }}</strong>
                                    <ol class="list-decimal pl-5 mt-1 space-y-1">
                                        <li>{{ __('Разделите лист А4 на 4 сектора: внешность/тело (верх лево), мысль (верх право), чувства/эмоции (низ лево), действия (низ право).') }}</li>
                                        <li>{{ __('Оцените каждую сферу от 0% до 100%.') }}</li>
                                        <li>{{ __('Запишите шаги для достижения 100% принятия себя в каждой области.') }}</li>
                                    </ol>
                                </div>
                                <div class="bg-blue-50 p-3 rounded-lg text-sm text-shakarim-blue mt-auto">
                                    <strong>{{ __('Результат:') }}</strong> {{ __('Помогает понять разницу между самооценкой и восприятием, ведет к личностному росту.') }}
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                            <div class="h-48 bg-gray-100 overflow-hidden">
                                <img src="{{ asset('storage/psychological-support/6.png') }}" alt="Колесо баланса" class="w-full h-full object-cover">
                            </div>
                            <div class="p-6 flex-grow flex flex-col">
                                <h3 class="text-xl font-bold text-gray-800 mb-3">{{ __('Колесо баланса') }}</h3>
                                <p class="text-sm text-gray-600 mb-2"><strong>{{ __('Цель:') }}</strong> {{ __('Оценка баланса между сферами жизни студента.') }}</p>
                                <div class="text-sm text-gray-600 mb-4 flex-grow">
                                    <strong>{{ __('Инструкция:') }}</strong>
                                    <ul class="list-disc pl-5 mt-1 space-y-1">
                                        <li>{{ __('Нарисуй круг, раздели на 8 секторов: Учёба, Здоровье, Отдых, Отношения, Хобби, Финансы, Саморазвитие, Дом/быт.') }}</li>
                                        <li>{{ __('Оцени каждую сферу от 1 до 10.') }}</li>
                                        <li>{{ __('Закрась сектора соответственно оценкам. Посмотри, где провалы, где перегиб.') }}</li>
                                    </ul>
                                </div>
                                <div class="bg-blue-50 p-3 rounded-lg text-sm text-shakarim-blue mt-auto">
                                    <strong>{{ __('Результат:') }}</strong> {{ __('Помогает понять причину отсутствия мотивации — часто это перекос в балансе.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mr-4 text-shakarim-blue">
                            <i class="fas fa-clipboard-check text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">{{ __('Психологические тесты') }}</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="bg-gray-50 rounded-xl p-6 border-l-4 border-shakarim-blue shadow-sm hover:shadow-md transition flex flex-col">
                            <h3 class="font-bold text-lg text-gray-800 mb-2">{{ __('Тест адаптации к студенчеству (ТАС)') }}</h3>
                            <p class="text-gray-600 text-sm mb-4 flex-grow">{{ __('Выявление уровня социальной, учебной и психологической адаптации первокурсников к условиям вузовской среды.') }}</p>
                            <a href="https://psytests.org/work/asvvuz.html" target="_blank" class="inline-flex items-center text-shakarim-blue font-medium hover:underline mt-auto">
                                {{ __('Пройти тест') }} <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-6 border-l-4 border-shakarim-blue shadow-sm hover:shadow-md transition flex flex-col">
                            <h3 class="font-bold text-lg text-gray-800 mb-2">{{ __('Опросник мотивации учения (Т.И. Ильина)') }}</h3>
                            <p class="text-gray-600 text-sm mb-4 flex-grow">{{ __('Определение ведущих мотивов учебной деятельности студентов.') }}</p>
                            <a href="https://psytests.org/emvol/ilmov.html" target="_blank" class="inline-flex items-center text-shakarim-blue font-medium hover:underline mt-auto">
                                {{ __('Пройти тест') }} <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-6 border-l-4 border-shakarim-blue shadow-sm hover:shadow-md transition flex flex-col">
                            <h3 class="font-bold text-lg text-gray-800 mb-2">{{ __('Определение профессионально-психологического типа личности') }}</h3>
                            <p class="text-gray-600 text-sm mb-4 flex-grow">{{ __('Методика (ППТ) предназначена для определения принадлежности человека к одному из основных профессиональных типов работника (руководителя, исполнителя, коммуникатора, генератора).') }}</p>
                            <a href="https://psytests.org/typo/ppt.html" target="_blank" class="inline-flex items-center text-shakarim-blue font-medium hover:underline mt-auto">
                                {{ __('Пройти тест') }} <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-6 border-l-4 border-shakarim-blue shadow-sm hover:shadow-md transition flex flex-col">
                            <h3 class="font-bold text-lg text-gray-800 mb-2">{{ __('Шкала депрессии Бека (BDI)') }}</h3>
                            <p class="text-gray-600 text-sm mb-4 flex-grow">{{ __('Выявление признаков депрессии и определение степени её выраженности.') }}</p>
                            <a href="https://psytests.org/depr/bdi-run.html" target="_blank" class="inline-flex items-center text-shakarim-blue font-medium hover:underline mt-auto">
                                {{ __('Пройти тест') }} <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

    <style>
        /* Tab styles */
        .dept-tab-button, .desktop-dept-tab-button {
            color: #6b7280;
            border-color: transparent;
        }
        .dept-tab-button.active, .desktop-dept-tab-button.active {
            color: #314266; /* shakarim-blue */
            border-color: #314266; /* shakarim-blue */
        }
        .dept-tab-button:hover:not(.active) {
            color: #314266;
            background-color: #f3f4f6;
        }
        .desktop-dept-tab-button:hover:not(.active) {
            color: #314266;
        }
        .prose a {
            color: #0000EE;
        }
    </style>

    <script>
        function showTab(tabName, event) {
            if (event) {
                event.preventDefault();
            }
            
            // Скрываем весь контент
            document.querySelectorAll('.dept-tab-content').forEach(c => c.classList.add('hidden'));
            
            // Убираем активный класс у всех кнопок
            document.querySelectorAll('.dept-tab-button, .desktop-dept-tab-button').forEach(b => b.classList.remove('active'));
            
            // Показываем нужный контент
            const content = document.getElementById('content-' + tabName);
            if (content) content.classList.remove('hidden');
            
            // Активируем нужные кнопки
            const mobileBtn = document.getElementById('tab-' + tabName);
            const desktopBtn = document.getElementById('desktop-tab-' + tabName);
            if (mobileBtn) mobileBtn.classList.add('active');
            if (desktopBtn) desktopBtn.classList.add('active');

            // Обновляем URL hash
            if (history.pushState) {
                history.pushState(null, null, '#' + tabName);
            } else {
                window.location.hash = '#' + tabName;
            }
        }

        // Инициализация при загрузке страницы
        document.addEventListener('DOMContentLoaded', function() {
            const hash = window.location.hash.substring(1);
            const validTabs = ['main', 'about', 'students'];
            
            if (hash && validTabs.includes(hash)) {
                showTab(hash);
            } else {
                showTab('main'); // Таб по умолчанию
            }
        });
    </script>
</x-layout>