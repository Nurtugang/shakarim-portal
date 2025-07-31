const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animated');
        }
    });
}, observerOptions);

document.querySelectorAll('.animate-on-scroll').forEach(el => {
    observer.observe(el);
});



document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

document.querySelectorAll('.stat-card, .school, .news-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-10px) scale(1.02)';
    });
    
    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
    });
});

// Кнопка "Прокрутить наверх"
document.addEventListener('DOMContentLoaded', function() {
    const scrollToTopBtn = document.getElementById('scrollToTop');
    let isScrolling = false;
    
    // Показать/скрыть кнопку при прокрутке
    function toggleScrollButton() {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.add('visible');
        } else {
            scrollToTopBtn.classList.remove('visible');
        }
    }
    
    // Обработчик прокрутки с throttling для производительности
    let scrollTimeout;
    window.addEventListener('scroll', function() {
        if (scrollTimeout) {
            window.cancelAnimationFrame(scrollTimeout);
        }
        
        scrollTimeout = window.requestAnimationFrame(function() {
            toggleScrollButton();
        });
    });
    
    // Плавная прокрутка наверх
    scrollToTopBtn.addEventListener('click', function() {
        if (isScrolling) return;
        
        isScrolling = true;
        
        // Добавляем эффект вращения при клике
        this.style.transform = 'rotate(360deg)';
        
        // Плавная прокрутка
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
        
        // Сбрасываем состояние после завершения прокрутки
        setTimeout(() => {
            isScrolling = false;
            this.style.transform = '';
        }, 1000);
    });
    
    // Проверяем позицию при загрузке страницы
    toggleScrollButton();
});