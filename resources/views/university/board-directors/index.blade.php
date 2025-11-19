<x-layout metaTitle="{{ __('Корпоративтік басқару') }}">

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
                            @foreach($categories as $category)
                                <button onclick="showTab('category-{{ $category->id }}')" id="tab-category-{{ $category->id }}" class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors @if($loop->first) active @endif">
                                    {{ $category->title }}
                                </button>
                            @endforeach
                            <button onclick="showTab('category-committees')" id="tab-category-committees" class="tab-button whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-shield-alt mr-2"></i>
                                {{ __('board_committees.tab_label') }}
                            </button>
                        </div>
                    </div>
                    <!-- Desktop vertical tabs -->
                    <div class="hidden lg:block sticky top-24">
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Разделы')}}</h3>
                            <nav class="space-y-2">
                                @foreach($categories as $category)
                                <button onclick="showTab('category-{{ $category->id }}')" id="desktop-tab-category-{{ $category->id }}" class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors @if($loop->first) active @endif">
                                    @if($category->icon_class)
                                        <i class="{{ $category->icon_class }} mr-2 w-4 text-center"></i>
                                    @endif
                                    <span>{{ $category->title }}</span>
                                </button>
                                @endforeach
                                <button onclick="showTab('category-committees')" id="desktop-tab-category-committees" class="desktop-tab-button w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                    <i class="fas fa-users mr-2"></i>
                                    {{ __('board_committees.tab_label') }}
                                </button>
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
                        'Нурбаев Орман Каримович' => Storage::url('board/ac8d0fcaaf30d8b99fb27c4076b091c8.webp'),
                        'Нұрбаев Орман Кәрімұлы' => Storage::url('board/ac8d0fcaaf30d8b99fb27c4076b091c8.webp'),
                        'Nurbayev Orman' => Storage::url('board/ac8d0fcaaf30d8b99fb27c4076b091c8.webp'),
                        '努尔巴耶夫·奥尔曼·卡里姆乌兹' => Storage::url('board/ac8d0fcaaf30d8b99fb27c4076b091c8.webp'),
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