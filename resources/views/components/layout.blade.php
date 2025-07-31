
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $metaTitle?: __("site.app_title")}}</title>
    <meta name="description" content="{{ $metaDescription?:__("site.app_description") }}">
    <meta property="og:title" content="{{ $metaTitle?: 'balavak.kz'}}">
    <meta property="og:description" content="{{ $metaDescription?:__("site.app_description") }}">
    <meta property="og:image" content="/img/not_photo.png">
      @livewireStyles
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     
    <link rel="stylesheet" href="{{ asset("css/footer.css") }}">
    <link rel="stylesheet" href="{{ asset("css/header.css") }}">
     <link rel="stylesheet" href="{{ asset("css/style.css") }}">
     <link rel="stylesheet" href="{{ asset("css/base.css") }}">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
      <style>
        .connector-v {
            width: 2px;
            background-color: #6b7280; /* Tailwind gray-500 */
            margin-left: auto;
            margin-right: auto;
        }
        .connector-h {
            height: 2px;
            background-color: #6b7280; /* Tailwind gray-500 */
            margin-top: auto;
            margin-bottom: auto;
        }
        .node {
            padding: 0.5rem 0.75rem; /* p-2 px-3 */
            border: 1px solid #4b5563; /* border-gray-600 */
            text-align: center;
            font-size: 0.8rem; 
            line-height: 1.25;
            min-height: 50px; /* Минимальная высота для читаемости */
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
        }
        .node-blue {
            background-color: #1e40af; /* Tailwind blue-700 */
            color: white;
            border-color: #1e3a8a; /* Tailwind blue-800 for border */
        }
        .node-orange {
            background-color: #f59e0b; /* Tailwind amber-500 */
            color: #1f2937; /* Tailwind gray-800 */
            border-color: #d97706; /* Tailwind amber-600 for border */
        }
        /* Для очень длинного текста в ячейках проректоров */
        .prorector-node {
            min-height: 70px; /* Больше высота для многострочного текста */
        }
    </style>
    @stack('styles')
</head>
<body>
  <header class="site-header">
    <div class="header-container">
        <!-- Menu toggle button + Social links (left) -->
        <div class="menu-toggle-container">
            <button id="menuToggle" class="menu-toggle">
                <span class="menu-icon"></span>
            </button>
            
            <!-- Соц.сети -->
            <div class="social-links">
                <a href="https://www.facebook.com/universitet.shakarim.1" class="social-link" target="_blank" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/shakarim_university" class="social-link" target="_blank" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.tiktok.com/@shakarim_university?_t=8eUlT4aAOhC&_r=1" class="social-link" target="_blank" title="LinkedIn">
                    <i class="fab fa-tiktok"></i>
                </a>
                <a href="https://www.youtube.com/channel/UCXJxFbPBx_Vot4V96_oekDg" class="social-link" target="_blank" title="YouTube">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://t.me/shakarimmedia" class="social-link" target="_blank" title="Telegram">
                    <i class="fab fa-telegram"></i>
                </a>
            </div>
        </div>
        
        <!-- Logo (center) -->
        <div class="logo-container">
            <a href="/" class="logo">
                <div class="logo-content">
                     <img src="/logo.webp" class="w-60">
                </div>
            </a>
        </div>
        
        <!-- Search bar (right) + Language selector -->
        <div class="search-container">
            <form id="searchForm" action="" method="get">
                <input type="text" name="s" placeholder="Поиск..." aria-label="Поиск">
                <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <div style="width:18px;"></div>
             <livewire:language-selector />
        </div>
    </div>

    <!-- Main dropdown menu -->
    <div id="mainMenu" class="main-menu">
        <div class="menu-container">
         @foreach ($menu as $item )
         
                <div class="menu-category">
                    <h3><i class="fas fa-university"></i>{{ $item->{'title_'.app()->getLocale()} }}</h3>
                     @if (isset($item->children) && count($item->children) > 0)
                    <ul>
                    @foreach ($item->children as $child)
                        <li><a href="{{ $child->getUrl() }}">{{ $child->{'title_'.app()->getLocale()} }}</a></li>
                        @endforeach
                    </ul>
                      @endif
                </div>
                   @endforeach
          
        </div>
    </div>
</header>
   <main class="page-wrapper">
{{ $slot }}
   </main>

<!-- Футер с оригинальной структурой -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-grid">
            <!-- Первая колонка -->
             @foreach ($footer_menu as $item)
             <div class="footer-section">
                <h4>{{ $item->{'title_'.app()->getLocale()} }}</h4>
                @if (isset($item->children) && count($item->children) > 0)
                    <ul class="footer-links">
                    @foreach ($item->children as $child)
                        <li><a href="{{ $child->getUrl() }}">{{ $child->{'title_'.app()->getLocale()} }}</a></li>
                        @endforeach
                    </ul>
                      @endif
            </div>
             @endforeach
            
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 1934 - <?php echo date("Y"); ?> Shakarim University. Все права защищены.</p>
        </div>
    </div>
</footer>

<!-- Scroll to Top -->
<button id="scrollToTop" class="scroll-to-top" aria-label="Наверх">
    <i class="fas fa-chevron-up"></i>
</button>

<!-- Мобильное меню backdrop -->
<div class="mobile-menu-backdrop"></div>

    <!-- Base scripts -->
    <script src="/js/base.js"></script>
     <script src="/js/index.js"></script>
    <script src="/js/header.js"></script>
   
    <!-- <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/main.min.js'></script> -->

    @livewireScripts
    <!-- Scripts для каждой страницы наследующий этот шаблон -->
    @stack('scripts')   
</body>
</html>
