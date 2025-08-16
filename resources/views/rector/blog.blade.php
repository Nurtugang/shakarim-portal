<x-layout>
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2">
                <a href="{{ route('site.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Блог ректора') }}</span>
            </nav>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="mb-8">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                <!-- Фото ректора -->
                <div class="flex-shrink-0">
                    <div class="w-64 h-64 md:w-64 md:h-64 rounded-full overflow-hidden border-4 border-shakarim-blue shadow-lg">
                        <img src="/img/rector.jpeg" alt="{{ __('Ректор университета') }}" class="w-full h-full object-cover">
                    </div>
                </div>
                
                <!-- Текст -->
                <div class="text-center md:text-left md:flex-1 md:self-center">
                    <h1 class="text-2xl md:text-4xl font-bold text-shakarim-blue mb-2">{{ __('Блог ректора') }}</h1>
                    <p class="text-gray-600 text-sm md:text-base">{{ __('Новости, мысли и ответы на вопросы от руководства университета') }}</p>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Мобильная форма вопроса (показывается только на мобилке) -->
            <div class="lg:hidden bg-white rounded-lg shadow-md p-4 mb-6">
                <h3 class="text-lg font-bold text-shakarim-blue mb-4">{{ __('Задать вопрос') }}</h3>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-3 py-2 rounded mb-4 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('rector.question.store') }}" method="POST" class="space-y-3">
                    @csrf
                    <input type="text" name="name" placeholder="{{ __('Имя') }} *" value="{{ old('name') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-shakarim-blue">
                    <input type="email" name="email" placeholder="{{ __('Email') }} *" value="{{ old('email') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-shakarim-blue">
                    <input type="text" name="phone" placeholder="{{ __('Телефон') }}" value="{{ old('phone') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-shakarim-blue">
                    <textarea name="question" rows="3" placeholder="{{ __('Ваш вопрос') }} *" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-shakarim-blue">{{ old('question') }}</textarea>
                    
                    <div class="flex justify-center">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display(['data-size' => 'compact']) !!}
                    </div>
                    
                    <button type="submit" class="w-full bg-shakarim-blue text-white py-2 px-4 rounded-md hover:bg-blue-700 transition text-sm">
                        {{ __('Отправить вопрос') }}
                    </button>
                </form>
            </div>

            <!-- Вопросы и ответы -->
            <div class="lg:col-span-2">
                <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">{{ __('Вопросы и ответы') }}</h2>
                
                @if($questions->count() > 0)
                    <div class="space-y-4">
                        @foreach($questions as $question)
                            <div class="bg-white rounded-lg shadow-md p-4 md:p-6">
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-3">
                                    <div class="font-semibold text-gray-800 text-sm md:text-base">{{ $question->name }}</div>
                                    <div class="text-xs md:text-sm text-gray-500 mt-1 sm:mt-0">{{ $question->getFormattedDate() }}</div>
                                </div>
                                
                                <div class="mb-3">
                                    <h3 class="font-semibold text-shakarim-blue mb-2 text-sm md:text-base">{{ __('Вопрос:') }}</h3>
                                    <p class="text-gray-700 text-sm md:text-base">{{ $question->question }}</p>
                                </div>
                                
                                @if($question->answer)
                                    <div class="bg-blue-50 p-3 md:p-4 rounded-lg border-l-4 border-shakarim-blue">
                                        <h4 class="font-semibold text-shakarim-blue mb-2 text-sm md:text-base">{{ __('Ответ ректора:') }}</h4>
                                        <p class="text-gray-700 text-sm md:text-base">{{ $question->answer }}</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="text-gray-500">{{ __('Пока нет вопросов') }}</p>
                    </div>
                @endif
            </div>

            <!-- Сайдбар -->
            <div class="space-y-6">
                <!-- Последние записи -->
                <div class="bg-white rounded-lg shadow-md p-4 md:p-6">
                    <h3 class="text-lg md:text-xl font-bold text-shakarim-blue mb-4">{{ __('Последние записи') }}</h3>
                    
                    @if($posts->count() > 0)
                        <div class="space-y-4">
                            @foreach($posts->take(5) as $post)
                                <div class="flex gap-3 pb-4 border-b border-gray-200 last:border-b-0 last:pb-0">
                                    <!-- Картинка поста -->
                                    <div class="flex-shrink-0">
                                        <img src="{{ $post->getPhoto() }}" 
                                            alt="{{ $post->{'title_'.app()->getLocale()} }}" 
                                            class="w-16 h-16 md:w-20 md:h-20 rounded-lg object-cover">
                                    </div>
                                    
                                    <!-- Контент -->
                                    <div class="flex-1 min-w-0">
                                        <div class="text-xs text-gray-500 mb-1">{{ $post->getFormattedDate() }}</div>
                                        <h4 class="font-semibold hover:text-shakarim-blue text-sm md:text-base leading-tight">
                                            <a href="{{ route('rector.post', ['locale' => app()->getLocale(), 'post' => $post->slug]) }}"
                                            class="line-clamp-2">
                                                {{ $post->{'title_'.app()->getLocale()} }}
                                            </a>
                                        </h4>
                                        <p class="text-xs md:text-sm text-gray-600 mt-1 line-clamp-2">
                                            {{ \Illuminate\Support\Str::limit(strip_tags(tiptap_converter()->asHTML($post->{'content_'.app()->getLocale()})), 60) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">{{ __('Пока нет записей') }}</p>
                    @endif
                </div>

                <!-- Форма вопроса (только на десктопе) -->
                <div class="hidden lg:block bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-shakarim-blue mb-6">{{ __('Задать вопрос') }}</h3>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('rector.question.store') }}" method="POST">
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
                                <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Ваш вопрос') }} *</label>
                                <textarea name="question" rows="4" required
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-shakarim-blue">{{ old('question') }}</textarea>
                                @error('question')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                @error('g-recaptcha-response')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" 
                                    class="w-full bg-shakarim-blue text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                                {{ __('Отправить вопрос') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>