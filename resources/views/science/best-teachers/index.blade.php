<x-layout :metaTitle="__('Обладатели звания «Лучший преподаватель вуза»')">

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 28]) }}" class="hover:text-shakarim-blue">{{ __('Наука') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Обладатели звания «Лучший преподаватель вуза»') }}</span>
            </nav>
        </div>
    </section>

    <!-- Best Teachers Section -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <!-- Заголовок страницы -->
                    <div class="mb-8 mt-2">
                        <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">
                            {{ __('Обладатели звания «Лучший преподаватель вуза»') }}
                        </h1>
                        <a href="{{ Storage::url('best-teachers-docs/Конкурсная комиссия.pdf') }}" 
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue hover:bg-shakarim-dark text-white rounded-lg transition text-sm"
                            style="color: white !important;">
                            <i class="fas fa-external-link-alt mr-2"></i>
                            {{ __('Протокол №1 конкурсной комиссии «Лучший преподаватель вуза – 2025') }}
                        </a>
                        <a href="{{ Storage::url('best-teachers-docs/Лучший преподаватель Вуза 2025 Выписка УС,_page-0001 (1).pdf') }}" 
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-4 inline-flex items-center px-4 py-2 bg-shakarim-blue hover:bg-shakarim-dark text-white rounded-lg transition text-sm"
                            style="color: white !important;">
                            <i class="fas fa-external-link-alt mr-2"></i>
                            {{ __('Выписка Ученого совета') }}
                        </a>
                        
                        <p class="text-gray-600 mt-2">{{ __('Преподаватели, удостоенные звания за выдающиеся достижения в образовательной деятельности') }}</p>
                    </div>

                    <!-- Ссылка на PDF -->
                    <div class="mb-6">
                        <a href="{{ asset('storage/documents/best-teacher-' . app()->getLocale() . '.pdf') }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-shakarim-dark transition-colors duration-200">
                            <i class="fas fa-file-pdf mr-2"></i>
                            {{ __('Скачать полный список') }}
                        </a>
                    </div>

                    <!-- Проверка на наличие данных -->
                    @if($bestTeachers->count() > 0)
                        <!-- Научные направления с преподавателями -->
                        <div class="space-y-4 mb-12">
                            @foreach($scienceDirections as $directionId => $direction)
                                @if(isset($bestTeachers[$directionId]))
                                    <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                                        <!-- Заголовок научного направления -->
                                        <button class="w-full px-6 py-4 bg-gray-50 hover:bg-gray-100 text-left font-medium text-shakarim-blue flex items-center justify-between transition-colors duration-200"
                                                type="button" 
                                                onclick="toggleCollapse('direction-{{ $directionId }}')">
                                            <span class="text-lg font-semibold">{{ $direction->name }}</span>
                                            <i class="fas fa-chevron-down transform transition-transform duration-200" id="icon-direction-{{ $directionId }}"></i>
                                        </button>

                                        <!-- Содержимое научного направления -->
                                        <div id="direction-{{ $directionId }}" class="hidden">
                                            <div class="p-6 space-y-6">
                                                @foreach($bestTeachers[$directionId] as $teacher)
                                                    <div class="flex flex-col md:flex-row items-center md:items-start gap-6 p-4 bg-gray-50 rounded-lg">
                                                        <!-- Фото преподавателя -->
                                                        <div class="flex-shrink-0">
                                                            @if($teacher->image_url)
                                                                <img src="{{ $teacher->image_url }}" 
                                                                     alt="{{ $teacher->fullname }}"
                                                                     class="w-32 h-40 object-cover rounded-lg shadow-md">
                                                            @else
                                                                <div class="w-32 h-40 bg-gray-300 rounded-lg flex items-center justify-center">
                                                                    <i class="fas fa-user text-gray-500 text-4xl"></i>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <!-- Информация о преподавателе -->
                                                        <div class="flex-grow text-center md:text-left">
                                                            <h3 class="text-xl font-semibold text-shakarim-blue mb-2">
                                                                {{ $teacher->fullname }}
                                                            </h3>
                                                            <p class="text-gray-600 mb-2">
                                                                {{ $teacher->position }}
                                                            </p>
                                                            <p class="text-sm text-gray-500">
                                                                <strong>{{ __('Дата получения:') }}</strong> {{ $teacher->year }} {{ __('год') }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    @if(!$loop->last)
                                                        <hr class="border-gray-200">
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <!-- Сообщение когда нет данных -->
                        <div class="text-center py-12">
                            <div class="max-w-md mx-auto">
                                <i class="fas fa-award text-6xl text-gray-300 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-600 mb-2">
                                    {{ __('Информация временно недоступна') }}
                                </h3>
                                <p class="text-gray-500 mb-6">
                                    {{ __('Данные о лучших преподавателях в настоящее время обновляются') }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="space-y-6">
                        <!-- Статистика -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                <i class="fas fa-chart-bar mr-2"></i>
                                {{ __('Статистика') }}
                            </h3>
                            <div class="space-y-3">
                                @if($bestTeachers->count() > 0)
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">{{ __('Всего преподавателей:') }}</span>
                                        <span class="font-semibold text-shakarim-blue">{{ $bestTeachers->flatten()->count() }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">{{ __('Научные направления') }}:</span>
                                        <span class="font-semibold text-shakarim-blue">{{ $scienceDirections->count() }}</span>
                                    </div>
                                    @php
                                        $years = $bestTeachers->flatten()->pluck('year')->unique()->sort();
                                        $latestYear = $years->last();
                                        $oldestYear = $years->first();
                                    @endphp
                                    @if($latestYear && $oldestYear)
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm text-gray-600">{{ __('Период:') }}</span>
                                            <span class="font-semibold text-shakarim-blue">{{ $oldestYear }} - {{ $latestYear }}</span>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <!-- Быстрая навигация -->
                        @if($scienceDirections->count() > 0)
                            <div class="bg-white rounded-xl shadow-md p-6">
                                <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                    <i class="fas fa-microscope mr-2"></i>
                                    {{ __('Научные направления') }}
                                </h3>
                                <div class="space-y-2">
                                    @foreach($scienceDirections as $direction)
                                        <button onclick="scrollToDirection('direction-{{ $direction->id }}')"
                                               class="flex items-center justify-between w-full p-2 rounded-lg hover:bg-gray-50 transition duration-200 text-left">
                                            <span class="text-sm font-medium text-gray-700">{{ $direction->name }}</span>
                                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">
                                                {{ $bestTeachers[$direction->id]->count() }}
                                            </span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@push('scripts')
<script>
function toggleCollapse(elementId) {
    const element = document.getElementById(elementId);
    const icon = document.getElementById('icon-' + elementId);
    
    document.querySelectorAll('[id^="direction-"]').forEach(el => {
        if (el.id !== elementId) {
            el.classList.add('hidden');
            document.getElementById('icon-' + el.id).classList.remove('rotate-180');
        }
    });
    
    if (element.classList.contains('hidden')) {
        element.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        element.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}

function scrollToDirection(directionId) {
    const element = document.getElementById(directionId);
    if (element) {
        if (element.classList.contains('hidden')) {
            toggleCollapse(directionId);
        }
        element.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}
</script>
@endpush

</x-layout>