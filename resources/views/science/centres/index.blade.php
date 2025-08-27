<x-layout :metaTitle="__('Научные центры')">
    <!-- Breadcrumbs and Section -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 28]) }}" class="hover:text-shakarim-blue">{{ __('Наука') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Научные центры')}}</span>
            </nav>
        </div>
    </section>
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-3xl md:text-4xl font-heading font-bold text-shakarim-blue mb-8">{{ __('Научные центры')}}</h1>
            
            <!-- Main Content -->
            <div class="main-content">
                <!-- Блоки с центрами -->
                <div class="space-y-6">
                    <!-- НИЦ «Абай и национальная духовность» -->
                    <div class="bg-gray-50 rounded-lg p-3 sm:p-6 border border-gray-200 hover:shadow-md transition-shadow min-h-[80px] sm:h-24 flex items-center">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between w-full gap-3 sm:gap-0">
                            <div class="flex-1">
                                <h3 class="text-base sm:text-xl font-semibold text-shakarim-blue leading-tight">{{ __('НИЦ «Абай и национальная духовность»')}}</h3>
                            </div>
                            <div class="sm:ml-6 flex-shrink-0">
                                <a href="{{ route('structure.show', ['locale' => app()->getLocale(), 'structure' => 'scientific-center-abai-and-national-spirituality']) }}">
                                	<button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-sm sm:text-base font-medium transition-colors w-full sm:w-auto">
                                    	{{ __('Перейти')}}
                                	</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- НЦ «Агротехнопарк» -->
                    <div class="bg-gray-50 rounded-lg p-3 sm:p-6 border border-gray-200 hover:shadow-md transition-shadow min-h-[80px] sm:h-24 flex items-center">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between w-full gap-3 sm:gap-0">
                            <div class="flex-1">
                                <h3 class="text-base sm:text-xl font-semibold text-shakarim-blue leading-tight">{{ __('НЦ «Агротехнопарк»')}}</h3>
                            </div>
                            <div class="sm:ml-6 flex-shrink-0">
                                <a href="{{ route('structure.show', ['locale' => app()->getLocale(), 'structure' => 'agrotechnopark']) }}">
                                	<button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-sm sm:text-base font-medium transition-colors w-full sm:w-auto">
                                    	{{ __('Перейти')}}
                                	</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- НЦ "Радиоэкологических исследований" -->
                    <div class="bg-gray-50 rounded-lg p-3 sm:p-6 border border-gray-200 hover:shadow-md transition-shadow min-h-[80px] sm:h-24 flex items-center">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between w-full gap-3 sm:gap-0">
                            <div class="flex-1">
                                <h3 class="text-base sm:text-xl font-semibold text-shakarim-blue leading-tight">{{ __('НЦ «Радиоэкологических исследований» (НЦРЭИ)')}}</h3>
                            </div>
                            <div class="sm:ml-6 flex-shrink-0">
                                <a href="{{ route('structure.show', ['locale' => app()->getLocale(), 'structure' => 'scientific-center-for-radioecological-research']) }}">
                                	<button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-sm sm:text-base font-medium transition-colors w-full sm:w-auto">
                                    	{{ __('Перейти')}}
                                	</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- НЦ Педагогических исследований -->
                    <div class="bg-gray-50 rounded-lg p-3 sm:p-6 border border-gray-200 hover:shadow-md transition-shadow min-h-[80px] sm:h-24 flex items-center">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between w-full gap-3 sm:gap-0">
                            <div class="flex-1">
                                <h3 class="text-base sm:text-xl font-semibold text-shakarim-blue leading-tight">{{ __('НЦ Педагогических исследований')}}</h3>
                            </div>
                            <div class="sm:ml-6 flex-shrink-0">
                                <a href="{{ route('structure.show', ['locale' => app()->getLocale(), 'structure' => 'scientific-center-for-pedagogical-research']) }}">
                                	<button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-sm sm:text-base font-medium transition-colors w-full sm:w-auto">
                                    	{{ __('Перейти')}}
                                	</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- НЦ Истории и археологии -->
                    <div class="bg-gray-50 rounded-lg p-3 sm:p-6 border border-gray-200 hover:shadow-md transition-shadow min-h-[80px] sm:h-24 flex items-center">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between w-full gap-3 sm:gap-0">
                            <div class="flex-1">
                                <h3 class="text-base sm:text-xl font-semibold text-shakarim-blue leading-tight">{{ __('НЦ Истории и археологии')}}</h3>
                            </div>
                            <div class="sm:ml-6 flex-shrink-0">
                                <a href="{{ route('structure.show', ['locale' => app()->getLocale(), 'structure' => 'scientific-center-history-and-archaeology']) }}">
                                	<button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-sm sm:text-base font-medium transition-colors w-full sm:w-auto">
                                    	{{ __('Перейти')}}
                                	</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="my-4">
                </div>
            </div>
        </div>
    </section>
</x-layout>