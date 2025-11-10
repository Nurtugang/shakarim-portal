<x-layout :metaTitle="__('Высшие/Исследовательские школы')">
    <!-- Breadcrumbs and Section -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ route('site.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Главная страница')}}</a>
                <span class="mx-1">&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 1]) }}" class="hover:text-shakarim-blue">{{ __('Образование') }}</a>
                <span class="mx-1">&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Высшие/Исследовательские школы')}}</span>
            </nav>
        </div>
    </section>
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-heading font-bold text-shakarim-blue mb-8 break-words">{{ __('Высшие/Исследовательские школы')}}</h1>
            
            <!-- Main Content -->
            <div class="main-content">
                <!-- Карточки школ -->
                <div class="space-y-6 md:space-y-8">
                    @foreach($schools as $school)
                    <!-- Карточка школы -->
                    <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                        <div class="p-4 md:p-6">
                            <div class="flex flex-col lg:flex-row lg:items-start space-y-6 lg:space-y-0 lg:space-x-6">
                                <!-- Логотип школы -->
                                <div class="flex-shrink-0 mx-auto lg:mx-0">
                                    <div class="w-48 h-48 bg-white rounded-lg flex items-center justify-center overflow-hidden">
                                        <img src="{{ Storage::url($school['logo']) }}" 
                                             alt="Логотип {{ $school['name'] }}" 
                                             class="max-w-full max-h-full object-contain"
                                             loading="lazy"
                                             decoding="async">
                                    </div>
                                </div>
                                
                                <!-- Основная информация -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between mb-6 space-y-4 lg:space-y-0">
                                        <h4 class="text-xl font-bold text-gray-800 leading-tight lg:flex-1 lg:pr-4">{{ $school['name'] }}</h4>
                                        <a href="{{ $school['url'] }}" target="_blank" class="lg:flex-shrink-0">
                                            <button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-6 py-3 rounded-lg font-medium transition-colors w-full lg:w-auto">
                                                {{ __('Перейти') }}
                                            </button>
                                        </a>
                                    </div>
                                    
                                    <!-- Контакты -->
                                    @if($school['email'] || $school['instagram'])
                                    <div class="mb-6">
                                        <div class="flex flex-col space-y-3">
                                            @if($school['email'])
                                            <div class="flex items-start text-sm text-gray-600">
                                                <a href="mailto:{{ $school['email'] }}">
                                                    <i class="fas fa-envelope mr-2 text-shakarim-blue w-4 mt-0.5 flex-shrink-0"></i>
                                                    <span class="break-all text-xs sm:text-sm">{{ $school['email'] }}</span>
                                                </a>
                                            </div>
                                            @endif
                                            @if($school['instagram'])
                                            <div class="flex items-center text-sm text-gray-600">
                                                <a href="https://www.instagram.com/{{ $school['instagram'] }}" target="_blank">
                                                    <i class="fab fa-instagram mr-2 text-shakarim-blue w-4 mt-0.5 flex-shrink-0"></i>
                                                    <span>{{ $school['instagram'] }}</span>
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    
                                    <!-- Статистика -->
                                    <div class="hidden md:grid md:grid-cols-4 gap-6">
                                        <div class="text-center">
                                            <div class="flex justify-center mb-2">
                                                <i class="fas fa-users text-2xl text-shakarim-blue"></i>
                                            </div>
                                            <div class="text-2xl font-bold text-shakarim-blue">{{ $school['students'] }}</div>
                                            <div class="text-sm text-gray-600">{{ __('Обучающихся') }}</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="flex justify-center mb-2">
                                                <i class="fas fa-chalkboard-teacher text-2xl text-shakarim-blue"></i>
                                            </div>
                                            <div class="text-2xl font-bold text-shakarim-blue">{{ $school['teachers'] }}</div>
                                            <div class="text-sm text-gray-600">{{ __('ППС') }}</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="flex justify-center mb-2">
                                                <i class="fas fa-graduation-cap text-2xl text-shakarim-blue"></i>
                                            </div>
                                            <div class="text-2xl font-bold text-shakarim-blue">{{ $school['programs'] }}</div>
                                            <div class="text-sm text-gray-600">{{ __('Образовательных программ') }}</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="flex justify-center mb-2">
                                                <i class="fas fa-building text-2xl text-shakarim-blue"></i>
                                            </div>
                                            <div class="text-2xl font-bold text-shakarim-blue">{{ $school['departments'] }}</div>
                                            <div class="text-sm text-gray-600">{{ __('Кафедр') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layout>