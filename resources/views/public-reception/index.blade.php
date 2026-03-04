<x-layout>
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2">
                <a href="{{ route('site.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Общественный прием') }}</span>
            </nav>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-2xl md:text-4xl font-bold text-shakarim-blue mb-4">{{ __('Общественный прием') }}</h1>
            <p class="text-gray-600 text-sm md:text-base">{{ __('Здесь вы можете оставить свое обращение и получить ответ от администрации университета') }}</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Мобильная форма обращения -->
            <div class="lg:hidden bg-white rounded-lg shadow-md p-4 mb-6">
                <h3 class="text-lg font-bold text-shakarim-blue mb-4">{{ __('Оставить обращение') }}</h3>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-3 py-2 rounded mb-4 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('public-reception.store') }}" method="POST" class="space-y-3">
                    @csrf
                    <input type="text" name="name" placeholder="{{ __('Имя') }} *" value="{{ old('name') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-shakarim-blue">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    
                    <input type="email" name="email" placeholder="{{ __('Email') }} *" value="{{ old('email') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-shakarim-blue">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    
                    <input type="text" name="phone" placeholder="{{ __('Телефон') }}" value="{{ old('phone') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-shakarim-blue">
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    
                    <textarea name="message" rows="4" placeholder="{{ __('Ваше обращение') }} *" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-shakarim-blue">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    
                    <div class="flex">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display(['data-size' => 'normal']) !!}
                    </div>
                    @error('g-recaptcha-response')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    
                    <button type="submit" class="w-full bg-shakarim-blue text-white py-2 px-4 rounded-md hover:bg-blue-700 transition text-sm">
                        {{ __('Отправить обращение') }}
                    </button>
                </form>
            </div>

            <!-- Обращения и ответы (Основная колонка) -->
            <div class="lg:col-span-2">
                <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">{{ __('Обращения и ответы') }}</h2>
                
                @if($receptions->count() > 0)
                    <div class="space-y-4">
                        @foreach($receptions as $reception)
                            <div class="bg-white rounded-lg shadow-md p-4 md:p-6">
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-3">
                                    <div class="font-semibold text-gray-800 text-sm md:text-base">{{ $reception->name }}</div>
                                    <div class="text-xs md:text-sm text-gray-500 mt-1 sm:mt-0">{{ $reception->getFormattedDate() }}</div>
                                </div>
                                
                                <div class="mb-3">
                                    <h3 class="font-semibold text-shakarim-blue mb-2 text-sm md:text-base">{{ __('Обращение:') }}</h3>
                                    <p class="text-gray-700 text-sm md:text-base">{{ $reception->message }}</p>
                                </div>
                                
                                @if($reception->response)
                                    <div class="bg-blue-50 p-3 md:p-4 rounded-lg border-l-4 border-shakarim-blue">
                                        <h4 class="font-semibold text-shakarim-blue mb-2 text-sm md:text-base">{{ __('Ответ:') }}</h4>
                                        <p class="text-gray-700 text-sm md:text-base">{{ $reception->response }}</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <!-- Пагинация -->
                    <div class="mt-8">
                        {{ $receptions->withQueryString()->links() }}
                    </div>

                @else
                    <div class="text-center py-8">
                        <p class="text-gray-500">{{ __('Пока нет обращений') }}</p>
                    </div>
                @endif
            </div>

            <!-- Сайдбар с формой (Десктоп) -->
            <div class="space-y-6">
                <div class="hidden lg:block bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-shakarim-blue mb-6">{{ __('Оставить обращение') }}</h3>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('public-reception.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Имя') }} *</label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-shakarim-blue">
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Email') }} *</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-shakarim-blue">
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Телефон') }}</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-shakarim-blue">
                                @error('phone')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Ваше обращение') }} *</label>
                                <textarea name="message" rows="5" required
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-shakarim-blue">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display(['data-size' => 'normal']) !!}
                                @error('g-recaptcha-response')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" 
                                    class="w-full bg-shakarim-blue text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                                {{ __('Отправить обращение') }}
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Информационный блок -->
                <div class="hidden lg:block bg-blue-50 rounded-lg shadow-md p-6 border-l-4 border-shakarim-blue">
                    <h3 class="text-lg font-bold text-shakarim-blue mb-3">{{ __('Информация') }}</h3>
                    <div class="text-sm text-gray-700 space-y-2">
                        <p>{{ __('Общественный прием создан для прямого диалога с администрацией университета.') }}</p>
                        <p>{{ __('Все обращения рассматриваются в установленные законом сроки.') }}</p>
                        <p class="font-semibold text-shakarim-blue">{{ __('Ваше мнение важно для нас!') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
