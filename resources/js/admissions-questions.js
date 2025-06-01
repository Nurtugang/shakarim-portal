document.addEventListener('DOMContentLoaded', function() {
    // Инициализация секции "Что если я...?"
    initWhatIfSection();

    // Инициализация секции "Популярные вопросы"
    initPopularQuestions();
});


/**
 * Инициализация секции "Что если я...?"
 * Настраивает переключение между вариантами и отображение соответствующей информации
 */
function initWhatIfSection() {
    const whatIfOptions = document.querySelectorAll('.what-if-option');
    const whatIfInfoBlocks = document.querySelectorAll('.what-if-info');
    const illustration = document.querySelector('.what-if-illustration');
    
    // Обработчик клика по опции
    whatIfOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Удаляем активный класс со всех опций
            whatIfOptions.forEach(opt => opt.classList.remove('active'));
            
            // Добавляем активный класс текущей опции
            this.classList.add('active');
            
            // Скрываем все информационные блоки
            whatIfInfoBlocks.forEach(block => block.classList.remove('active'));
            
            // Показываем целевой информационный блок
            const targetId = this.getAttribute('data-target');
            const targetBlock = document.getElementById(targetId);
            
            if (targetBlock) {
                targetBlock.classList.add('active');
                
                // Скрываем иллюстрацию при показе информации
                if (illustration) {
                    illustration.style.opacity = '0';
                    illustration.style.display = 'none';
                }
            }
        });
    });
    
    // Проверяем, есть ли активная опция, если нет - активируем первую
    if (whatIfOptions.length > 0) {
        const activeOption = document.querySelector('.what-if-option.active');
        if (!activeOption) {
            // Имитируем клик по первой опции
            whatIfOptions[0].click();
        }
    }
}

/**
 * Инициализация секции "Популярные вопросы"
 * Обрабатывает нажатия на кнопки вопросов и показывает соответствующий контент
 */
function initPopularQuestions() {
    const questionButtons = document.querySelectorAll('.popular-questions-section .question-button');
    const questionImage = document.querySelector('.question-image');
    const questionContents = document.querySelectorAll('.question-content');
    
    // Добавляем обработчики для каждой кнопки
    questionButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Получаем ID вопроса из атрибута data-question
            const questionId = this.getAttribute('data-question');
            
            // Снимаем активный класс со всех кнопок
            questionButtons.forEach(btn => btn.classList.remove('active'));
            
            // Добавляем активный класс нажатой кнопке
            this.classList.add('active');
            
            // Скрываем картинку
            if (questionImage) {
                questionImage.classList.remove('active');
            }
            
            // Скрываем все контенты вопросов
            questionContents.forEach(content => content.classList.remove('active'));
            
            // Показываем нужный контент
            const targetContent = document.getElementById(questionId);
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });
}


// Добавляем стили для анимации путей
const styleSheet = document.createElement("style");
styleSheet.textContent = `
@keyframes dashOffset {
    from {
        stroke-dashoffset: 500;
    }
    to {
        stroke-dashoffset: 0;
    }
}

.path-animation {
    stroke-dashoffset: 500;
}
`;
document.head.appendChild(styleSheet); 