<x-layout>
    @section('meta_title', __('Курсы повышения квалификации и переподготовки') . ' - Shakarim University')

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Образование') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Курсы повышения квалификации и переподготовки') }}</span>
            </nav>
        </div>
    </section>

    <!-- Main Section -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Page Title -->
            <div class="mb-8 mt-2">
                <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">
                    {{ __('Курсы повышения квалификации и переподготовки') }}
                </h1>
                <p class="text-gray-600 mt-2">{{ __('Курсы повышения квалификации и переподготовки') }}</p>
            </div>

            <!-- Использование компонента Табов -->
           <x-tabs :tabs="[
                [
                    'id' => 'list', 
                    'label' => __('Список курсов'), // Этот таб статичный, берем перевод из файлов
                    'icon' => 'fas fa-list'
                ],
                [
                    'id' => 'retraining', 
                    // Берем заголовок из базы (на текущем языке). Если нет - запасной вариант.
                    'label' => $contents['retraining']?->title ?? __('Педагогическая переподготовка'), 
                    'icon' => 'fas fa-chalkboard-teacher'
                ],
                [
                    'id' => 'silver_university', 
                    'label' => $contents['silver_university']?->title ?? __('Серебряный университет'), 
                    'icon' => 'fas fa-user-graduate'
                ],
                [
                    'id' => 'qualification_courses', 
                    'label' => $contents['qualification_courses']?->title ?? __('Повышение квалификации'), 
                    'icon' => 'fas fa-certificate'
                ],
                [
                    'id' => 'certificates', 
                    'label' => __('Сертификаты'), 
                    'icon' => 'fas fa-file-contract'
                ],
            ]" />

            <!-- Tab 1: Список курсов (Таблица) -->
            <div id="content-list" class="tab-content">
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-shakarim-blue text-white">
                                    <th class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold w-16">#</th>
                                    <th class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold">{{ __('Наименование курса') }}</th>
                                    <th class="border border-gray-300 px-4 py-3 text-center text-sm font-semibold w-32">{{ __('Часы') }}</th>
                                    <th class="border border-gray-300 px-4 py-3 text-center text-sm font-semibold w-40">{{ __('Форма') }}</th>
                                    <th class="border border-gray-300 px-4 py-3 text-center text-sm font-semibold w-32"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($courses as $index => $course)
                                    <tr class="hover:bg-gray-50 transition-colors group cursor-pointer" onclick="window.location='{{ route('courses.show', ['course' => $course, 'locale' => app()->getLocale()]) }}'">
                                        <td class="border border-gray-300 px-4 py-3 text-center text-sm text-gray-500">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800">
                                            <!-- Название теперь ссылка -->
                                            <a href="{{ route('courses.show', ['course' => $course, 'locale' => app()->getLocale()]) }}" class="group-hover:text-shakarim-blue transition-colors">
                                                {{ $course->name }}
                                            </a>
                                            @if($course->text)
                                                <p class="text-xs text-gray-500 mt-1 font-normal line-clamp-2">
                                                    {{ Str::limit(strip_tags($course->text), 100) }}
                                                </p>
                                            @endif
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3 text-center text-sm text-gray-600">
                                            {{ $course->hours }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3 text-center text-sm">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $course->form }}
                                            </span>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3 text-center">
                                            <!-- Кнопка ведет на страницу просмотра -->
                                            <a href="{{ route('courses.show', ['course' => $course, 'locale' => app()->getLocale()]) }}" 
                                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-50 text-shakarim-blue hover:bg-shakarim-blue hover:text-white transition"
                                            title="{{ __('Подробнее') }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="border border-gray-300 px-4 py-8 text-center text-gray-500">
                                            {{ __('Курсы не найдены') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tab 2: Педагогическая переподготовка -->
            <div id="content-retraining" class="tab-content hidden">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    @if(isset($contents['retraining']) && $contents['retraining']->body)
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">{{ $contents['retraining']->title }}</h2>
                        
                        <div class="prose max-w-none tiptap-content">
                            {!! $contents['retraining']->body !!}
                        </div>
                    @else
                        <div class="text-center py-10 text-gray-500">
                            {{ __('Информация обновляется') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Tab 3: Серебряный университет -->
            <div id="content-silver_university" class="tab-content hidden">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    @if(isset($contents['silver_university']) && $contents['silver_university']->body)
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">{{ $contents['silver_university']->title }}</h2>
                        
                        <div class="prose max-w-none tiptap-content">
                            {!! $contents['silver_university']->body !!}
                        </div>
                    @else
                        <div class="text-center py-10 text-gray-500">
                            {{ __('Информация обновляется') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Tab 4: Курсы повышения квалификации -->
            <div id="content-qualification_courses" class="tab-content hidden">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    @if(isset($contents['qualification_courses']) && $contents['qualification_courses']->body)
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">{{ $contents['qualification_courses']->title }}</h2>
                        
                        <div class="prose max-w-none tiptap-content">
                            {!! $contents['qualification_courses']->body !!}
                        </div>
                    @else
                        <div class="text-center py-10 text-gray-500">
                            {{ __('Информация обновляется') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- NEW TAB CONTENT: Certificates -->
            <div id="content-certificates" class="tab-content hidden">
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">{{ __('Реестр выданных сертификатов') }}</h2>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-shakarim-blue text-white">
                                    <th class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold w-16">#</th>
                                    <th class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold">{{ __('Название курса / сертификата') }}</th>
                                    <th class="border border-gray-300 px-4 py-3 text-center text-sm font-semibold w-32">{{ __('Файл') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($certificates as $index => $cert)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="border border-gray-300 px-4 py-3 text-center text-sm text-gray-500">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3 text-sm font-medium text-gray-800">
                                            {{ $cert->title }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-3 text-center">
                                            @if($cert->filename)
                                                <a href="{{ $cert->getFileUrl() }}" 
                                                   target="_blank"
                                                   class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-red-600 hover:bg-red-200 transition"
                                                   title="{{ __('Скачать сертификат') }}">
                                                    <i class="fas fa-file-pdf"></i>
                                                </a>
                                            @else
                                                <span class="text-gray-300">—</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="border border-gray-300 px-4 py-8 text-center text-gray-500">
                                            {{ __('Сертификаты не найдены') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-layout>