// page-content.js - Скрипты для статических страниц

document.addEventListener('DOMContentLoaded', function() {
    initPageAnimations();
    initSidebarNavigation();
    initAccordions();
    initScrollEffects();
    //initParallaxBanner();
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
    document.querySelectorAll('.animate-fade-in-up, .animate-fade-in-down').forEach(el => {
        observer.observe(el);
    });
}

// Интерактивная боковая навигация
function initSidebarNavigation() {
    const navLinks = document.querySelectorAll('.sidebar-nav a');
    
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(8px)';
        });
        
        link.addEventListener('mouseleave', function() {
            if (!this.classList.contains('bg-secondary')) {
                this.style.transform = 'translateX(0)';
            }
        });
    });
}

// Аккордеоны
function initAccordions() {
    const accordionButtons = document.querySelectorAll('[x-on\\:click*="isExpanded"]');
    
    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            // Добавляем визуальные эффекты
            if (!isExpanded) {
                this.style.background = 'var(--primary-color)';
                this.style.color = 'white';
            } else {
                this.style.background = 'var(--section-bg)';
                this.style.color = 'var(--secondary-color)';
            }
            
            // Анимация иконки
            const icon = this.querySelector('svg');
            if (icon) {
                icon.style.transform = isExpanded ? 'rotate(0deg)' : 'rotate(180deg)';
            }
        });
    });
}

// Эффекты при скролле
function initScrollEffects() {
    let ticking = false;
    
    function updateScrollEffects() {
        const scrolled = window.pageYOffset;
        
        // Параллакс для боковой навигации
        const sidebar = document.querySelector('.sidebar-nav');
        if (sidebar && window.innerWidth > 1024) {
            const rate = scrolled * 0.1;
            sidebar.style.transform = `translateY(${Math.min(rate, 20)}px)`;
        }
        
        // Эффект для основного контента
        const mainContent = document.querySelector('.main-content');
        if (mainContent) {
            const rect = mainContent.getBoundingClientRect();
            const inView = rect.top < window.innerHeight && rect.bottom > 0;
            
            if (inView) {
                const progress = Math.max(0, Math.min(1, (window.innerHeight - rect.top) / window.innerHeight));
                mainContent.style.opacity = 0.7 + (progress * 0.3);
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


// Улучшенные hover эффекты
function initAdvancedHoverEffects() {
    // Эффект для карточек
    document.querySelectorAll('.sidebar-nav, .main-content').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.15)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.08)';
        });
    });
}

// Прогрессивное улучшение
function initProgressiveEnhancement() {
    // Проверка поддержки CSS Grid
    if (!CSS.supports('display', 'grid')) {
        const contentGrid = document.querySelector('.content-grid');
        if (contentGrid) {
            contentGrid.style.display = 'flex';
            contentGrid.style.flexDirection = 'column';
        }
    }
    
    // Проверка поддержки CSS переменных
    if (!CSS.supports('color', 'var(--primary-color)')) {
        document.documentElement.style.setProperty('--primary-color', '#006DB6');
        document.documentElement.style.setProperty('--secondary-color', '#00427A');
        document.documentElement.style.setProperty('--accent-color', '#FFB800');
    }
}

// Инициализация всех улучшений
initAdvancedHoverEffects();
initProgressiveEnhancement();

// Обработка изменения размера окна
window.addEventListener('resize', function() {
    // Сброс стилей при изменении размера
    const sidebar = document.querySelector('.sidebar-nav');
    if (sidebar && window.innerWidth <= 1024) {
        sidebar.style.transform = 'none';
    }
});

// Добавляем класс для улучшенной анимации
document.body.classList.add('page-enhanced');