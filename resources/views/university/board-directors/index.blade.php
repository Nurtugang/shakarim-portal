<x-layout>

@section('meta_title', __('Корпоративтік басқару') . ' - Shakarim University')
@section('meta_description', __('Корпоративтік басқару') . ' - Shakarim University')

<!-- Breadcrumbs and Section -->

<section class="bg-gray-100 py-3 border-b">
    <div class="max-w-7xl mx-auto px-4">
        <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
            <span>&#8250;</span>
            <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 1]) }}" class="hover:text-shakarim-blue">{{ __('Университет') }}</a>
            <span>&#8250;</span>
            <span class="text-shakarim-blue font-semibold">{{ __('Корпоративтік басқару') }}</span>
        </nav>
    </div>
</section>

<!-- Main Content -->

<section class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-8 mt-2">{{ __('Корпоративтік басқару') }}</h1>
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Navigation -->
                <div class="lg:w-1/4">
                    <!-- Mobile horizontal tabs -->
                    <div class="lg:hidden mb-6">
                        <div class="flex overflow-x-auto space-x-2 pb-2">
                            @foreach($categories->slice(0,1) as $category)
                                <button onclick="showTab('category-{{ $category->id }}')" id="tab-category-{{ $category->id }}" class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors @if($loop->first) active @endif">
                                    {{ $category->title }}
                                </button>
                            @endforeach
                            <!-- <button onclick="showTab('category-committees')" id="tab-category-committees" class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-shield-alt mr-2"></i>
                                {{ __('board_committees.tab_label') }}
                            </button> -->
                            @foreach($categories->slice(1,5) as $category)
                                <button onclick="showTab('category-{{ $category->id }}')" id="tab-category-{{ $category->id }}" class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors @if($loop->first) active @endif">
                                    {{ $category->title }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <!-- Desktop vertical tabs -->
                    <div class="hidden lg:block sticky top-24">
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Разделы')}}</h3>
                            <nav class="space-y-2">
                                @foreach($categories->take(1) as $category)
                                <button onclick="showTab('category-{{ $category->id }}')" id="desktop-tab-category-{{ $category->id }}" class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors @if($loop->first) active @endif">
                                    @if($category->icon_class)
                                        <i class="{{ $category->icon_class }} mr-2 w-4 text-center"></i>
                                    @endif
                                    <span>{{ $category->title }}</span>
                                </button>
                                @endforeach
                                <!-- <button onclick="showTab('category-committees')" id="desktop-tab-category-committees" class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                    <i class="fas fa-users mr-2"></i>
                                    {{ __('board_committees.tab_label') }}
                                </button> -->
                                @foreach($categories->slice(1, 5) as $category)
                                <button onclick="showTab('category-{{ $category->id }}')" id="desktop-tab-category-{{ $category->id }}" class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                    @if($category->icon_class)
                                        <i class="{{ $category->icon_class }} mr-2 w-4 text-center"></i>
                                    @endif
                                    <span>{{ $category->title }}</span>
                                </button>
                                @endforeach
                            </nav>
                        </div>
                    </div>
                </div>

            <!-- Main Content Area -->
            <div class="lg:w-3/4">
                @foreach($categories as $category)
                <div id="content-category-{{ $category->id }}" class="tab-content @if(!$loop->first) hidden @endif">
                    <div class="grid gap-6">
                    
                        @forelse($category->boards as $member)
                        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                            <div class="p-6">
                                <div class="flex flex-col md:flex-row gap-4 md:gap-6">
                                    <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                                        <img src="{{ $member->photo_url ?? asset('images/placeholder.jpg') }}" 
                                             alt="{{ $member->fullname }}" 
                                             class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover bg-gray-200">
                                        {{-- Кнопка "Подробнее" для мобильных --}}
                                        @if($member->content || $member->content2 || $member->content3)
                                        <button onclick="toggleDetails('member-details-{{ $member->id }}')" 
                                            class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                                            <span>{{ __('Подробнее') }}</span>
                                            <svg class="w-3 h-3 ml-1 transform transition-transform" id="member-arrow-mobile-{{ $member->id }}" fill="currentColor" viewBox="0 0 20 20">
                                                <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                            </svg>
                                        </button>
                                        @endif
                                    </div>
                                    <div class="flex-grow">
                                        <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                                            {{ $member->fullname }}
                                        </h3>
                                        <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                                            {{ $member->position }}
                                        </p>
                                        {{-- Кнопка "Подробнее" для десктопа --}}
                                        @if($member->content || $member->content2 || $member->content3)
                                        <button onclick="toggleDetails('member-details-{{ $member->id }}')" 
                                            class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                                            <span>{{ __('Подробнее') }}</span>
                                            <svg class="w-4 h-4 ml-2 transform transition-transform" id="member-arrow-{{ $member->id }}" fill="currentColor" viewBox="0 0 20 20">
                                                <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                                            </svg>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Detailed Information -->
                                @if($member->content || $member->content2 || $member->content3)
                                <div id="member-details-{{ $member->id }}" class="hidden mt-6 pt-6 border-t border-gray-200">
                                    
                                    <!-- Основная биография (content) -->
                                    @if($member->content)
                                    <div class="prose max-w-none">
                                        {!! $member->content !!}
                                    </div>
                                    @endif

                                    <!-- Две колонки для дополнительной информации (content2 и content3) -->
                                    @if($member->content2 || $member->content3)
                                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                                        
                                        <!-- Колонка для content2 -->
                                        @if($member->content2)
                                        <div class="prose max-w-none">
                                            {!! $member->content2 !!}
                                        </div>
                                        @endif
                                        
                                        <!-- Колонка для content3 -->
                                        @if($member->content3)
                                        <div class="prose max-w-none">
                                            {!! $member->content3 !!}
                                        </div>
                                        @endif

                                    </div>
                                    @endif

                                </div>
                                @endif
                            </div>
                        </div>

                        
                        @empty
                            <div class="bg-gray-50 rounded-lg p-6 text-center">
                                <p class="text-gray-500">{{ __('В этой категории пока нет информации.') }}</p>
                            </div>
                        @endforelse
                        @if($loop->first)
                        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
    <div class="p-6">
        <div class="flex flex-col md:flex-row gap-4 md:gap-6">
            <div class="flex-shrink-0 flex flex-col items-center md:items-start">
                <img src="/storage/board_directors/12333.jpeg" 
                     alt="" 
                     class="w-24 h-24 md:w-40 md:h-40 rounded-lg object-cover bg-gray-200">
                
                <button onclick="toggleDetails('member-details-meyrmano')" 
                    class="mt-3 md:hidden inline-flex items-center px-3 py-1.5 bg-shakarim-blue text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                    <span>{{ __('Подробнее') }}</span>
                    <svg class="w-3 h-3 ml-1 transform transition-transform" id="member-arrow-mobile-meyrmano" fill="currentColor" viewBox="0 0 20 20">
                        <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                    </svg>
                </button>
            </div>
            
            <div class="flex-grow">
                <h3 class="text-sm md:text-xl font-bold text-shakarim-blue mb-2 text-left">
                    @if(app()->getLocale() === 'en')
    S<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;e<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;r<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;i<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;k <span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;
    M<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;e<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;i<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;r<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;m<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;a<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;n<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;o<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;v
                    @else
    М<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;е<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;й<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;p<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;м<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;a<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;н<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;o<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;в <span style="font-size:0;color:transparent;position:absolute">.</span>&#8203; 
    C<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;e<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;p<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;и<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;к <span style="font-size:0;color:transparent;position:absolute">.</span>&#8203; 
    К<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;a<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;с<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;ы<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;м<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;х<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;a<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;н<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;o<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;в<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;и<span style="font-size:0;color:transparent;position:absolute">.</span>&#8203;ч
                    @endif
                </h3>
                <p class="text-sm md:text-lg font-medium text-gray-700 mb-4 text-left">
                    @if(app()->getLocale() === 'kk')
                        Директорлар кеңесінің мүшесі, тәуелсіз директор
                    @elseif(app()->getLocale() === 'en')
                        Member of the Board of Directors, Independent Director
                    @else
                        Член Совета директоров, независимый директор
                    @endif
                </p>
                
                <button onclick="toggleDetails('member-details-meyrmano')" 
                    class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-blue-700 transition-colors desktop-only">
                    <span>{{ __('Подробнее') }}</span>
                    <svg class="w-4 h-4 ml-2 transform transition-transform" id="member-arrow-meyrmano" fill="currentColor" viewBox="0 0 20 20">
                        <path fillRule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clipRule="evenodd"/>
                    </svg>
                </button>
            </div>
        </div>
        
        <div id="member-details-meyrmano" class="hidden mt-6 pt-6 border-t border-gray-200">
            
            @if(app()->getLocale() === 'kk')
            <div class="prose max-w-none mb-6">
                <p><strong>Туған күні:</strong> 1974 жылғы 2 наурыз</p>
                <p><strong>Азаматтығы:</strong> Қазақстан Республикасы</p>
                <p><strong>Директорлар кеңесіне алғашқы сайланған күні:</strong> 09.02.2026 жыл, №52 бұйрық</p>
            </div>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div class="prose max-w-none">
                    <h4 class="text-lg font-bold mb-2">Білімі</h4>
                    <ul class="list-disc pl-5 space-y-2">
                        <li>Семей қаласындағы Семипалатинск мемлекеттік медицина академиясы, жалпы практика дәрігері, жалпы хирургия мамандығы (1997 ж.).</li>
                        <li>Нагасаки университеті, Медицина ғылымдарының жоғары мектебі, медицина ғылымдары саласы бойынша PhD (2004 ж.).</li>
                        <li>Қоғамдық денсаулық сақтау саласындағы жоғары оқу орнынан кейінгі білім беру бағдарламасы, Лондон университеті, Лондон гигиена және тропикалық медицина мектебі, Ұлыбритания (2012 ж.).</li>
                        <li>PEAKS көшбасшылық бағдарламасы, Йель университеті, АҚШ (2024 ж.).</li>
                    </ul>
                </div>
                <div class="prose max-w-none">
                    <h4 class="text-lg font-bold mb-2">Еңбек өтілі</h4>
                    <ul class="list-none p-0 space-y-1">
                        <li><strong>2006–2009</strong> Нагасаки университетінің медицина факультеті молекулалық патология кафедрасының доценті.</li>
                        <li><strong>2009–2018</strong> APU университетінің доценті, Жапония.</li>
                        <li><strong>2018 –</strong> APU университетінің профессоры, Жапония.</li>
                        <li><strong>2019–2021</strong> APU университеті деканының орынбасары, Жапония.</li>
                        <li><strong>2021–2022</strong> APU университетінің Студенттер ісі жөніндегі комитетінің мүшесі, Жапония.</li>
                        <li><strong>2022–2025</strong> APU университетінің академиялық жұмыс жөніндегі деканы, Жапония.</li>
                        <li><strong>2025 –</strong> Ритцумейкан Азия-Тынық мұхиты университетінің (APU) вице-президенті, Жапония.</li>
                        <li><strong>2025 –</strong> Ритцумейкан Траст Директорлар кеңесі.</li>
                        <li><strong>2025 –</strong> Халықаралық білім берудің Азия-Тынық мұхиты қауымдастығының (APAIE) консультативтік кеңесінің мүшесі.</li>
                    </ul>
                </div>
            </div>

            @elseif(app()->getLocale() === 'en')
            <div class="prose max-w-none mb-6">
                <p><strong>Date of birth:</strong> March 2, 1974</p>
                <p><strong>Nationality:</strong> Republic of Kazakhstan</p>
                <p><strong>Date of first election to the Board of Directors:</strong> February 9, 2026, Order No. 52</p>
            </div>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div class="prose max-w-none">
                    <h4 class="text-lg font-bold mb-2">Education</h4>
                    <ul class="list-disc pl-5 space-y-2">
                        <li>Semipalatinsk State Medical Academy, Semey, General Practitioner, specializing in General Surgery (1997).</li>
                        <li>Nagasaki University, Graduate School of Medical Sciences, PhD in Medical Sciences (2004).</li>
                        <li>Post-Graduate Program in Public Health, University of London, London School of Hygiene and Tropical Medicine, UK (2012).</li>
                        <li>Leadership program PEAKS, Yale University, USA (2024).</li>
                    </ul>
                </div>
                <div class="prose max-w-none">
                    <h4 class="text-lg font-bold mb-2">Work Experience</h4>
                    <ul class="list-none p-0 space-y-1">
                        <li><strong>2006–2009</strong> Associate Professor, Faculty of Medicine, Nagasaki University.</li>
                        <li><strong>2009–2018</strong> Associate Professor, APU.</li>
                        <li><strong>2018 –</strong> Professor, APU.</li>
                        <li><strong>2019–2021</strong> Vice Dean, APU.</li>
                        <li><strong>2021–2022</strong> Member of the Student Affairs Committee, APU.</li>
                        <li><strong>2022–2025</strong> Dean of Academic Affairs, APU.</li>
                        <li><strong>2025 –</strong> Vice President, Ritsumeikan Asia Pacific University (APU), Japan.</li>
                        <li><strong>2025 –</strong> Assistant to the Trustees of the Ritsumeikan Trust, Japan.</li>
                        <li><strong>2025 –</strong> Advisory Council Member, Asia-Pacific Association for International Education (APAIE).</li>
                    </ul>
                </div>
            </div>

            @else
            <div class="prose max-w-none mb-6">
                <p><strong>Дата рождения:</strong> 2 марта 1974 года</p>
                <p><strong>Гражданство:</strong> Республика Казахстан</p>
                <p><strong>Дата первого избрания в состав Совета директоров:</strong> 09.02.2026 года, приказ №52</p>
            </div>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div class="prose max-w-none">
                    <h4 class="text-lg font-bold mb-2">Образование</h4>
                    <ul class="list-disc pl-5 space-y-2">
                        <li>Семипалатинская Государственная Медицинская Академия, г. Семей, врач общей практики, специальность общая хирургия (1997).</li>
                        <li>Университет Нагасаки, Высшая Школа Медицинских наук, PhD в области медицинских наук (2004).</li>
                        <li>Программа последипломного образования в области общественного здравоохранения, Лондонский университет, Лондонская школа гигиены и тропической медицины, Великобритания (2012).</li>
                        <li>Программа лидерства PEAKS, Йельский университет, США (2024).</li>
                    </ul>
                </div>
                <div class="prose max-w-none">
                    <h4 class="text-lg font-bold mb-2">Опыт работы</h4>
                    <ul class="list-none p-0 space-y-1">
                        <li><strong>2006–2009</strong> Доцент кафедры молекулярной патологии медицинского факультета Университета Нагасаки.</li>
                        <li><strong>2009–2018</strong> Доцент, Университет APU, Япония.</li>
                        <li><strong>2018 –</strong> Профессор, Университет APU, Япония.</li>
                        <li><strong>2019–2021</strong> Заместитель декана, Университет APU, Япония.</li>
                        <li><strong>2021–2022</strong> Член Комитета по делам студентов Университет APU, Япония.</li>
                        <li><strong>2022–2025</strong> Декан по Академической работе Университет APU, Япония.</li>
                        <li><strong>2025 –</strong> Вице-Президент, Ритцумейкан Азиатско-Тихоокеанский Университет(APU), Япония.</li>
                        <li><strong>2025 –</strong> Совет Директоров, Ритцумейкан Траст.</li>
                        <li><strong>2025 –</strong> Член консультативного совета, Азиатско-Тихоокеанская ассоциация международного образования (APAIE).</li>
                    </ul>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
                        @endif
                    </div>
                    @if($category->additional_content)
                        <div class="mt-8 p-8 border-t border-gray-200 prose max-w-none">
                            {!! $category->additional_content !!}
                        </div>
                    @endif
                </div>
                @endforeach
                
                @php
                    // Map names to photos to reuse existing thumbnails
                    $photoByName = [];
                    foreach ($categories as $cat) {
                        foreach ($cat->boards as $m) {
                            if (!empty($m->fullname)) {
                                $photoByName[trim($m->fullname)] = $m->photo_url ?? null;
                            }
                        }
                    }

                    // Manual overrides from known Storage paths (to ensure exact matches)
                    $manualPhotoMap = [
                        // Нурбаев / Нұрбаев
                        'Нурбаев Орман Каримович' => Storage::url('board_directors/01KAD7BH22E8G43N80NHSD48NM.jpg'),
                        'Нұрбаев Орман Кәрімұлы' => Storage::url('board_directors/01KAD7BH22E8G43N80NHSD48NM.jpg'),
                        'Nurbayev Orman' => Storage::url('board_directors/01KAD7BH22E8G43N80NHSD48NM.jpg'),
                        '努尔巴耶夫·奥尔曼·卡里姆乌兹' => Storage::url('board_directors/01KAD7BH22E8G43N80NHSD48NM.jpg'),
                        // Орынбеков
                        'Орынбеков Думан Рымгалиевич' => Storage::url('board/55627f971685a1d174693a4a8b1c9474.webp'),
                        'Орынбеков Думан Рымғалиұлы' => Storage::url('board/55627f971685a1d174693a4a8b1c9474.webp'),
                        'Orynbekov Duman' => Storage::url('board/55627f971685a1d174693a4a8b1c9474.webp'),
                        '奥任别科夫·杜曼·雷姆加利乌兹' => Storage::url('board/55627f971685a1d174693a4a8b1c9474.webp'),
                        // Карибаева / Кәрібаева
                        'Кәрібаева Мамыр Қуанышқызы' => Storage::url('board/Karibaeva.webp'),
                        'Karibayeva Mamyr' => Storage::url('board/Karibaeva.webp'),
                        '卡里巴耶娃·马米尔·库阿尼什嬜兹' => Storage::url('board/Karibaeva.webp'),
                        // Махмутова
                        'Махмутова Меруерт Маутхановна' => Storage::url('board/Makhmutova.webp'),
                        'Махмутова Меруерт Маутханқызы' => Storage::url('board/Makhmutova.webp'),
                        'Makhmutova Meruert' => Storage::url('board/Makhmutova.webp'),
                        '马赫穆托娃·梅鲁埃尔特·马乌特哈元嬜兹' => Storage::url('board/Makhmutova.webp'),
                        // Мукашев / Мұқашев
                        'Мукашев Балтабек Кумарович' => Storage::url('board/d97de3dad96ec2f6928b841d33cdce1f.webp'),
                        'Мұқашев Балтабек Құмарұлы' => Storage::url('board/d97de3dad96ec2f6928b841d33cdce1f.webp'),
                        'Mukashev Baltabek' => Storage::url('board/d97de3dad96ec2f6928b841d33cdce1f.webp'),
                        '穆卡舍夫·巴尔塔别克·库马尔乌兹' => Storage::url('board/d97de3dad96ec2f6928b841d33cdce1f.webp'),
                    ];
                    // Manual map takes precedence
                    $photoByName = array_merge($photoByName, $manualPhotoMap);

                    $committees = trans('board_committees.committees');
                    $headers = trans('board_committees.headers');
                @endphp

                <!-- Committees Tab Content (at the end) -->
                <div id="content-category-committees" class="tab-content hidden">
                    <div class="grid gap-6">
                        @foreach($committees as $c)
                        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                            <div class="p-6">
                                <h3 class="text-lg md:text-xl font-bold text-shakarim-blue mb-4">{{ $c['title'] }}</h3>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full">
                                        <tbody class="bg-transparent">
                                            @foreach($c['rows'] as $row)
                                                @php
                                                    $name = $row[1];
                                                    $photo = $photoByName[$name] ?? asset('images/placeholder.jpg');
                                                @endphp
                                                <tr class="committees-row">
                                                    <td class="px-3 py-4 text-sm text-gray-900">
                                                        <div class="flex items-center space-x-3">
                                                            <div class="flex-shrink-0">
                                                                <img src="{{ $photo }}" alt="{{ $name }}" class="w-12 h-12 rounded-full object-cover bg-gray-200">
                                                            </div>
                                                            <div>
                                                                <div class="font-medium text-gray-900">{{ $name }}</div>
                                                                <div class="text-sm text-gray-600 mt-1">{{ $row[2] }}</div>
                                                            </div>
                                                        </div>
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
                </div>
            </div>
        </div>
</div>
</section>

<script>
    // ... JavaScript-код без изменений ...
    function showTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
        document.querySelectorAll('.tab-button, .desktop-tab-button').forEach(button => {
            button.classList.remove('active', 'bg-shakarim-blue', 'text-white');
            button.classList.add('text-shakarim-blue');
        });
        const contentToShow = document.getElementById('content-' + tabId);
        if (contentToShow) {
            contentToShow.classList.remove('hidden');
        }
        document.querySelectorAll('#tab-' + tabId + ', #desktop-tab-' + tabId).forEach(activeButton => {
            if(activeButton) {
                activeButton.classList.remove('text-shakarim-blue');
                activeButton.classList.add('active', 'bg-shakarim-blue', 'text-white');
            }
        });
    }

    function toggleDetails(detailsId) {
        const details = document.getElementById(detailsId);
        if (!details) return;
        const memberId = detailsId.replace('member-details-', '');
        const arrows = document.querySelectorAll(`#member-arrow-${memberId}, #member-arrow-mobile-${memberId}`);
        if (details.classList.contains('hidden')) {
            details.classList.remove('hidden');
            arrows.forEach(arrow => arrow && arrow.classList.add('rotate-180'));
        } else {
            details.classList.add('hidden');
            arrows.forEach(arrow => arrow && arrow.classList.remove('rotate-180'));
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.tab-button:not(.active), .desktop-tab-button:not(.active)').forEach(button => {
            button.classList.add('text-shakarim-blue');
        });
        document.querySelectorAll('.tab-button.active, .desktop-tab-button.active').forEach(button => {
            button.classList.add('bg-shakarim-blue', 'text-white');
        });
        const firstCategoryButton = document.querySelector('.tab-button');
        if (firstCategoryButton) {
            const firstCategoryId = firstCategoryButton.id.replace('tab-', '');
            const firstContent = document.getElementById('content-' + firstCategoryId);
            if (firstContent) {
                 document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
                 firstContent.classList.remove('hidden');
            }
        }
    });
</script>

<style>
    /* ... остальные стили без изменений ... */
    .bg-shakarim-blue { background-color: #314266 !important; }
    .text-shakarim-blue { color: #314266 !important; }
    .hover\:text-shakarim-blue:hover { color: #314266 !important; }
    .tab-button.active, .desktop-tab-button.active { background-color: #314266 !important; color: white !important; }
    .flex.overflow-x-auto::-webkit-scrollbar { height: 4px; }
    .flex.overflow-x-auto::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 2px; }
    .flex.overflow-x-auto::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 2px; }
    .flex.overflow-x-auto::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    .transition-transform { transition: transform 0.2s ease-in-out; }
    .transition-colors { transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out; }
    .rotate-180 { transform: rotate(180deg); }
    .shadow-lg:hover { box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); transition: box-shadow 0.3s ease-in-out; }
    .desktop-only { display: none !important; }
    @media (min-width: 1024px) { .desktop-only { display: inline-flex !important; } }
    .prose h4 { color: #314266; margin-bottom: 0.75rem; font-size: 1.125rem; font-weight: 600; }
    
    /* --- ИСПРАВЛЕННЫЙ БЛОК --- */
    .prose ul {
        list-style-position: outside; /* Маркер СНАРУЖИ текста */
        list-style-type: disc;
        padding-left: 1.25rem; 
        margin-top: 0;
    }
    /* ------------------------ */

    .prose li { margin-bottom: 0.25rem; font-size: 0.875rem;}
    .prose strong { font-weight: 600; }
    
    /* Прозрачные таблицы комитетов */
    #content-category-committees table { background-color: transparent !important; }
    #content-category-committees tbody { background-color: transparent !important; }
    #content-category-committees tr.committees-row { background-color: transparent !important; border-bottom: 1px solid #f3f4f6; }
    #content-category-committees tr.committees-row:hover { background-color: transparent !important; }
    #content-category-committees td { background-color: transparent !important; }
</style>

</x-layout>