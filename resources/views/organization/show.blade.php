<x-layout>
    @php
        // Определяем локализованные переменные для удобства
        $name = $organization->{'name_' . $locale};
        $dean = $organization->{'dean_' . $locale};
        $target = $organization->{'target_' . $locale};
    @endphp

    <x-slot name="title">{{ $name }}</x-slot>

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ route('site.index', $locale) }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                @if($organization->category_id == 1)
                    <a href="{{ route('organization.science', $locale) }}" class="hover:text-shakarim-blue">{{ __('Научные студенческие кружки') }}</a>
                @else
                    <a href="{{ route('organization.social', $locale) }}" class="hover:text-shakarim-blue">{{ __('Студентческие организации') }}</a>
                @endif
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold line-clamp-1" title="{{ $name }}">
                    {{ $name }}
                </span>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="bg-white py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
                
                <!-- Левая колонка: Изображение и описание -->
                <div class="lg:col-span-2">
                    <!-- Логотип организации -->
                    <div class="mb-6 rounded-lg overflow-hidden border border-gray-200 shadow-md">
                        @if($organization->hasImage())
                            <img src="{{ $organization->getImageUrl() }}" alt="{{ $name }}" class="w-full h-auto object-contain bg-gray-50" style="max-height: 500px;">
                        @else
                            <div class="h-64 bg-gradient-to-br from-shakarim-blue to-blue-600 flex items-center justify-center">
                                <i class="fas fa-university text-white text-6xl opacity-50"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Заголовок и описание -->
                    <div class="bg-gray-50 rounded-lg p-6 border">
                        <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-4">
                            {{ $name }}
                        </h1>
                        <div class="prose max-w-none text-gray-700">
                            {!! $target !!}
                        </div>
                    </div>
                </div>

                <!-- Правая колонка: Руководитель и контакты -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-lg border border-gray-200 p-6 sticky top-8">
                        <h2 class="text-xl font-bold text-gray-800 border-b pb-3 mb-4">{{ __('Информация') }}</h2>
                        
                        <!-- Блок руководителя -->
                        <div class="flex items-center space-x-4 mb-6">
                            @if($organization->hasDeanImage())
                                <div class="w-16 h-16 flex-shrink-0">
                                    <img src="{{ $organization->getDeanImageUrl() }}" alt="{{ $dean }}" class="w-full h-full rounded-full object-cover border-2 border-shakarim-blue shadow-sm">
                                </div>
                            @else
                                <div class="w-16 h-16 flex-shrink-0 rounded-full bg-gray-200 flex items-center justify-center" style="border-radius: 9999px;">
                                    <i class="fas fa-user text-gray-400 text-2xl"></i>
                                </div>
                            @endif
                            <div>
                                <p class="text-sm text-gray-500">{{ __('Руководитель') }}</p>
                                <p class="font-bold text-gray-900">{{ $dean }}</p>
                            </div>
                        </div>

                        <!-- Контактная информация -->
                        <div class="space-y-3">
                            @if($organization->phone)
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-phone text-shakarim-blue w-5 text-center mr-3"></i>
                                    <a href="tel:{{ $organization->phone }}" class="hover:text-shakarim-blue transition-colors">{{ $organization->phone }}</a>
                                </div>
                            @endif

                            @if($organization->insta)
                                <div class="flex items-center text-gray-700">
                                    <i class="fab fa-instagram text-shakarim-blue w-5 text-center mr-3"></i>
                                    <a href="https://www.instagram.com/{{ ltrim($organization->insta, '@') }}" target="_blank" rel="noopener noreferrer" class="hover:text-shakarim-blue transition-colors truncate">
                                        {{ $organization->insta }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-layout>