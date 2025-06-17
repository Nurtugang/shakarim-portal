
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
    <link rel="stylesheet" href="{{ asset("css/footer.css") }}">
    <link rel="stylesheet" href="{{ asset("css/header.css") }}">
     <link rel="stylesheet" href="{{ asset("css/styles.css") }}">
     <link rel="stylesheet" href="{{ asset("css/breadcrumb.css") }}">
      <!-- <link rel="stylesheet" href="{{ asset("css/admissions-applicants.css") }}"> -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @livewireStyles
     @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        <!-- Menu toggle button (left) -->
        <div class="menu-toggle-container">
            <button id="menuToggle" class="menu-toggle">
                <span class="menu-icon"></span>
            </button>
        </div>
        
        <!-- Logo (center) -->
        <div class="logo-container">
            <a href="/" class="logo">
                <img src="/icons/logo.png" alt="Shakarim University Logo">
                    </a>
                </div>
        
        <!-- Search bar (right) + Language selector -->
        <livewire:language-selector />
    </div>

    <!-- Main dropdown menu -->
    <div id="mainMenu" class="main-menu">
                <div class="menu-container">
            
                @foreach ($menu as $item )
                <div class="menu-category">
                    <h3>{{ $item->{'title_'.app()->getLocale()} }}</h3>
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
    <main>
        {{ $slot }}
    </main>

    <footer class="site-footer">
    <div class="footer-container">
        <div class="footer-col">
            <div class="footer-address">
                20А ул. Глинки<br>
                Семей, Область Абай<br>
                Республика Казахстан
            </div>
        </div>
        <div class="footer-col">
            <ul>
                <li><a href="#">Нормативные документы</a></li>
                <li><a href="#">Корпоративное управление</a></li>
                <li><a href="corporate-documents">Корпоративные документы</a></li>
                <li><a href="#">Академическая политика</a></li>
                <li><a href="#">Внутренняя система качества</a></li>
                <li><a href="#">Утверждённые формы дипломов</a></li>
                <li><a href="#">Организация ветеранов</a></li>
                <li><a href="#">Ассоциация выпускников</a></li>
                <li><a href="#">Устойчивое развитие</a></li>
                <li><a href="#">Профсоюз</a></li>
                <li><a href="#">Университет без коррупции</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h3>Полезные ссылки</h3>
            <ul>
                <li><a href="#">Minor</a></li>
                <li><a href="#">MOOC</a></li>
                <li><a href="#">Summer Semester</a></li>
                <li><a href="#">Platonus</a></li>
                <li><a href="#">Shakarim hub</a></li>
                <li><a href="template">template</a></li>
                <li><a href="template-structure">template-structure</a></li>
                <li><a href="template-empty">template-empty</a></li>
                <li><a href="template-choice">template-choice</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <div class="footer-social">
                <a href="#" aria-label="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="YouTube" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="Telegram" target="_blank"><i class="fab fa-telegram-plane"></i></a>
                <a href="#" aria-label="TikTok" target="_blank"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>
    </div>
</footer>

<!-- Contact Button -->
<a href="tel:+77222313175" class="contact-button">
    <i class="fas fa-phone"></i>
</a>

<!-- Scroll to Top Button -->
<button id="scrollTopBtn" class="scroll-top-button">
    <i class="fas fa-arrow-up"></i>
</button>
    <div class="mobile-menu-backdrop"></div>

    <!-- Base scripts -->
    <script src="/js/script.js"></script>
    <script src="/js/header.js"></script>
    <script src="/js/footer.js"></script>
    <!-- <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/main.min.js'></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/ru.js"></script>
    
    <!-- Scripts для каждой страницы наследующий этот шаблон -->
    @stack('scripts')   
</body>
</html>
