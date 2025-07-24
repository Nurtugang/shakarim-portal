// newspage.js - Скрипты для страницы новости

document.addEventListener('DOMContentLoaded', function() {
    initPageAnimations();
    initScrollEffects();
    initParallaxBanner();
});

// Анимации при загрузке страницы
function initPageAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Наблюдаем за элементами с анимацией
    document.querySelectorAll('.article-content > *, .article-meta').forEach(el => {
        el.classList.add('animate-fade-in-up');
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
}

// Эффекты при скролле
function initScrollEffects() {
    let ticking = false;
    
    function updateScrollEffects() {
        const scrolled = window.pageYOffset;
        
        // Эффект для основного контента
        const articleWrapper = document.querySelector('.article-wrapper');
        if (articleWrapper) {
            const rect = articleWrapper.getBoundingClientRect();
            const inView = rect.top < window.innerHeight && rect.bottom > 0;
            
            if (inView) {
                const progress = Math.max(0, Math.min(1, (window.innerHeight - rect.top) / window.innerHeight));
                articleWrapper.style.opacity = 0.8 + (progress * 0.2);
            }
        }
        
        ticking = false;
    }
    
    window.addEventListener('scroll', function() {
        if (!ticking) {
            requestAnimationFrame(updateScrollEffects);
            ticking = true;
        }
    });
}

// Параллакс для баннера
function initParallaxBanner() {
    const banner = document.querySelector('.news-featured-image img');
    
    if (banner) {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * 0.15;
            
            if (window.innerWidth > 768) {
                // Эффект параллакса только на десктопе
                banner.style.transform = `translateY(${Math.min(rate, 50)}px)`;
            }
        });
    }
}

// Прогрессивное улучшение
function initProgressiveEnhancement() {
    // Проверка поддержки CSS переменных
    if (!CSS.supports('color', 'var(--primary-color)')) {
        document.documentElement.style.setProperty('--primary-color', '#006DB6');
        document.documentElement.style.setProperty('--secondary-color', '#00427A');
    }
}

// Инициализация всех улучшений
initProgressiveEnhancement();

// Обработка изменения размера окна
window.addEventListener('resize', function() {
    // Сброс стилей при изменении размера для мобильных
    const banner = document.querySelector('.news-featured-image img');
    if (banner && window.innerWidth <= 768) {
        banner.style.transform = 'none';
    }
});