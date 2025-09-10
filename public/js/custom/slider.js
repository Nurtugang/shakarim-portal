document.addEventListener('DOMContentLoaded', function() {
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slider-container .slide');
    const dots = document.querySelectorAll('.slider-container .slide-dot');
    const totalSlides = slides.length;
    let slideInterval; // Переменная для хранения таймера

    // Основная функция, которая показывает нужный слайд
    function showSlide(index) {
        // Проверяем, чтобы индекс не выходил за рамки
        if (index >= totalSlides) {
            index = 0;
        } else if (index < 0) {
            index = totalSlides - 1;
        }

        // Убираем класс 'active' у ВСЕХ слайдов и точек
        slides.forEach(slide => {
            slide.classList.remove('active');
        });
        dots.forEach(dot => {
            dot.classList.remove('active');
        });

        // Добавляем класс 'active' только НУЖНОМУ слайду и точке
        slides[index].classList.add('active');
        dots[index].classList.add('active');

        // Обновляем текущий индекс
        currentSlide = index;
    }
    
    // Функция для переключения на следующий слайд
    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    // Функция для переключения на предыдущий слайд
    function previousSlide() {
        showSlide(currentSlide - 1);
    }
    
    // --- Настройка автоматического переключения ---
    function startSlideShow() {
        slideInterval = setInterval(() => {
            nextSlide();
        }, 5000); // 5 секунд
    }
    
    // Сбрасываем таймер при ручном переключении, чтобы было удобнее
    function resetInterval() {
        clearInterval(slideInterval);
        startSlideShow();
    }
    
    // --- Навешиваем обработчики событий ---

    // Кликаем по точкам
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            resetInterval(); // Сбрасываем таймер
        });
    });

    // Делаем функции nextSlide и previousSlide доступными для HTML (для кнопок onclick)
    window.nextSlide = function() {
        nextSlide();
        resetInterval();
    };
    
    window.previousSlide = function() {
        previousSlide();
        resetInterval();
    };

    // --- Логика для свайпов на мобильных устройствах ---
    let touchStartX = 0;
    let touchEndX = 0;
    const sliderContainer = document.querySelector('.slider-container'); 

    if (sliderContainer) {
        sliderContainer.addEventListener('touchstart', e => {
            touchStartX = e.touches[0].clientX;
        });

        sliderContainer.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].clientX;
            handleSwipe();
        });

        function handleSwipe() {
            const swipeThreshold = 50; // Минимальное расстояние для свайпа

            if (touchEndX < touchStartX - swipeThreshold) {
                // Свайп влево -> следующий слайд
                window.nextSlide();
            } else if (touchEndX > touchStartX + swipeThreshold) {
                // Свайп вправо -> предыдущий слайд
                window.previousSlide();
            }
        }
    }
    
    // --- Инициализация слайдера ---
    showSlide(0); // Показываем первый слайд при загрузке страницы
    startSlideShow(); // Запускаем автоматическое переключение
});