{{-- resources/views/rector/post.blade.php --}}
<x-layout>
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2">
                <a href="{{ route('site.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('rector.blog', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Блог ректора') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ $post->{'title_'.app()->getLocale()} }}</span>
            </nav>
        </div>
    </section>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <article class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Заголовок и мета -->
            <div class="p-6 md:p-8">
                <div class="text-sm text-gray-500 mb-4">
                    <i class="fas fa-calendar mr-2"></i>
                    {{ $post->getFormattedDate() }}
                </div>
                
                <h1 class="text-2xl md:text-4xl font-bold text-gray-900 mb-6">
                    {{ $post->{'title_'.app()->getLocale()} }}
                </h1>

                <!-- Изображение -->
                @if($post->image)
                    <div class="mb-8">
                        <img src="{{ $post->getPhoto() }}" 
                             alt="{{ $post->{'title_'.app()->getLocale()} }}" 
                             class="w-full h-64 md:h-96 object-cover rounded-lg">
                    </div>
                @endif

                <!-- Контент -->
                <div class="prose prose-lg max-w-none tiptap-content">
                    {!! tiptap_converter()->asHTML($post->{'content_'.app()->getLocale()}) !!}
                </div>
            </div>
        </article>

        <!-- Навигация -->
        <div class="mt-8 flex justify-between items-center">
            <a href="{{ route('rector.blog', ['locale' => app()->getLocale()]) }}" 
               class="bg-gray-100 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-200 transition flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                {{ __('Назад к блогу') }}
            </a>

            <div class="flex space-x-2">
                <!-- Кнопки поделиться -->
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                target="_blank"
                class="bg-blue-600 text-white w-10 h-10 rounded-lg hover:bg-blue-700 transition flex items-center justify-center">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->{'title_'.app()->getLocale()}) }}" 
                target="_blank"
                class="bg-blue-500 text-white w-10 h-10 rounded-lg hover:bg-blue-600 transition flex items-center justify-center">
                    <i class="fab fa-telegram"></i>
                </a>
                <button onclick="copyToClipboard('{{ request()->fullUrl() }}')"
                        class="bg-gray-600 text-white w-10 h-10 rounded-lg hover:bg-gray-700 transition flex items-center justify-center">
                    <i class="fas fa-link"></i>
                </button>
            </div>
        </div>

        <!-- Другие посты -->
        @php
            $otherPosts = \App\Models\RectorPost::where('active', true)
                ->where('id', '!=', $post->id)
                ->latest()
                ->take(3)
                ->get();
        @endphp

        @if($otherPosts->count() > 0)
            <div class="mt-12">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">{{ __('Другие записи') }}</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($otherPosts as $otherPost)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                            <div class="h-40 overflow-hidden bg-gray-100">
                                <img src="{{ $otherPost->getPhoto() }}" 
                                     alt="{{ $otherPost->{'title_'.app()->getLocale()} }}" 
                                     class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <div class="text-xs text-gray-500 mb-2">{{ $otherPost->getFormattedDate() }}</div>
                                <h4 class="font-semibold mb-2 line-clamp-2">
                                    <a href="{{ route('rector.post', ['locale' => app()->getLocale(), 'post' => $otherPost->slug]) }}"
                                       class="hover:text-shakarim-blue">
                                        {{ $otherPost->{'title_'.app()->getLocale()} }}
                                    </a>
                                </h4>
                                <p class="text-sm text-gray-600 line-clamp-2">
                                    {{ \Illuminate\Support\Str::limit(strip_tags(tiptap_converter()->asHTML($otherPost->{'content_'.app()->getLocale()})), 100) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('{{ __("Ссылка скопирована!") }}');
            });
        }
    </script>
</x-layout>