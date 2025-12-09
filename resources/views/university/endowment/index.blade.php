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
                <!-- Endowment Image -->
                <div class="mb-6 flex justify-center">
                    @php
                        $locale = app()->getLocale();
                        $imagePath = match($locale) {
                            'kk' => 'storage/endowment/endowment_kk.webp',
                            'ru' => 'storage/endowment/endowment_ru.webp',
                            'en' => 'storage/endowment/endowment_en.webp',
                            'cn' => 'storage/endowment/endowment_en.webp',
                            default => 'storage/endowment/endowment_ru.webp'
                        };
                    @endphp
                    <img src="{{ asset($imagePath) }}" alt="{{ __('Endowment') }}" class="max-w-2xl w-full h-auto rounded-lg">
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">{{ __('Поддержите будущее образования') }}</h2>
                <p class="text-gray-600 text-center max-w-3xl mx-auto mb-8 leading-relaxed">
                    {{ __('Ваша поддержка поможет Шәкәрім Университету развиваться, предоставлять качественное образование студентам и внедрять инновационные проекты. Каждый вклад делает университет сильнее.') }}
                </p>

                <!-- Additional Information -->
                <div class="text-gray-700 mb-6">
                    <p class="mb-4 leading-relaxed">
                        <b>{{ __('Основной целью Фонда') }} </b>{{ __('является финансовая поддержка объектов благотворительности, предусмотренных благотворительной программой эндаумент-фонда (целевого капитала), посредством инвестирования денег и (или) иных активов эндаумент-фонда (целевого капитала) и последующего использования инвестиционного дохода.') }}
                    </p>
                    
                    <p class="font-semibold mb-3">{{ __('Фонд осуществляет следующие виды деятельности:') }}</p>
                    <ol class="space-y-2">
                        <li class="flex"><span class="font-semibold mr-2">1)</span><span>{{ __('владение, пользование и распоряжение эндаументами (целевыми вкладами);') }}</span></li>
                        <li class="flex"><span class="font-semibold mr-2">2)</span><span>{{ __('формирование и (или) пополнение эндаумент-фондов (целевых капиталов);') }}</span></li>
                        <li class="flex"><span class="font-semibold mr-2">3)</span><span>{{ __('управление активами эндаумент-фондов (целевых капиталов);') }}</span></li>
                        <li class="flex"><span class="font-semibold mr-2">4)</span><span>{{ __('инвестирование активов эндаумент-фондов (целевых капиталов);') }}</span></li>
                        <li class="flex"><span class="font-semibold mr-2">5)</span><span>{{ __('финансирование объектов благотворительности, предусмотренных благотворительной программой эндаумент-фонда (целевого капитала);') }}</span></li>
                        <li class="flex"><span class="font-semibold mr-2">6)</span><span>{{ __('взаимодействие с вкладчиками, учредителями, выгодополучателями и другими участниками;') }}</span></li>
                        <li class="flex"><span class="font-semibold mr-2">7)</span><span>{{ __('проведение инициатив, направленных на увеличение активов эндаумент-фондов (целевых капиталов), путем сбора денег и привлечения эндаументов (целевых вкладов);') }}</span></li>
                        <li class="flex"><span class="font-semibold mr-2">8)</span><span>{{ __('иную деятельность, предусмотренную законодательством Республики Казахстан и Уставом.') }}</span></li>
                    </ol>
                </div>

                <!-- Charter Download Button -->
                <div class="text-center mt-8">
                    @php
                        $charterPath = match(app()->getLocale()) {
                            'kk' => 'storage/endowment/endowment_kk.pdf',
                            'ru' => 'storage/endowment/endowment_ru.pdf',
                            default => 'storage/endowment/endowment_ru.pdf'
                        };
                    @endphp
                    <a href="{{ asset($charterPath) }}" target="_blank" class="inline-flex items-center px-6 py-3 bg-shakarim-blue text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors shadow-md">
                        <i class="fas fa-file-pdf mr-2"></i>
                        {{ __('Скачать Устав') }}
                    </a>
                </div>
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
                        <a href="mailto:endowment@shakarim.kz" class="text-shakarim-blue hover:underline">
                            endowment@shakarim.kz
                        </a>
                    </div>
                    <div class="flex items-center justify-center space-x-3">
                        <i class="fas fa-phone text-shakarim-blue"></i>
                        <a href="tel:++77051661754" class="text-shakarim-blue hover:underline">
                            +7 (705) 166-17-54
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>