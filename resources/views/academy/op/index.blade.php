<x-layout>
@php
    $locale = $locale ?? app()->getLocale();
    $levelTabs = [
        'bachelor' => __('Бакалавриат'),
        'master' => __('Магистратура'),
        'doctorate' => __('Докторантура'),
    ];
    $fieldNameKey = match($locale) {
        'kk' => 'field_name_kk',
        'en' => 'field_name_en',
        default => 'field_name_ru'
    };
    $classNameKey = match($locale) {
        'kk' => 'classification_name_kk',
        'en' => 'classification_name_en',
        default => 'classification_name_ru'
    };
    $groupNameKey = match($locale) {
        'kk' => 'group_name_kk',
        'en' => 'group_name_en',
        default => 'group_name_ru'
    };
    $programNameKey = match($locale) {
        'kk' => 'name_kk',
        'en' => 'name_en',
        default => 'name_ru'
    };
@endphp


<section class="bg-gray-100 py-3 border-b">
    <div class="max-w-7xl mx-auto px-4">
        <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
            <a href="{{ route('site.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
            <span class="mx-1">&#8250;</span>
            <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 1]) }}" class="hover:text-shakarim-blue">{{ __('Образование') }}</a>
            <span class="mx-1">&#8250;</span>
            <span class="text-shakarim-blue font-semibold">{{ __('Образовательные программы') }}</span>
        </nav>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-2xl md:text-4xl font-heading font-bold text-shakarim-blue mb-2">{{ __('Образовательные программы') }}</h1>
    </div>

    <div class="mb-6">
        <div class="flex space-x-2 border-b">
            @foreach($levelTabs as $key => $label)
                <button data-tab="{{ $key }}" class="tab-btn px-4 py-2 text-sm font-medium border-b-2 border-transparent hover:border-shakarim-blue" type="button">{{ $label }}</button>
            @endforeach
        </div>
    </div>

    @foreach($levelTabs as $levelKey => $label)
        <div class="tab-panel hidden" id="panel-{{ $levelKey }}">
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
                                            <th class="px-3 py-2 w-64">{{ __('КОД И КЛАССИФИКАЦИЯ НАПРАВЛЕНИЙ ПОДГОТОВКИ') }}</th>
                                            <th class="px-3 py-2 w-28">{{ __('КОД ГРУППЫ ОП') }}</th>
                                            <th class="px-3 py-2 w-64">{{ __('НАЗВАНИЕ ГРУППЫ ОБРАЗОВАТЕЛЬНЫХ ПРОГРАММ') }}</th>
                                            <th class="px-3 py-2">{{ __('КОД И НАИМЕНОВАНИЕ ОБРАЗОВАТЕЛЬНОЙ ПРОГРАММЫ') }}</th>
                                            <th class="px-3 py-2 w-40">{{ __('СТАТУС АККРЕДИТАЦИИ') }}</th>
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
                                                            <div class="mt-1">{{ $classification[$classNameKey] }}</div>
                                                        </td>
                                                        <td class="px-3 py-2 align-top font-medium text-gray-700" rowspan="{{ count($group['programs']) }}">{{ $group['group_code'] }}</td>
                                                        <td class="px-3 py-2 align-top" rowspan="{{ count($group['programs']) }}">{{ $group[$groupNameKey] }}</td>
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
                                                            <a href="{{ $program['accreditation_pdf'] }}" target="_blank" rel="noopener noreferrer" class="inline-block text-xs px-2 py-1 rounded bg-green-100 text-green-700 hover:bg-green-200 transition">
                                                                <i class="fas fa-file-pdf mr-1"></i>{{ __('Аккредитована') }}
                                                            </a>
                                                        @else
                                                            <span class="text-gray-400">—</span>
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
        </div>
    @endforeach

    <script>
        (function(){
            const btns = document.querySelectorAll('.tab-btn');
            const panels = document.querySelectorAll('.tab-panel');
            function activate(key){
                panels.forEach(p=>p.classList.toggle('hidden', p.id !== 'panel-'+key));
                btns.forEach(b=>b.classList.toggle('border-shakarim-blue', b.dataset.tab === key));
            }
            const first = btns[0];
            if(first){ activate(first.dataset.tab); }
            btns.forEach(b=> b.addEventListener('click', ()=> activate(b.dataset.tab)));
        })();
    </script>
</div>

</x-layout>