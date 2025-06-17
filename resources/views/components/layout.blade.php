
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
     <link rel="stylesheet" href="{{ asset("css/style.css") }}">
     <link rel="stylesheet" href="{{ asset("css/base.css") }}">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
            <div class="footer-brand">
                <h3>Нормативные документы</h3>
                <ul class="footer-links">
                    <li><a href="#">Корпоративное управление</a></li>
                    <li><a href="#">Корпоративные документы</a></li>
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
            
            <!-- Вторая колонка -->
            <div class="footer-section">
                <h4>Полезные ссылки</h4>
                <ul class="footer-links">
                    <li><a href="#">Minor</a></li>
                    <li><a target="_blank" href="https://mooc.semgu.kz/">MOOC</a></li>
                    <li><a href="#">Summer Semester</a></li>
                    <li><a target="_blank" href="https://platonus.shakarim.kz/">Platonus</a></li>
                    <li><a target="_blank" href="https://hub.shakarim.kz/">Shakarim Hub</a></li>
                </ul>
            </div>
            
            <!-- Третья колонка -->
            <div class="footer-section">
                <h4>Университет</h4>
                <ul class="footer-links">
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">История</a></li>
                    <li><a href="#">Руководство</a></li>
                    <li><a href="#">Вакансии</a></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </div>
            
            <!-- Четвертая колонка -->
            <div class="footer-section">
                <h4>Контакты</h4>
                <ul class="footer-links">
                    <li>г. Семей, ул. Глинки, 20А</li>
                    <li>+7 (7222) 31-60-29</li>
                    <li>info@shakarim.edu.kz</li>
                    <li>Приемная: +7 (771) 365-46-25</li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2024 Shakarim University. Все права защищены.</p>
        </div>
    </div>
</footer>

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
