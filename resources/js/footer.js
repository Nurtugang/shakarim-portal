document.addEventListener('DOMContentLoaded', function() {
    // ------------- КНОПКА ПРОКРУТКИ ВВЕРХ -------------
    // Показ/скрытие кнопки "наверх" при прокрутке
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    
    if (scrollTopBtn) {
        window.addEventListener('scroll', function() {
            // Показываем кнопку, если прокрутка > 300px
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });
        
        // Плавная прокрутка наверх при клике на кнопку
        scrollTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}); 