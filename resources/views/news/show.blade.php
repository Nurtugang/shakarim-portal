<x-layout>
    <link rel="stylesheet" href="{{ asset('css/custom/dynamic-content.css') }}">
    
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница')}}</a>
                <span>&#8250;</span>
                <a href="{{ route('news', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Жаңалықтар')}}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">
                    {{ \Illuminate\Support\Str::limit(strip_tags($news->{'title_' . app()->getLocale()}), 40) }}
                </span>
            </nav>
        </div>
    </section>

    <!-- News Content -->
    <section class="bg-white py-4 md:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-8">
                <!-- Main News Article -->
                <div class="lg:col-span-2">
                    <article class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <!-- Article Header -->
                        <div class="p-3 md:p-6 border-b border-gray-100">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 space-y-3 md:space-y-0">
                                <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-3">
                                    <span class="bg-shakarim-blue text-white px-2 md:px-3 py-1 rounded-full text-xs font-medium w-fit">
                                        <i class="fas fa-newspaper mr-1"></i>{{ $news->category->{'label_' . app()->getLocale()} }}
                                    </span>
                                    <span class="text-gray-500 text-sm">
                                        <i class="far fa-calendar mr-1"></i>{{ \Carbon\Carbon::createFromTimestamp($news->date)->locale(app()->getLocale())->isoFormat('D MMMM, YYYY') }}
                                    </span>
                                </div>
                                <div class="text-left md:text-right">
                                    <span class="text-gray-600 text-sm font-medium">От:</span>
                                    <span class="text-shakarim-blue font-semibold ml-1">{{ __('Медиа-центр')}}</span>
                                </div>
                            </div>
                            <h1 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-heading font-bold text-shakarim-blue leading-tight">
                                {{ $news->{'title_' . app()->getLocale()} }}
                            </h1>
                        </div>
                        <!-- News Image -->
                        @if($news->image)
                            <div class="p-3 md:p-6">
                                <img src="{{ Storage::url('news/' . $news->image) }}" 
                                    alt="{{ $news->{'title_' . app()->getLocale()} }}" 
                                    class="w-full h-auto max-w-full mx-auto rounded-lg shadow-lg">
                            </div>
                        @endif
                        <!-- Article Content -->
                        <div class="p-3 md:p-6 dynamic-content">
                            {!! $news->{'content_' . app()->getLocale()} !!}
                        </div>

                        <!-- Article Footer -->
                        <div class="p-3 md:p-6 bg-gray-50 border-t border-gray-100">
                            <div class="flex flex-col space-y-3 md:flex-row md:items-center md:justify-between md:space-y-0">
                                @if($news->tags->count() > 0)
                                    <div class="flex flex-wrap items-center gap-1.5 md:gap-2">
                                        @foreach($news->tags as $tag)
                                        <a href="{{ route('news', ['locale' => app()->getLocale(), 'tag' => $tag->id]) }}" 
                                        class="px-2 md:px-3 py-1 bg-blue-100 text-blue-800 hover:bg-blue-200 rounded-full text-xs font-medium transition duration-200">
                                            {{ $tag->name }}
                                        </a>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="flex justify-center md:justify-end">
                                    <div class="relative">
                                        <button onclick="toggleShareMenu()" class="w-full md:w-auto px-3 md:px-4 py-2 bg-shakarim-blue text-white rounded-lg hover:bg-shakarim-dark transition duration-200 text-sm flex items-center justify-center">
                                            <i class="fas fa-share mr-1"></i>{{ __('Поделиться')}}
                                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                                        </button>
                                        
                                        <!-- Share Dropdown Menu -->
                                        <div id="share-menu" class="fixed w-auto bg-white rounded-lg shadow-xl border border-gray-200 hidden z-[9999]">                                   
                                            <div class="p-3">
                                                <div class="flex space-x-2">
                                                    <a href="#" onclick="shareToSocial('facebook')" class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-700 transition duration-150 group" title="Facebook">
                                                        <i class="fab fa-facebook-f text-white text-lg"></i>
                                                    </a>
                                                    <a href="#" onclick="shareToSocial('telegram')" class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center hover:bg-blue-600 transition duration-150 group" title="Telegram">
                                                        <i class="fab fa-telegram-plane text-white text-lg"></i>
                                                    </a>
                                                    <a href="#" onclick="shareToSocial('whatsapp')" class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center hover:bg-green-600 transition duration-150 group" title="WhatsApp">
                                                        <i class="fab fa-whatsapp text-white text-lg"></i>
                                                    </a>
                                                    <a href="#" onclick="shareToSocial('twitter')" class="w-10 h-10 bg-black rounded-lg flex items-center justify-center hover:bg-gray-800 transition duration-150 group" title="Twitter/X">
                                                        <i class="fab fa-twitter text-white text-lg"></i>
                                                    </a>
                                                    <a href="#" onclick="shareToSocial('vk')" class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center hover:bg-blue-600 transition duration-150 group" title="VKontakte">
                                                        <i class="fab fa-vk text-white text-lg"></i>
                                                    </a>
                                                    <a href="#" onclick="shareToSocial('copy')" class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center hover:bg-gray-700 transition duration-150 group" title="Скопировать ссылку">
                                                        <i class="fas fa-link text-white text-lg"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!-- Comments Section -->
                    <div class="mt-6">
                        <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
                            <h3 class="text-lg md:text-xl font-bold text-shakarim-blue mb-4 flex items-center">
                                <i class="fas fa-comments mr-2"></i>
                                {{ __('Комментарии') }} ({{ $comments->count() }})
                            </h3>

                            <!-- Comments List -->
                            @if($comments->count() > 0)
                                <div class="space-y-4 mb-6">
                                    @foreach($comments as $comment)
                                        <div class="bg-gray-50 rounded-lg p-4 border-l-4 border-shakarim-blue">
                                            <div class="flex justify-between items-start mb-2">
                                                <div class="font-semibold text-gray-800">{{ $comment->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $comment->getFormattedDate() }}</div>
                                            </div>
                                            <p class="text-gray-700 text-sm md:text-base">{{ $comment->comment }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Comment Form -->
                            <div class="border-t pt-6">
                                <h4 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Оставить комментарий') }}</h4>
                                
                                @if(session('success'))
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form action="{{ route('news.comment.store', ['locale' => app()->getLocale(), 'news' => $news]) }}" method="POST">
                                    @csrf
                                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Имя') }} *</label>
                                            <input type="text" name="name" value="{{ old('name') }}" required
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-shakarim-blue text-sm">
                                            @error('name')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Email') }} *</label>
                                            <input type="email" name="email" value="{{ old('email') }}" required
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-shakarim-blue text-sm">
                                            @error('email')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Комментарий') }} *</label>
                                        <textarea name="comment" rows="4" required
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-shakarim-blue text-sm">{{ old('comment') }}</textarea>
                                        @error('comment')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-4 flex justify-center">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display(['data-size' => 'compact']) !!}
                                        @error('g-recaptcha-response')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button type="submit" 
                                            class="bg-shakarim-blue text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition text-sm">
                                        {{ __('Отправить комментарий') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar - Latest News -->
                <div class="lg:col-span-1 order-last lg:order-last">
                    <div class="bg-white rounded-xl shadow-lg p-3 md:p-6 lg:sticky lg:top-24">
                        <h2 class="text-base md:text-lg lg:text-xl font-heading font-bold text-shakarim-blue mb-3 md:mb-6 flex items-center">
                            <i class="fas fa-rss mr-2 text-orange-500"></i>
                            {{ __('Лента новостей')}}
                        </h2>

                        <!-- Latest News List -->
                        <div class="space-y-2 md:space-y-4 mb-3 md:mb-6">
                            @foreach($latestNews as $latestItem)
                                <div class="border-b border-gray-100 pb-2 md:pb-4">
                                    <div class="flex items-start space-x-2 md:space-x-3">
                                        <div class="w-2 h-2 bg-shakarim-blue rounded-full mt-2 flex-shrink-0"></div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xs md:text-sm font-medium text-gray-900 hover:text-shakarim-blue cursor-pointer line-clamp-2">
                                                <a href="{{ route('news.show', ['locale' => app()->getLocale(), 'news' => $latestItem]) }}">
                                                    {{ $latestItem->{'title_' . app()->getLocale()} }}
                                                </a>
                                            </h3>
                                            <p class="text-xs text-gray-500 mt-1">{{ \Carbon\Carbon::createFromTimestamp($latestItem->date)->locale(app()->getLocale())->isoFormat('D MMMM, YYYY') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if($latestNews->count() == 0)
                                <div class="text-center text-gray-500 py-4">
                                    <p class="text-sm">{{ __('Нет других новостей')}}</p>
                                </div>
                            @endif
                            
                        </div>

                        <!-- All News Button -->
                        <div class="text-center">
                            <a href="{{ route('news', ['locale' => app()->getLocale()]) }}" class="inline-flex items-center w-full md:w-auto px-3 md:px-6 py-2 md:py-3 bg-gradient-to-r from-shakarim-blue to-shakarim-light text-white font-medium rounded-lg hover:from-shakarim-dark hover:to-shakarim-blue transition duration-200 shadow-lg hover:shadow-xl text-sm md:text-base">
                                <span>{{ __('Другие новости')}}</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tags Section -->
            <div class="mt-6 md:mt-12">
                <div class="bg-white rounded-xl shadow-lg p-3 md:p-6">
                    <h3 class="text-base md:text-lg font-heading font-semibold text-shakarim-blue mb-3 md:mb-4 flex items-center">
                        <i class="fas fa-tags mr-2 text-gray-500"></i>
                        {{ __('Популярные теги')}}
                    </h3>
                    <div class="flex flex-wrap gap-1.5 md:gap-3">
                        @foreach($popularTags as $loop => $tag)
                            @php
                            $colorClasses = [
                                'bg-blue-100 text-blue-800 hover:bg-blue-200',
                                'bg-green-100 text-green-800 hover:bg-green-200', 
                                'bg-purple-100 text-purple-800 hover:bg-purple-200',
                                'bg-pink-100 text-pink-800 hover:bg-pink-200',
                                'bg-indigo-100 text-indigo-800 hover:bg-indigo-200',
                                'bg-yellow-100 text-yellow-800 hover:bg-yellow-200',
                                'bg-red-100 text-red-800 hover:bg-red-200',
                                'bg-orange-100 text-orange-800 hover:bg-orange-200'
                            ][$loop->index % 8];
                            @endphp
                            
                            <a href="{{ route('news', ['locale' => app()->getLocale(), 'tag' => $tag->id]) }}" 
                            class="px-2 md:px-4 py-1 md:py-2 {{ $colorClasses }} rounded-full text-xs md:text-sm font-medium transition duration-200 hover:scale-105"
                            title="Показать все новости с тегом {{ $tag->name }}">
                                {{ $tag->name }} ({{ $tag->news_count }})
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        function toggleShareMenu() {
            const shareMenu = document.getElementById('share-menu');
            const shareButton = document.querySelector('button[onclick="toggleShareMenu()"]');
            
            if (shareMenu.classList.contains('hidden')) {
                const buttonRect = shareButton.getBoundingClientRect();
                
                if (window.innerWidth < 768) {
                    shareMenu.style.top = (buttonRect.bottom + 8) + 'px';
                    shareMenu.style.left = '50%';
                    shareMenu.style.transform = 'translateX(-50%)';
                    shareMenu.style.right = 'auto';
                } else {
                    shareMenu.style.top = (buttonRect.bottom + 8) + 'px';
                    shareMenu.style.right = (window.innerWidth - buttonRect.right) + 'px';
                    shareMenu.style.left = 'auto';
                    shareMenu.style.transform = 'none';
                }
                
                shareMenu.classList.remove('hidden');
            } else {
                shareMenu.classList.add('hidden');
            }
        }

        document.addEventListener('click', function(event) {
            const shareMenu = document.getElementById('share-menu');
            const shareButton = event.target.closest('button[onclick="toggleShareMenu()"]');
            
            if (!shareButton && !shareMenu.contains(event.target)) {
                shareMenu.classList.add('hidden');
            }
        });

        document.addEventListener('scroll', function() {
            const shareMenu = document.getElementById('share-menu');
            if (!shareMenu.classList.contains('hidden')) {
                shareMenu.classList.add('hidden');
            }
        });

        function shareToSocial(platform) {
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(document.title);
            const newsTitle = encodeURIComponent('{{ $news->{"title_" . app()->getLocale()} }}');
            
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = `{!! strip_tags($news->{'content_' . app()->getLocale()}) !!}`;
            const description = encodeURIComponent(tempDiv.textContent.substring(0, 100) + '...');
            
            let shareUrl = '';
            
            switch(platform) {
                case 'facebook':
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${newsTitle}`;
                    break;
                case 'telegram':
                    shareUrl = `https://t.me/share/url?url=${url}&text=${newsTitle}`;
                    break;
                case 'whatsapp':
                    shareUrl = `https://wa.me/?text=${newsTitle}%20${url}`;
                    break;
                case 'twitter':
                    shareUrl = `https://twitter.com/intent/tweet?text=${newsTitle}&url=${url}`;
                    break;
                case 'vk':
                    shareUrl = `https://vk.com/share.php?url=${url}&title=${newsTitle}&description=${description}`;
                    break;
                case 'copy':
                    copyToClipboard();
                    return;
            }
            
            if (shareUrl) {
                window.open(shareUrl, '_blank', 'width=600,height=400,scrollbars=yes,resizable=yes');
                document.getElementById('share-menu').classList.add('hidden');
            }
        }

        function copyToClipboard() {
            const url = window.location.href;
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(url).then(() => {
                    showCopyNotification('Ссылка скопирована!');
                }).catch(() => {
                    fallbackCopy(url);
                });
            } else {
                fallbackCopy(url);
            }
            document.getElementById('share-menu').classList.add('hidden');
        }

        function fallbackCopy(text) {
            const textArea = document.createElement('textarea');
            textArea.value = text;
            textArea.style.position = 'fixed';
            textArea.style.left = '-9999px';
            textArea.style.top = '-9999px';
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            
            try {
                document.execCommand('copy');
                showCopyNotification('Ссылка скопирована!');
            } catch (err) {
                showCopyNotification('Не удалось скопировать');
            }
            
            document.body.removeChild(textArea);
        }

        function showCopyNotification(message) {
            const oldNotifications = document.querySelectorAll('.copy-notification');
            oldNotifications.forEach(n => n.remove());
            
            const notification = document.createElement('div');
            notification.className = 'copy-notification fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-[9999]';
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 2000);
        }
    </script>
</x-layout>