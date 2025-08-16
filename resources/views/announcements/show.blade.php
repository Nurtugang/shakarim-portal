<x-layout>
    <link rel="stylesheet" href="{{ asset('css/custom/dynamic-content.css') }}">
    
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница')}}</a>
                <span>&#8250;</span>
                <a href="{{ route('announcements.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Объявления')}}</a>

                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">
                    {{ \Illuminate\Support\Str::limit(strip_tags($announcement->name), 40) }}
                </span>
            </nav>
        </div>
    </section>

    <!-- Announcement Content -->
    <section class="bg-white py-4 md:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-8">
                <!-- Main Announcement Article -->
                <div class="lg:col-span-2">
                    <article class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <!-- Article Header -->
                        <div class="p-3 md:p-6 border-b border-gray-100">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 space-y-3 md:space-y-0">
                                <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-3">
                                    <span class="bg-shakarim-blue text-white px-2 md:px-3 py-1 rounded-full text-xs font-medium w-fit">
                                        <i class="fas fa-bullhorn mr-1"></i>{{ strtoupper($announcement->language) }}
                                    </span>
                                    <span class="text-gray-500 text-sm">
                                        <i class="far fa-calendar mr-1"></i>{{ \Carbon\Carbon::createFromTimestamp($announcement->date)->locale(app()->getLocale())->isoFormat('D MMMM, YYYY') }}
                                    </span>
                                </div>
                                <div class="text-left md:text-right">
                                    <span class="text-gray-600 text-sm font-medium">{{ __('От:')}}</span>
                                    <span class="text-shakarim-blue font-semibold ml-1">{{ __('Медиа-центр')}}</span>
                                </div>
                            </div>
                            <h1 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-heading font-bold text-shakarim-blue leading-tight">
                                {{ $announcement->name }}
                            </h1>
                            @if($announcement->description)
                                <p class="text-gray-600 mt-4 text-sm md:text-base leading-relaxed">
                                    {{ $announcement->description }}
                                </p>
                            @endif
                        </div>
                        
                        <!-- Announcement Image -->
                        @if($announcement->image)
                            <div class="p-3 md:p-6">
                                <img src="{{ Storage::url('announcement/' . $announcement->image) }}" 
                                    alt="{{ $announcement->name }}" 
                                    class="w-full h-auto max-w-full mx-auto rounded-lg shadow-lg">
                            </div>
                        @endif
                        
                        <!-- Article Content -->
                        <div class="p-3 md:p-6 dynamic-content">
                            {!! $announcement->content !!}
                        </div>

                        <!-- Article Footer -->
                        <div class="p-3 md:p-6 bg-gray-50 border-t border-gray-100">
                            <div class="flex flex-col space-y-3 md:flex-row md:items-center md:justify-between md:space-y-0">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    <span>{{ __('Объявление от')}} {{ \Carbon\Carbon::createFromTimestamp($announcement->created_at ?? $announcement->date)->locale(app()->getLocale())->isoFormat('D MMMM, YYYY') }}</span>
                                </div>
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
                </div>

                <!-- Sidebar - Latest Announcements -->
                <div class="lg:col-span-1 order-last lg:order-last">
                    <div class="bg-white rounded-xl shadow-lg p-3 md:p-6 lg:sticky lg:top-24">
                        <h2 class="text-base md:text-lg lg:text-xl font-heading font-bold text-shakarim-blue mb-3 md:mb-6 flex items-center">
                            <i class="fas fa-bullhorn mr-2 text-orange-500"></i>
                            {{ __('Другие объявления')}}
                        </h2>

                        <!-- Latest Announcements List -->
                        <div class="space-y-2 md:space-y-4 mb-3 md:mb-6">
                            @foreach($latestAnnouncements as $latestItem)
                                <div class="border-b border-gray-100 pb-2 md:pb-4">
                                    <div class="flex items-start space-x-2 md:space-x-3">
                                        <div class="w-2 h-2 bg-shakarim-blue rounded-full mt-2 flex-shrink-0"></div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xs md:text-sm font-medium text-gray-900 hover:text-shakarim-blue cursor-pointer line-clamp-2">
                                                <a href="{{ route('announcements.show', ['id' => $latestItem->id]) }}">
                                                    {{ $latestItem->name }}
                                                </a>
                                            </h3>
                                            <p class="text-xs text-gray-500 mt-1">{{ \Carbon\Carbon::createFromTimestamp($latestItem->date)->locale(app()->getLocale())->isoFormat('D MMMM, YYYY') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if($latestAnnouncements->count() == 0)
                                <div class="text-center text-gray-500 py-4">
                                    <p class="text-sm">Нет других объявлений</p>
                                </div>
                            @endif
                            
                        </div>

                        <!-- All Announcements Button -->
                        <div class="text-center">
                            <a href="{{ route('announcements.index', ['locale' => app()->getLocale()]) }}" class="inline-flex items-center w-full md:w-auto px-3 md:px-6 py-2 md:py-3 bg-gradient-to-r from-shakarim-blue to-shakarim-light text-white font-medium rounded-lg hover:from-shakarim-dark hover:to-shakarim-blue transition duration-200 shadow-lg hover:shadow-xl text-sm md:text-base">
                                <span>{{ __('Все объявления')}}</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
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
            const announcementTitle = encodeURIComponent('{{ $announcement->name }}');
            
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = `{!! strip_tags($announcement->content) !!}`;
            const description = encodeURIComponent(tempDiv.textContent.substring(0, 100) + '...');
            
            let shareUrl = '';
            
            switch(platform) {
                case 'facebook':
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${announcementTitle}`;
                    break;
                case 'telegram':
                    shareUrl = `https://t.me/share/url?url=${url}&text=${announcementTitle}`;
                    break;
                case 'whatsapp':
                    shareUrl = `https://wa.me/?text=${announcementTitle}%20${url}`;
                    break;
                case 'twitter':
                    shareUrl = `https://twitter.com/intent/tweet?text=${announcementTitle}&url=${url}`;
                    break;
                case 'vk':
                    shareUrl = `https://vk.com/share.php?url=${url}&title=${announcementTitle}&description=${description}`;
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