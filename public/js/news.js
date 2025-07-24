// news.js - Базовые скрипты для страницы новостей

document.addEventListener('DOMContentLoaded', function() {
    initAccordions();
    initVideoNavigation();
});

// Аккордеоны
function initAccordions() {
    document.querySelectorAll('.accordion-button').forEach(button => {
        button.addEventListener('click', () => {
            const accordionContent = button.nextElementSibling;
            button.classList.toggle('active');

            if (button.classList.contains('active')) {
                accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
                accordionContent.style.paddingTop = '1.5rem';
                accordionContent.style.paddingBottom = '1.5rem';
            } else {
                accordionContent.style.maxHeight = '0';
                accordionContent.style.paddingTop = '0';
                accordionContent.style.paddingBottom = '0';
            } 
        });
    });
}

// Навигация для видео-секции
function initVideoNavigation() {
    const prevBtn = document.querySelector('.video-nav-btn.prev');
    const nextBtn = document.querySelector('.video-nav-btn.next');
    const videoGrid = document.querySelector('.video-grid');
    
    if (!prevBtn || !nextBtn || !videoGrid) return;
    
    // Вычислим ширину одного элемента видео плюс отступы
    const videoItems = document.querySelectorAll('.video-item');
    if (videoItems.length === 0) return;
    
    // Рассчитываем видимую ширину с учетом gap между элементами
    const getItemWidth = () => {
        const videoItem = videoItems[0];
        const style = window.getComputedStyle(videoItem);
        const width = videoItem.offsetWidth;
        const marginLeft = parseFloat(style.marginLeft);
        const marginRight = parseFloat(style.marginRight);
        return width + marginLeft + marginRight;
    };
    
    // Определяем количество видимых элементов в зависимости от ширины экрана
    const getVisibleItems = () => {
        const gridWidth = videoGrid.offsetWidth;
        const itemWidth = getItemWidth();
        return Math.floor(gridWidth / itemWidth);
    };
    
    // Обработчик для кнопки "Предыдущий"
    prevBtn.addEventListener('click', () => {
        const itemWidth = getItemWidth();
        const scrollAmount = itemWidth * getVisibleItems();
        videoGrid.scrollBy({
            left: -scrollAmount,
            behavior: 'smooth'
        });
    });
    
    // Обработчик для кнопки "Следующий"
    nextBtn.addEventListener('click', () => {
        const itemWidth = getItemWidth();
        const scrollAmount = itemWidth * getVisibleItems();
        videoGrid.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
        });
    });
    
    // Показываем/скрываем кнопки навигации в зависимости от положения скролла
    videoGrid.addEventListener('scroll', () => {
        // Показываем/скрываем кнопку "Предыдущий"
        if (videoGrid.scrollLeft <= 10) {
            prevBtn.classList.add('disabled');
        } else {
            prevBtn.classList.remove('disabled');
        }
        
        // Показываем/скрываем кнопку "Следующий"
        const maxScrollLeft = videoGrid.scrollWidth - videoGrid.clientWidth - 10;
        if (videoGrid.scrollLeft >= maxScrollLeft) {
            nextBtn.classList.add('disabled');
        } else {
            nextBtn.classList.remove('disabled');
        }
    });
    
    // Инициализация состояния кнопок при загрузке
    if (videoGrid.scrollLeft <= 10) {
        prevBtn.classList.add('disabled');
    }
}