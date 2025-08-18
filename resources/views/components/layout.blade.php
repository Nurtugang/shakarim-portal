<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shakarim University - Главная</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom/base.css') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/logo_sgu.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @filamentStyles
    
</head>
<body class="font-body bg-white">
    <!-- Top Bar -->
    <div class="bg-gray-100 border-b">
        <div class="max-w-7xl mx-auto px-4 py-2">
            <div class="flex justify-end md:justify-between items-center text-sm">
                <div class="flex items-center space-x-4 hidden md:block">
                    <a href="tel:+7 (7222) 31-31-75">
                        <span class="text-gray-600"><i class="fas fa-phone mr-1"></i> +7 (7222) 31-31-75</span>
                    </a>    
                    <a href="mailto:kense@shakarim.kz">
                        <span class="text-gray-600"><i class="fas fa-envelope mr-1"></i> kense@shakarim.kz</span>
                    </a>                    
                </div>

                <div class="flex items-center space-x-2 ml-auto relative">
                    <livewire:language-selector />
                    <button id="search-toggle" 
                            class="text-gray-600 hover:text-shakarim-blue transition-colors duration-150 p-1 rounded"
                            title="{{ __('Search') }}">
                        <i class="fas fa-search fa-lg"></i>
                    </button>
                    
                    <a href="{{ route('sitemap', ['locale' => app()->getLocale()]) }}"
                    class="text-gray-600 hover:text-shakarim-blue transition-colors duration-150 p-1 rounded"
                    title="{{ __('Site Map') }}">
                        <i class="fas fa-sitemap fa-lg"></i>
                    </a>

                    <div id="search-field" class="hidden absolute top-full right-0 mt-2 bg-white shadow-lg rounded-lg p-3 z-50 w-128">
                        <form method="GET" action="{{ route('search', ['locale' => app()->getLocale()]) }}" class="flex h-10">
                            <input type="text" 
                                name="q"
                                placeholder="{{ __('Search...') }}" 
                                class="flex-1 px-3 py-2 border border-gray-300 rounded-l-lg focus:outline-none  focus:ring-shakarim-blue h-full">
                            <button type="submit" 
                                    class="w-10 h-full bg-shakarim-blue text-white rounded-r-lg hover:bg-blue-700 transition flex items-center justify-center">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-shakarim-blue shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between py-2 lg:py-4">
                <!-- Пустой div для баланса на мобильных -->
                <div class="lg:hidden w-10"></div>
                
                <!-- Logo -->
                <div class="flex items-center lg:flex-none flex-1 lg:flex-initial justify-center lg:justify-start">
                    <a href="{{ route('site.index', ['locale' => app()->getLocale()]) }}">
                        <img src="{{ asset('icons/university.png') }}" alt="Shakarim University Logo" class="h-8 md:h-10 w-auto">
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="hidden lg:flex items-center space-x-8">
                    @foreach($menu as $item)
                        <div class="relative group">
                        <a href="{{ $item->page?->getUrl() ?? '#' }}"
                            class="flex items-center text-white font-medium font-body transition-colors duration-150">
                            {{ $item->{'title_'.app()->getLocale()} }}
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </a>

                        @if(isset($item->children) && count($item->children) > 0)
                            <ul class="absolute top-full left-0 hidden group-hover:block
                                    bg-white shadow-lg rounded mt-0 z-10">
                            @foreach($item->children as $child)
                                <li>
                                    <a href="{{ $child->getUrl() }}"
                                    class="block px-4 py-2 text-gray-700 whitespace-nowrap
                                            hover:text-shakarim-blue hover:underline
                                            transition-colors duration-150 ease-in-out">
                                    {{ $child->{'title_'.app()->getLocale()} }}
                                    </a>
                                </li>
                            @endforeach
                            </ul>
                        @endif
                        </div>
                    @endforeach
                </nav>

                <!-- Mobile menu button -->
                <button class="lg:hidden p-2" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars text-xl text-white"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="lg:hidden hidden border-t py-4 px-4">
                <div class="space-y-2">
                    @foreach($menu as $item)
                    <div x-data="{ open: false }" class="border-b border-gray-200">
                        <button
                        @click="open = !open"
                        class="w-full flex justify-between items-center py-2 text-white hover:bg-shakarim-white rounded">
                        <span>{{ $item->{'title_'.app()->getLocale()} }}</span>
                        @if(isset($item->children) && count($item->children) > 0)
                            <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="ml-2 text-sm"></i>
                        @endif
                        </button>

                        @if(isset($item->children) && count($item->children) > 0)
                        <ul
                            x-show="open"
                            x-collapse
                            class="mt-1 space-y-1 pl-4 pb-4 text-white">
                            @foreach($item->children as $child)
                            <li>
                                <a href="{{ $child->getUrl() }}"
                                class="block py-1 text-white transition-colors duration-150">
                                {{ $child->{'title_'.app()->getLocale()} }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </header>
    
    <!-- Main -->
    <main class="page-wrapper">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-shakarim-blue text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <a href="{{ route('site.index', ['locale' => app()->getLocale()]) }}">
                            <img src="{{ asset('icons/university.png') }}" alt="Shakarim University Logo" class="h-8 w-auto">
                        </a>
                    </div>
                    <div class="relative">
                        <div class="text-blue-100 text-sm leading-relaxed mb-3">
                            <span class="italic">{!! html_entity_decode($quote->text) !!}</span>
                        </div>
                        <div class="text-blue-300 text-xs font-semibold">
                            — {{ $quote->author }}
                        </div>
                    </div>
                    </div>
                        @foreach($footer_menu as $section)
                            <div>
                                <h4 class="font-semibold mb-4">
                                {{ $section->{'title_'.app()->getLocale()} }}
                                </h4>
                                @if(isset($section->children) && count($section->children) > 0)
                                    <ul class="space-y-2 text-sm">
                                    @foreach($section->children as $link)
                                        <li>
                                            <a href="{{ $link->getUrl() }}"
                                                class="text-blue-200 hover:text-white transition">
                                            {{ $link->{'title_'.app()->getLocale()} }}
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    <div>
                    <h4 class="font-semibold mb-4">{{ __('Contact') }}</h4>
                    <div class="space-y-2 text-sm text-blue-200">
                        <p>{{ __('071412, Semey, Glinka street, 20A') }}</p>
                        <p>+7 (7182) 67-36-69</p>
                        <p>info@shakarim.edu.kz</p>
                    </div>
                    <div class="flex space-x-3 mt-4">
                        <a href="https://www.instagram.com/shakarim_university" target="_blank" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                        <a href="https://www.facebook.com/universitet.shakarim.1" target="_blank" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="https://t.me/shakarimmedia" target="_blank" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-telegram text-sm"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCXJxFbPBx_Vot4V96_oekDg" target="_blank" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-youtube text-sm"></i>
                        </a>
                        <a href="https://www.tiktok.com/@shakarim_university?_t=8eUlT4aAOhC&_r=1" target="_blank" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-tiktok text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 text-center text-sm text-blue-200">
                <p>&copy; 2025 {{ __('NP JSC "Shakarim University". All rights reserved.') }}</p>
            </div>
        </div>
    </footer>
    
    <!-- Back To Tap -->
    <button id="backToTop" 
            class="fixed bottom-4 right-4 md:bottom-6 md:right-6 z-50 
                w-10 h-10 md:w-12 md:h-12 
                bg-shakarim-blue hover:bg-shakarim-dark 
                text-white rounded-full shadow-lg hover:shadow-xl 
                transition-all duration-300 ease-in-out 
                transform hover:scale-110 
                opacity-0 invisible translate-y-4
                flex items-center justify-center
                focus:outline-none focus:ring-2 focus:ring-shakarim-blue focus:ring-offset-2">
        <i class="fas fa-arrow-up text-sm md:text-base"></i>
    </button>

    @livewireScripts
    @filamentScripts
    <!-- Scripts для каждой страницы наследующий этот шаблон -->
    @stack('scripts') 

    <script src="{{ asset('js/custom/mobile.js') }}"></script>
    <script src="{{ asset('js/custom/back-to-top.js') }}"></script>
    <script src="{{ asset('js/custom/search.js') }}"></script>

    <script>
        
    </script>

</body>
</html>
