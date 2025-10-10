<x-layout>
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Endowment') }}</span>
            </nav>
        </div>
    </section>

    <!-- Endowment Section -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Page Title -->
            <div class="mb-8 mt-2">
                <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">
                    {{ __('Endowment') }}
                </h1>
                <p class="text-gray-600 mt-2">{{ __('Make a contribution to the development of the university') }}</p>
            </div>
            <!-- Introduction -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">{{ __('Поддержите будущее образования') }}</h2>
                <p class="text-gray-600 text-center max-w-3xl mx-auto mb-8 leading-relaxed">
                    {{ __('Ваша поддержка поможет Шәкәрім Университету развиваться, предоставлять качественное образование студентам и внедрять инновационные проекты. Каждый вклад делает университет сильнее.') }}
                </p>
            </div>

            <!-- Donation Areas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="text-center">
                        <i class="fas fa-graduation-cap text-3xl text-shakarim-blue mb-4"></i>
                        <h3 class="font-semibold text-lg mb-3 text-gray-800">{{ __('Стипендиальный фонд') }}</h3>
                        <p class="text-gray-600 text-sm">{{ __('Поддержка талантливых студентов с ограниченными финансовыми возможностями') }}</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="text-center">
                        <i class="fas fa-microscope text-3xl text-shakarim-blue mb-4"></i>
                        <h3 class="font-semibold text-lg mb-3 text-gray-800">{{ __('Научные исследования') }}</h3>
                        <p class="text-gray-600 text-sm">{{ __('Финансирование научных проектов и исследовательских программ') }}</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="text-center">
                        <i class="fas fa-building text-3xl text-shakarim-blue mb-4"></i>
                        <h3 class="font-semibold text-lg mb-3 text-gray-800">{{ __('Инфраструктура') }}</h3>
                        <p class="text-gray-600 text-sm">{{ __('Модернизация лабораторий, аудиторий и учебных пространств') }}</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="text-center">
                        <i class="fas fa-globe text-3xl text-shakarim-blue mb-4"></i>
                        <h3 class="font-semibold text-lg mb-3 text-gray-800">{{ __('Международные программы') }}</h3>
                        <p class="text-gray-600 text-sm">{{ __('Студенческие обмены, стажировки и партнерские проекты') }}</p>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Свяжитесь с нами') }}</h2>
                <p class="text-gray-600 mb-6">{{ __('Для получения подробной информации о возможностях поддержки университета:') }}</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-2xl mx-auto">
                    <div class="flex items-center justify-center space-x-3">
                        <i class="fas fa-envelope text-shakarim-blue"></i>
                        <a href="mailto:kense@shakarim.kz" class="text-shakarim-blue hover:underline">
                            kense@shakarim.kz
                        </a>
                    </div>
                    <div class="flex items-center justify-center space-x-3">
                        <i class="fas fa-phone text-shakarim-blue"></i>
                        <a href="tel:+77222313175" class="text-shakarim-blue hover:underline">
                            +7 (7222) 31-31-75
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>