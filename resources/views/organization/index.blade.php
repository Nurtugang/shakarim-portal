<x-layout>
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                @if(request()->is('*/organization/science'))
                    <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 28]) }}" class="hover:text-shakarim-blue">{{ __('Наука') }}</a>
                @else
                    <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 95]) }}" class="hover:text-shakarim-blue">{{ __('Campus Life') }}</a>
                @endif
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">
                    {{ request()->is('*/organization/science') ? __('Научные студенческие кружки') : __('Студенческие организации') }}
                </span>
            </nav>
        </div>
    </section>

    <!-- Organizations Grid -->
    <section class="bg-white py-6 md:py-12">
        <div class="max-w-7xl mx-auto px-4">
            {{-- ЗАГОЛОВОК СТРАНИЦЫ --}}
            <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-6 md:mb-8">
                {{ request()->is('*/organization/science') ? __('Научные студенческие кружки') : __('Студенческие организации') }}
            </h1>

            {{-- ИНФОРМАЦИЯ, КОТОРАЯ ОТОБРАЖАЕТСЯ ТОЛЬКО НА СТРАНИЦЕ 'science' --}}
            @if(request()->is('*/organization/science'))
                <div class="prose max-w-none mb-8 md:mb-10">
                    <p>{{ __('В Университете успешно функционируют 37 студенческих научных кружков, объединяющих активных, творческих и инициативных студентов, стремящихся к профессиональному и личностному развитию. Кружки представляют собой не просто форму внеучебной активности, а полноценную научно-образовательную среду, где теория соединяется с практикой, а учебные знания находят своё реальное применение.') }}</p>
                    <p>{{ __('Каждый СНК - пространство для поиска, экспериментов и самореализации: здесь студенты проводят исследования, создают собственные проекты, участвуют в конкурсах, конференциях и хакатонах, обмениваются идеями и развивают навыки командной работы. Деятельность СНК способствует формированию профессиональных компетенций, развитию научного мышления и подготовке будущих специалистов, готовых к вызовам современной экономики, технологий и культуры.') }}</p>
                </div>
            @endif

            @if($organizations->isEmpty())
                <div class="text-center py-12">
                    <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">{{ __('Организации не найдены') }}</p>
                </div>
            @else
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                    @foreach($organizations as $org)
                        <a href="{{ route('organization.show', ['locale' => $locale, 'organization' => $org->id]) }}" class="block bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-200 group">
                            <!-- Organization Image -->
                            @if($org->hasImage())
                                <div class="h-36 md:h-48 overflow-hidden bg-gray-100">
                                    <img src="{{ $org->getImageUrl() }}" 
                                        alt="{{ $org->{'name_' . $locale} }}"
                                        class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                                </div>
                            @else
                                <div class="h-36 md:h-48 bg-gradient-to-br from-shakarim-blue to-blue-600 flex items-center justify-center">
                                    <i class="fas fa-university text-white text-4xl md:text-6xl opacity-50"></i>
                                </div>
                            @endif

                            <div class="p-4 md:p-6">
                                <!-- Organization Name -->
                                <h3 class="text-base md:text-xl font-bold text-shakarim-blue mb-2 md:mb-3 line-clamp-2">
                                    {{ $org->{'name_' . $locale} }}
                                </h3>

                                <!-- Dean Info -->
                                <div class="mb-3 md:mb-4 pb-3 md:pb-4 border-b border-gray-200">
                                    <div class="flex items-start space-x-2 md:space-x-3">
                                        @if($org->hasDeanImage())
                                            <div class="w-12 h-12 md:w-16 md:h-16 flex-shrink-0 overflow-hidden rounded-full border-2 border-shakarim-blue">
                                                <img src="{{ $org->getDeanImageUrl() }}" 
                                                    alt="{{ $org->{'dean_' . $locale} }}"
                                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                            </div>
                                        @else
                                            <div class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-gray-200 flex items-center justify-center flex-shrink-0">
                                                <i class="fas fa-user text-gray-400 text-lg md:text-2xl"></i>
                                            </div>
                                        @endif
                                        <div class="flex-1 min-w-0">
                                            <p class="text-xs text-gray-500 mb-1">{{ __('Руководитель') }}</p>
                                            <p class="text-xs md:text-sm font-semibold text-gray-800 line-clamp-2">
                                                {{ $org->{'dean_' . $locale} }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Target/Description -->
                                <div class="mb-3 md:mb-4">
                                    <div class="text-xs md:text-sm text-gray-600 line-clamp-3">
                                        {!! strip_tags($org->{'target_' . $locale}, '<p><br><strong><em><b><i>') !!}
                                    </div>
                                </div>

                                <!-- Contact Info -->
                                <div class="space-y-1.5 md:space-y-2">
                                    @if($org->phone)
                                        <div class="flex items-center text-xs md:text-sm text-gray-700">
                                            <i class="fas fa-phone text-shakarim-blue mr-2 w-3 md:w-4 text-xs"></i>
                                            <span class="truncate">{{ $org->phone }}</span>
                                        </div>
                                    @endif

                                    @if($org->insta)
                                        <div class="flex items-center text-xs md:text-sm text-gray-700">
                                            <i class="fab fa-instagram text-shakarim-blue mr-2 w-3 md:w-4 text-xs"></i>
                                            <span class="truncate">{{ $org->insta }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-layout>
