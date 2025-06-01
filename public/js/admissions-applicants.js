document.addEventListener('DOMContentLoaded', function() {
    // Инициализация секции образовательных уровней
    initEducationLevels();
});

/**
 * Инициализация секции уровней образования
 * Настраивает переключение между опциями и отображение соответствующих блоков с преимуществами
 */
function initEducationLevels() {
    const educationOptions = document.querySelectorAll('.education-option');
    const benefitsContainers = document.querySelectorAll('.benefits-container');
    
    // Установка первого варианта активным по умолчанию
    if (educationOptions.length > 0 && benefitsContainers.length > 0) {
        educationOptions[0].classList.add('active');
        const defaultTargetId = educationOptions[0].getAttribute('data-target');
        const defaultTarget = document.getElementById(defaultTargetId);
        if (defaultTarget) {
            defaultTarget.classList.add('active');
        }
    }
    
    // Добавление обработчиков для каждой опции
    educationOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Удаляем активный класс со всех опций
            educationOptions.forEach(opt => opt.classList.remove('active'));
            
            // Добавляем активный класс на текущую опцию
            this.classList.add('active');
            
            // Скрываем все контейнеры с преимуществами
            benefitsContainers.forEach(container => container.classList.remove('active'));
            
            // Показываем соответствующий контейнер
            const targetId = this.getAttribute('data-target');
            const targetContainer = document.getElementById(targetId);
            if (targetContainer) {
                targetContainer.classList.add('active');
                
                // Плавная прокрутка к контейнеру с преимуществами
                targetContainer.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}
