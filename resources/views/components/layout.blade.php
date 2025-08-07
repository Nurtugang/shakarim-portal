<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shakarim University - Главная</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'shakarim-blue': '#314266',
                        'shakarim-light': '#4f6392',
                        'shakarim-dark': '#1e2a42',
                        'shakarim-gray': '#f3f4f6',
                    },
                    fontFamily: {
                        'heading': ['Montserrat', 'sans-serif'],
                        'body': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="font-body bg-white">
    <!-- Top Bar -->
    <div class="bg-gray-100 border-b">
        <div class="max-w-7xl mx-auto px-4 py-2">
            <div class="flex justify-between items-center text-sm">
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600"><i class="fas fa-phone mr-1"></i> +7 (7182) 67-36-69</span>
                    <span class="text-gray-600"><i class="fas fa-envelope mr-1"></i> info@shakarim.edu.kz</span>
                </div>

                <div class="flex items-center space-x-2">
                    <livewire:language-selector />

                    <!-- Иконка «Карта сайта» -->
                    <a href="{{ route('sitemap', ['locale' => app()->getLocale()]) }}"
                    class="text-gray-600 hover:text-shakarim-blue transition-colors duration-150 p-1 rounded"
                    title="Карта сайта">
                        <i class="fas fa-sitemap fa-lg"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-shakarim-blue shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('site.index', ['locale' => app()->getLocale()]) }}">
                        <img src="{{ asset('icons/university.png') }}" alt="Shakarim University Logo" class="h-10 w-auto">
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="hidden lg:flex items-center space-x-8">
                @foreach($menu as $item)
                    <div class="relative group">
                    <a href="{{ $item->page?->getUrl() ?? '#' }}"
                        class="flex items-center text-white hover:text-shakarim-blue font-medium font-body transition-colors duration-150">
                        {{ $item->{'title_'.app()->getLocale()} }}
                        <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </a>

                    @if($item->children->isNotEmpty())
                        <ul class="absolute top-full left-0 hidden group-hover:block
                                bg-white shadow-lg rounded mt-0 z-10">
                        @foreach($item->children as $child)
                            @if($child->page)
                            <li>
                                <a href="{{ $child->page->getUrl() }}"
                                class="block px-4 py-2 text-gray-700 whitespace-nowrap
                                        hover:text-shakarim-blue hover:underline
                                        transition-colors duration-150 ease-in-out">
                                {{ $child->{'title_'.app()->getLocale()} }}
                                </a>
                            </li>
                            @endif
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
                        @if($item->children->isNotEmpty())
                            <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="ml-2 text-sm"></i>
                        @endif
                        </button>

                        @if($item->children->isNotEmpty())
                        <ul
                            x-show="open"
                            x-collapse
                            class="mt-1 space-y-1 pl-4 text-white">
                            @foreach($item->children as $child)
                            <li>
                                <a
                                href="{{ $child->page?->getUrl() ?? '#' }}"
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
                        <img src="{{ asset('icons/university.png') }}" alt="Shakarim University Logo" class="h-10 w-auto">
                    </div>
                    <p class="text-blue-200 text-sm">1934 жылдан бері сапалы білім беру және ғылыми зерттеулер саласындағы көшбасшы университет.</p>
                </div>
                @foreach($footer_menu as $section)
        <div>
            <h4 class="font-semibold mb-4">
            {{ $section->{'title_'.app()->getLocale()} }}
            </h4>
            <ul class="space-y-2 text-sm">
            @foreach($section->children as $link)
                @if($link->page)
                <li>
                    <a href="{{ $link->page->getUrl() }}"
                        class="text-blue-200 hover:text-white transition">
                    {{ $link->{'title_'.app()->getLocale()} }}
                    </a>
                </li>
                @endif
            @endforeach
            </ul>
        </div>
        @endforeach
                <div>
                    <h4 class="font-semibold mb-4">Байланыс</h4>
                    <div class="space-y-2 text-sm text-blue-200">
                        <p>071412, Семей қ., Глинки көшесі, 20А</p>
                        <p>+7 (7182) 67-36-69</p>
                        <p>info@shakarim.edu.kz</p>
                    </div>
                    <div class="flex space-x-3 mt-4">
                        <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-youtube text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-blue-600 mt-8 pt-6 text-center text-sm text-blue-200">
                <p>&copy; 2025 Шәкәрім атындағы Семей университеті. Барлық құқықтар қорғалған.</p>
            </div>
        </div>
    </footer>

    <script>
        
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Slider functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.slide-dot');
        const totalSlides = slides.length;

        function showSlide(n) {
            // Hide all slides
            slides.forEach(slide => {
                slide.style.opacity = '0';
            });
            
            // Remove active class from all dots
            dots.forEach(dot => {
                dot.classList.remove('active');
                dot.classList.add('bg-opacity-50');
            });

            // Show current slide
            slides[n].style.opacity = '1';
            
            // Highlight current dot
            dots[n].classList.add('active');
            dots[n].classList.remove('bg-opacity-50');

            currentSlide = n;
        }

        function nextSlide() {
            const next = (currentSlide + 1) % totalSlides;
            showSlide(next);
        }

        function previousSlide() {
            const prev = (currentSlide - 1 + totalSlides) % totalSlides;
            showSlide(prev);
        }

        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
            });
        });

        // Auto-slide every 5 seconds
        setInterval(nextSlide, 5000);

        // Initialize slider
        showSlide(0);
    </script>
    @livewireScripts
    <!-- Scripts для каждой страницы наследующий этот шаблон -->
    @stack('scripts') 
</body>
</html>