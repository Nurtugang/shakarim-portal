<x-layout :metaTitle="__('Научные журналы')">
    <!-- Breadcrumbs and Section -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 28]) }}" class="hover:text-shakarim-blue">{{ __('Наука') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Научные журналы')}}</span>
            </nav>
        </div>
    </section>
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-3xl md:text-4xl font-heading font-bold text-shakarim-blue mb-8">{{ __('Научные журналы')}}</h1>
            
            <!-- Main Content -->
            <div class="main-content">
                <!-- Блоки с центрами -->
                <div class="space-y-6">
                    <!-- Вестник Университета Шакарима. Серия технические науки -->
                    <div class="bg-gray-50 rounded-lg p-3 sm:p-6 border border-gray-200 hover:shadow-md transition-shadow min-h-[80px] sm:h-24 flex items-center">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between w-full gap-3 sm:gap-0">
                            <div class="flex-1">
                                <h3 class="text-base sm:text-xl font-semibold text-shakarim-blue leading-tight">{{ __('Вестник Университета Шакарима. Серия технические науки')}}</h3>
                            </div>
                            <div class="sm:ml-6 flex-shrink-0">
                                <a href="https://tech.vestnik.shakarim.kz/jour/index" target="_blank">
                                	<button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-sm sm:text-base font-medium transition-colors w-full sm:w-auto">
                                    	{{ __('Перейти')}}
                                	</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Вестник Университета Шакарима. Серия исторические науки -->
                    <div class="bg-gray-50 rounded-lg p-3 sm:p-6 border border-gray-200 hover:shadow-md transition-shadow min-h-[80px] sm:h-24 flex items-center">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between w-full gap-3 sm:gap-0">
                            <div class="flex-1">
                                <h3 class="text-base sm:text-xl font-semibold text-shakarim-blue leading-tight">{{ __('Shakarim Journal of History')}}</h3>
                            </div>
                            <div class="sm:ml-6 flex-shrink-0">
                                <a href="https://history.vestnik.shakarim.kz/index.php/my/index" target="_blank">
                                	<button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-sm sm:text-base font-medium transition-colors w-full sm:w-auto">
                                    	{{ __('Перейти')}}
                                	</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Вестник Университета Шакарима. Серия сельскохозяйственные и ветеринарные науки -->
                    <div class="bg-gray-50 rounded-lg p-3 sm:p-6 border border-gray-200 hover:shadow-md transition-shadow min-h-[80px] sm:h-24 flex items-center">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between w-full gap-3 sm:gap-0">
                            <div class="flex-1">
                                <h3 class="text-base sm:text-xl font-semibold text-shakarim-blue leading-tight">{{ __('Вестник Университета Шакарима. Серия сельскохозяйственные и ветеринарные науки')}}</h3>
                            </div>
                            <div class="sm:ml-6 flex-shrink-0">
                                <a href="https://via.vestnik.shakarim.kz/index.php/my" target="_blank">
                                	<button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-sm sm:text-base font-medium transition-colors w-full sm:w-auto">
                                    	{{ __('Перейти')}}
                                	</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Вестник Университета Шакарима. Серия филология -->
                    <div class="bg-gray-50 rounded-lg p-3 sm:p-6 border border-gray-200 hover:shadow-md transition-shadow min-h-[80px] sm:h-24 flex items-center">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between w-full gap-3 sm:gap-0">
                            <div class="flex-1">
                                <h3 class="text-base sm:text-xl font-semibold text-shakarim-blue leading-tight">{{ __('Вестник Университета Шакарима. Серия филология')}}</h3>
                            </div>
                            <div class="sm:ml-6 flex-shrink-0">
                                <a href="https://philological.vestnik.shakarim.kz/index.php/my/index" target="_blank">
                                	<button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-sm sm:text-base font-medium transition-colors w-full sm:w-auto">
                                    	{{ __('Перейти')}}
                                	</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Вестник Университета Шакарим. Серия экономические науки -->
                    <div class="bg-gray-50 rounded-lg p-3 sm:p-6 border border-gray-200 hover:shadow-md transition-shadow min-h-[80px] sm:h-24 flex items-center">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between w-full gap-3 sm:gap-0">
                            <div class="flex-1">
                                <h3 class="text-base sm:text-xl font-semibold text-shakarim-blue leading-tight">{{ __('Вестник Университета Шакарим. Серия экономические науки')}}</h3>
                            </div>
                            <div class="sm:ml-6 flex-shrink-0">
                                <a href="https://economics.shakarim.kz/index.php/my" target="_blank">
                                	<button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-sm sm:text-base font-medium transition-colors w-full sm:w-auto">
                                    	{{ __('Перейти')}}
                                	</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Shakarim Chemistry & Ecology -->
                    <div class="bg-gray-50 rounded-lg p-3 sm:p-6 border border-gray-200 hover:shadow-md transition-shadow min-h-[80px] sm:h-24 flex items-center">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between w-full gap-3 sm:gap-0">
                            <div class="flex-1">
                                <h3 class="text-base sm:text-xl font-semibold text-shakarim-blue leading-tight">{{ __('Shakarim Chemistry & Ecology')}}</h3>
                            </div>
                            <div class="sm:ml-6 flex-shrink-0">
                                <a href="https://chemistry-ecology.shakarim.kz/index.php/my/index" target="_blank">
                                	<button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-sm sm:text-base font-medium transition-colors w-full sm:w-auto">
                                    	{{ __('Перейти')}}
                                	</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Вестник университета Шакарима. Педагогические науки Научный журнал -->
                    <div class="bg-gray-50 rounded-lg p-3 sm:p-6 border border-gray-200 hover:shadow-md transition-shadow min-h-[80px] sm:h-24 flex items-center">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between w-full gap-3 sm:gap-0">
                            <div class="flex-1">
                                <h3 class="text-base sm:text-xl font-semibold text-shakarim-blue leading-tight">{{ __('Вестник университета Шакарима. Педагогические науки Научный журнал')}}</h3>
                            </div>
                            <div class="sm:ml-6 flex-shrink-0">
                                <a href="https://pedagogical.vestnik.shakarim.kz/" target="_blank">
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