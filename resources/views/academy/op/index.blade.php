<x-layout>
@php
    $locale = $locale ?? app()->getLocale();
    
    $levelTabs = [
        'bachelor' => __('Бакалавриат'),
        'master' => __('Магистратура'),
        'doctorate' => __('Докторантура'),
        'minor' => __('Minor'), 
    ];
    
    $fieldNameKey = match($locale) { 'kk' => 'field_name_kk', 'en' => 'field_name_en', default => 'field_name_ru' };
    $classNameKey = match($locale) { 'kk' => 'classification_name_kk', 'en' => 'classification_name_en', default => 'classification_name_ru' };
    $groupNameKey = match($locale) { 'kk' => 'group_name_kk', 'en' => 'group_name_en', default => 'group_name_ru' };
    $programNameKey = match($locale) { 'kk' => 'name_kk', 'en' => 'name_en', default => 'name_ru' };
@endphp

<section class="bg-gray-100 py-3 border-b">
    <div class="max-w-7xl mx-auto px-4">
        <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
            <a href="{{ route('site.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
            <span class="mx-1">&#8250;</span>
            <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 10]) }}" class="hover:text-shakarim-blue">{{ __('Образование') }}</a>
            <span class="mx-1">&#8250;</span>
            <span class="text-shakarim-blue font-semibold">{{ __('Образовательные программы') }}</span>
        </nav>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-2xl md:text-4xl font-heading font-bold text-shakarim-blue mb-2">{{ __('Образовательные программы') }}</h1>
    </div>

    {{-- Кнопки табов --}}
    <div class="mb-6">
        <div class="flex flex-wrap gap-2 border-b">
            @foreach($levelTabs as $key => $label)
                <button data-tab="{{ $key }}" class="tab-btn px-4 py-2 text-sm font-medium border-b-2 border-transparent hover:border-shakarim-blue whitespace-nowrap transition-colors" type="button">{{ $label }}</button>
            @endforeach
        </div>
    </div>

    {{-- Контент табов --}}
    @foreach($levelTabs as $levelKey => $label)
        <div class="tab-panel hidden" id="panel-{{ $levelKey }}">
            
            {{-- ТАБЛИЦА ДЛЯ MINOR --}}
            @if($levelKey === 'minor')
                <div class="mb-10">
                    <div class="bg-white rounded-xl shadow-lg">
                        {{-- Заголовок в стиле ОП --}}
                        <div class="text-sm font-semibold bg-blue-50 border border-blue-200 px-4 py-2 rounded-t-xl uppercase">
                            {{ __('Minor') }}
                        </div>

                        <div class="border border-blue-200 border-b-0 px-4 py-4 space-y-3">
                            <h3 class="text-base font-semibold text-gray-800">Каталог дополнительных образовательных программ (Minor)</h3>
                            <p class="text-sm text-gray-600 leading-relaxed">Дополнительная образовательная программа (Minor) — совокупность дисциплин и (или) модулей, а также других видов учебной работы, самостоятельно определяемых обучающимся для освоения с целью формирования дополнительных компетенций (в соответствии с Правилами организации учебного процесса по кредитной технологии обучения, утверждёнными приказом МОН РК от 12.10.2018 г. № 563).</p>
                            <h4 class="text-sm font-semibold text-gray-800 mt-4">Отличительные особенности программы Minor:</h4>
                            <ul class="list-disc list-inside space-y-1 text-sm text-gray-600 ml-2">
                                <li>состоит из трёх дисциплин, изучаемых последовательно на втором (третьем) курсе обучения;</li>
                                <li>общая трудоёмкость программы составляет 15 кредитов (трудоёмкость каждой дисциплины — 5 кредитов);</li>
                                <li>трудоёмкость дисциплин Minor входит в общий объём основной образовательной программы бакалавриата (240 кредитов);</li>
                                <li>программа Minor выбирается студентом самостоятельно из общего перечня, предлагаемого университетом.</li>
                            </ul>
                        </div>
                        
                        <div class="overflow-x-auto border border-blue-200 border-t-0 rounded-b-xl">
                            <table class="min-w-full text-xs md:text-sm">
                                <thead class="bg-blue-100 text-gray-700 sticky top-0 z-10">
                                    <tr class="text-left">
                                        <th class="px-3 py-2 w-1/3">{{ __('НАИМЕНОВАНИЕ ПРОГРАММЫ') }}</th>
                                        <th class="px-3 py-2">{{ __('КРАТКОЕ ОПИСАНИЕ') }}</th>
                                        <th class="px-3 py-2 w-32 text-center">{{ __('ДЕЙСТВИЕ') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                @forelse($minors as $minor)
                                    <tr class="border-b last:border-b-0 hover:bg-gray-50">
                                        <td class="px-3 py-2 align-top font-semibold text-shakarim-blue">
                                            {{ $minor->title }}
                                        </td>
                                        <td class="px-3 py-2 align-top text-gray-600">
                                            {{ Str::limit(strip_tags($minor->content), 250) }}
                                        </td>
                                        <td class="px-3 py-2 align-top text-center">
                                            <a href="{{ route('minor.show', ['locale' => $locale, 'id' => $minor->id]) }}" 
                                               class="inline-block px-3 py-1 rounded bg-blue-50 text-shakarim-blue hover:bg-shakarim-blue hover:text-white transition font-medium whitespace-nowrap border border-blue-100">
                                                {{ __('Подробнее') }}
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-4 py-8 text-center text-gray-500">
                                            {{ __('Нет доступных программ') }}
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            {{-- ТАБЛИЦЫ ДЛЯ ОП --}}
            @else
                @php($blocks = $hierarchy[$levelKey] ?? [])
                @if(empty($blocks))
                    <div class="text-gray-500 mb-8">{{ __('Нет данных для уровня.') }}</div>
                @else
                    @foreach($blocks as $fieldBlock)
                        <div class="mb-10">
                            <div class="bg-white rounded-xl shadow-lg">
                                <div class="text-sm font-semibold bg-blue-50 border border-blue-200 px-4 py-2 rounded-t-xl">{{ __('ОБЛАСТЬ ОБРАЗОВАНИЯ') }} – {{ $fieldBlock[$fieldNameKey] }}</div>
                                <div class="overflow-x-auto border border-blue-200 border-t-0 rounded-b-xl">
                                    <table class="min-w-full text-xs md:text-sm">
                                        <thead class="bg-blue-100 text-gray-700 sticky top-0 z-10">
                                            <tr class="text-left">
                                                <th class="px-3 py-2 w-64">{{ __('КОД И КЛАССИФИКАЦИЯ') }}</th>
                                                <th class="px-3 py-2 w-28">{{ __('КОД ГРУППЫ') }}</th>
                                                <th class="px-3 py-2 w-64">{{ __('ГРУППА ОП') }}</th>
                                                <th class="px-3 py-2">{{ __('ОБРАЗОВАТЕЛЬНАЯ ПРОГРАММА') }}</th>
                                                <th class="px-3 py-2 w-40">{{ __('АККРЕДИТАЦИЯ') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">
                                        @foreach($fieldBlock['classifications'] as $classification)
                                            @foreach($classification['groups'] as $group)
                                                @foreach($group['programs'] as $programIndex => $program)
                                                    <tr class="border-b last:border-b-0 hover:bg-gray-50">
                                                        @if($programIndex === 0)
                                                            <td class="px-3 py-2 align-top" rowspan="{{ count($group['programs']) }}">
                                                                <div class="font-semibold text-shakarim-blue">{{ $classification['classification_code'] }}</div>
                                                                <div class="mt-1 text-xs text-gray-600">{{ $classification[$classNameKey] }}</div>
                                                            </td>
                                                            <td class="px-3 py-2 align-top font-medium text-gray-700" rowspan="{{ count($group['programs']) }}">{{ $group['group_code'] }}</td>
                                                            <td class="px-3 py-2 align-top text-gray-600" rowspan="{{ count($group['programs']) }}">{{ $group[$groupNameKey] }}</td>
                                                        @endif
                                                        <td class="px-3 py-2">
                                                            @if(!empty($program['epvo_url']))
                                                                <a href="{{ $program['epvo_url'] }}" target="_blank" rel="noopener noreferrer" class="font-semibold text-shakarim-blue hover:underline">
                                                                    {{ $program['code'] }} — {{ $program[$programNameKey] ?? '—' }}
                                                                </a>
                                                            @else
                                                                <span class="font-semibold text-shakarim-blue">{{ $program['code'] }}</span>
                                                                <span class="ml-1">{{ $program[$programNameKey] ?? '—' }}</span>
                                                            @endif
                                                        </td>
                                                        <td class="px-3 py-2">
                                                            @if(!empty($program['accreditation_pdf']))
                                                                <a href="{{ $program['accreditation_pdf'] }}" target="_blank" rel="noopener noreferrer" class="inline-block text-xs px-2 py-1 rounded bg-green-100 text-green-700 hover:bg-green-200 transition whitespace-nowrap">
                                                                    <i class="fas fa-file-pdf mr-1"></i>{{ __('Аккредитована') }}
                                                                </a>
                                                            @else
                                                                <span class="text-gray-400 text-center block">—</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endif
        </div>
    @endforeach

    <script>
        (function(){
            const btns = document.querySelectorAll('.tab-btn');
            const panels = document.querySelectorAll('.tab-panel');
            
            function activate(key){
                panels.forEach(p => p.classList.toggle('hidden', p.id !== 'panel-'+key));
                btns.forEach(b => {
                    const isActive = b.dataset.tab === key;
                    b.classList.toggle('border-shakarim-blue', isActive);
                    b.classList.toggle('text-shakarim-blue', isActive);
                    b.classList.toggle('border-transparent', !isActive);
                    b.classList.toggle('text-gray-500', !isActive);
                });
                window.history.replaceState(null, '', '#' + key);
            }

            // Проверяем якорь при загрузке страницы
            const hash = window.location.hash.slice(1);
            const initialTab = hash && Array.from(btns).some(b => b.dataset.tab === hash) ? hash : btns[0]?.dataset.tab;
            
            if(initialTab){ activate(initialTab); }

            btns.forEach(b => b.addEventListener('click', () => activate(b.dataset.tab)));
        })();
    </script>
</div>
</x-layout>