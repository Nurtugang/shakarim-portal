document.addEventListener('DOMContentLoaded', function() {
    // ------------- ИНИЦИАЛИЗАЦИЯ СЛАЙДЕРА -------------
    // Получаем все слайды
    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;

    // Создаем индикаторы (точки) на основе количества слайдов
    const dotsContainer = document.querySelector('.slider-dots');
    slides.forEach((_, index) => {
        const dot = document.createElement('span');
        dot.classList.add('dot');
        // Активируем первую точку
        if (index === 0) dot.classList.add('active');
        // Добавляем обработчик клика для переключения слайдов
        dot.addEventListener('click', () => goToSlide(index));
        dotsContainer.appendChild(dot);
    });
    
    /**
     * Функция переключения слайдов
     * @param {number} n - Индекс слайда для показа
     */
    function goToSlide(n) {
        // Убираем активный класс с текущего слайда и точки
        slides[currentSlide].classList.remove('active');
        document.querySelectorAll('.dot')[currentSlide].classList.remove('active');
        
        // Вычисляем новый индекс с учетом цикличности
        currentSlide = (n + slides.length) % slides.length;
        
        // Добавляем активный класс новому слайду и точке
        slides[currentSlide].classList.add('active');
        document.querySelectorAll('.dot')[currentSlide].classList.add('active');
    }
    
    // Кнопки управления слайдером (вперед/назад)
    document.querySelector('.next').addEventListener('click', () => goToSlide(currentSlide + 1));
    document.querySelector('.prev').addEventListener('click', () => goToSlide(currentSlide - 1));
    
    // Автоматическое переключение слайдов каждые 5 секунд
    setInterval(() => goToSlide(currentSlide + 1), 5000);
    
    // ------------- КНОПКА ПРОКРУТКИ ВВЕРХ -------------
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    if (scrollTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });
        scrollTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // ------------- ИНИЦИАЛИЗАЦИЯ ДОПОЛНИТЕЛЬНЫХ МОДУЛЕЙ -------------
    // Эффект при наведении на блоки школ
    initSchoolsHover();
    
    // Анимация прокрутки новостей
    initNewsScrollAnimation();
    
    // Инициализация календаря
    initCalendar();
});

/**
 * Инициализация и настройка FullCalendar
 * Создает интерактивный календарь с событиями, праздниками и всплывающими подсказками
 */
function initCalendar() {
    // Получаем элемент календаря
    const calendarEl = document.getElementById('calendar');
    
    // Если календарь не найден, прекращаем выполнение
    if (!calendarEl) return;
    
    // Создаем экземпляр календаря с настройками
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth', // Вид по умолчанию - месяц
        initialDate: '2025-05-01',   // Начальная дата
        headerToolbar: false,        // Отключаем встроенную навигацию, используем свою
        locale: 'ru',                // Локализация
        height: 'auto',              // Автоматическая высота календаря
        expandRows: true,            // Расширяем строки для заполнения всей высоты
        fixedWeekCount: false,       // Позволяем показывать только нужное количество недель
        
        // Обработчик монтирования ячейки дня
        dayCellDidMount: function(info) {
            // Добавляем цветные кружки для праздничных дней
            const date = info.date;
            const day = date.getDate();
            const month = date.getMonth() + 1; // +1 т.к. месяцы начинаются с 0
            const year = date.getFullYear();
            
            // Проверяем праздничные дни
            if (year === 2025 && month === 5) {
                if (day === 1) {
                    // День единства народа Казахстана - зеленый кружок
                    const dayNumberEl = info.el.querySelector('.fc-daygrid-day-number');
                    dayNumberEl.classList.add('holiday-circle');
                    dayNumberEl.classList.add('green-circle');
                    dayNumberEl.setAttribute('data-holiday', 'День единства народа Казахстана');
                    dayNumberEl.style.cursor = 'pointer';
                    dayNumberEl.addEventListener('click', function() {
                        window.location.href = 'https://shakarim.edu.kz/ru/announcement/index';
                    });
                } else if (day === 7) {
                    // День защитника Отечества - синий кружок
                    const dayNumberEl = info.el.querySelector('.fc-daygrid-day-number');
                    dayNumberEl.classList.add('holiday-circle');
                    dayNumberEl.classList.add('blue-circle');
                    dayNumberEl.setAttribute('data-holiday', 'День защитника Отечества');
                    dayNumberEl.style.cursor = 'pointer';
                    dayNumberEl.addEventListener('click', function() {
                        window.location.href = 'https://shakarim.edu.kz/ru/announcement/index';
                    });
                } else if (day === 9) {
                    // День Победы - красный кружок
                    const dayNumberEl = info.el.querySelector('.fc-daygrid-day-number');
                    dayNumberEl.classList.add('holiday-circle');
                    dayNumberEl.classList.add('red-circle');
                    dayNumberEl.setAttribute('data-holiday', 'День Победы');
                    dayNumberEl.style.cursor = 'pointer';
                    dayNumberEl.addEventListener('click', function() {
                        window.location.href = 'https://shakarim.edu.kz/ru/announcement/index';
                    });
                }
            }
        },
        
        // Список событий календаря
        events: [
            // Сессии (длительные события)
            {
                title: 'Сессия',
                start: '2025-05-12',
                end: '2025-05-17', // Дата окончания не включается в FullCalendar
                url: 'https://shakarim.edu.kz/ru/announcement/index',
                color: '#4285F4',
                classNames: ['thin-event']
            },
            {
                title: 'Сессия',
                start: '2025-05-19',
                end: '2025-05-24',
                url: 'https://shakarim.edu.kz/ru/announcement/index',
                color: '#4285F4',
                classNames: ['thin-event']
            },
            {
                title: 'Сессия',
                start: '2025-05-26',
                end: '2025-05-31',
                url: 'https://shakarim.edu.kz/ru/announcement/index',
                color: '#4285F4',
                classNames: ['thin-event']
            },
            
            // Отдельные события (с астериском)
            {
                title: 'Конференция по искусственному интеллекту',
                start: '2025-05-07T10:00:00',
                url: 'https://shakarim.edu.kz/ru/announcement/index',
                display: 'background',
                classNames: ['event-with-asterisk']
            },
            {
                title: 'Мастер-класс по программированию',
                start: '2025-05-07T14:30:00',
                url: 'https://shakarim.edu.kz/ru/announcement/index',
                display: 'background',
                classNames: ['event-with-asterisk']
            },
            {
                title: 'Открытая лекция по биотехнологиям',
                start: '2025-05-14T11:00:00',
                url: 'https://shakarim.edu.kz/ru/announcement/index',
                display: 'background',
                classNames: ['event-with-asterisk']
            },
            {
                title: 'Семинар по психологии',
                start: '2025-05-15T15:00:00',
                url: 'https://shakarim.edu.kz/ru/announcement/index',
                display: 'background',
                classNames: ['event-with-asterisk']
            },
            {
                title: 'Встреча с работодателями',
                start: '2025-05-20T13:00:00',
                url: 'https://shakarim.edu.kz/ru/announcement/index',
                display: 'background',
                classNames: ['event-with-asterisk']
            }
        ]
    });
    
    // Рендерим календарь
    calendar.render();
    
    // После рендеринга добавляем звездочки и всплывающие подсказки
    setTimeout(() => {
        // Добавляем звездочки к датам с событиями
        addAsterisksToEvents(calendar);
        
        // Добавляем всплывающие подсказки к дням
        addTooltipsToCalendarDays(calendar);
    }, 100);
    
    /**
     * Функция для добавления звездочек к датам с событиями
     * @param {Object} calendar - Экземпляр FullCalendar
     */
    function addAsterisksToEvents(calendar) {
        // Получаем все события календаря
        const events = calendar.getEvents();
        const eventDates = {};
        
        // Отмечаем даты, на которые есть события с отметкой event-with-asterisk
        events.forEach(event => {
            if (event.display === 'background' && event.classNames.includes('event-with-asterisk')) {
                const eventDate = event.startStr.split('T')[0];
                eventDates[eventDate] = true;
            }
        });
        
        // Перебираем все отмеченные даты и добавляем звездочки
        Object.keys(eventDates).forEach(date => {
            const dateCell = document.querySelector(`.fc-daygrid-day[data-date="${date}"]`);
            if (dateCell && !dateCell.classList.contains('has-asterisk')) {
                dateCell.classList.add('has-asterisk');
                
                if (!dateCell.querySelector('.event-asterisk')) {
                    const asterisk = document.createElement('span');
                    asterisk.className = 'event-asterisk';
                    asterisk.textContent = '*';
                    asterisk.title = 'Есть события в этот день';
                    dateCell.appendChild(asterisk);
                    
                    asterisk.addEventListener('click', function(e) {
                        e.stopPropagation();
                        window.location.href = 'https://shakarim.edu.kz/ru/announcement/index';
                    });
                }
            }
        });
    }
    
    /**
     * Функция для добавления всплывающих подсказок к дням календаря
     * @param {Object} calendar - Экземпляр FullCalendar
     */
    function addTooltipsToCalendarDays(calendar) {
        // Получаем все события календаря
        const events = calendar.getEvents();
        
        // Группируем события по датам
        const eventsByDate = {};
        
        // Добавляем данные о праздничных днях
        const holidayDates = {
            '2025-05-01': 'День единства народа Казахстана',
            '2025-05-07': 'День защитника Отечества',
            '2025-05-09': 'День Победы'
        };
        
        // Обрабатываем обычные события из календаря
        events.forEach(event => {
            const eventStart = event.start;
            
            // Если нет даты начала, пропускаем
            if (!eventStart) return;
            
            // Форматируем дату в YYYY-MM-DD
            const dateStr = eventStart.toISOString().split('T')[0];
            
            // Инициализируем массив событий для этой даты, если его еще нет
            if (!eventsByDate[dateStr]) {
                eventsByDate[dateStr] = [];
            }
            
            // Добавляем событие в список
            eventsByDate[dateStr].push({
                title: event.title,
                type: event.classNames && event.classNames.includes('thin-event') ? 'session' : 'regular',
                time: eventStart.toTimeString().substring(0, 5) // Формат HH:MM
            });
        });
        
        // Добавляем праздничные дни в общий список событий
        Object.keys(holidayDates).forEach(dateStr => {
            if (!eventsByDate[dateStr]) {
                eventsByDate[dateStr] = [];
            }
            
            // Добавляем праздник в начало списка событий
            eventsByDate[dateStr].unshift({
                title: holidayDates[dateStr],
                type: 'holiday'
            });
        });
        
        // Добавляем всплывающие подсказки ко всем дням с событиями
        Object.keys(eventsByDate).forEach(dateStr => {
            const dayEvents = eventsByDate[dateStr];
            if (dayEvents.length > 0) {
                const dateCell = document.querySelector(`.fc-daygrid-day[data-date="${dateStr}"]`);
                if (dateCell) {
                    dateCell.classList.add('has-tooltip');
                    
                    // Создаем содержимое всплывающей подсказки
                    const tooltip = document.createElement('div');
                    tooltip.className = 'day-tooltip';
                    
                    // Добавляем заголовок с датой
                    const date = new Date(dateStr);
                    const formattedDate = date.toLocaleDateString('ru-RU', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    });
                    
                    const tooltipHeader = document.createElement('h4');
                    tooltipHeader.textContent = `События на ${formattedDate}`;
                    tooltip.appendChild(tooltipHeader);
                    
                    // Добавляем список событий
                    const eventsList = document.createElement('ul');
                    dayEvents.forEach(event => {
                        const eventItem = document.createElement('li');
                        eventItem.className = `${event.type}-event`;
                        
                        if (event.time) {
                            eventItem.textContent = `${event.title} (${event.time})`;
                        } else {
                            eventItem.textContent = event.title;
                        }
                        
                        eventsList.appendChild(eventItem);
                    });
                    tooltip.appendChild(eventsList);
                    
                    // Добавляем всплывающую подсказку к ячейке
                    dateCell.appendChild(tooltip);
                    
                    // Добавляем обработчики событий для показа/скрытия подсказки с адаптивным позиционированием
                    dateCell.addEventListener('mouseenter', function() {
                        // Показываем сначала невидимо, чтобы вычислить размеры
                        tooltip.style.visibility = 'hidden';
                        tooltip.style.display = 'block';
                        
                        // Получаем размеры и позиции
                        const tooltipRect = tooltip.getBoundingClientRect();
                        const cellRect = dateCell.getBoundingClientRect();
                        const calendarRect = document.getElementById('calendar').getBoundingClientRect();
                        const viewportHeight = window.innerHeight;
                        const viewportWidth = window.innerWidth;
                        
                        // Для дат в нижней половине календаря приоритетно показываем тултип сверху
                        const isInLowerHalf = cellRect.top > calendarRect.top + (calendarRect.height / 2);
                        
                        // Выбираем вертикальное положение (сверху или снизу)
                        let position = 'bottom';
                        if (isInLowerHalf || (viewportHeight - cellRect.bottom < tooltipRect.height && cellRect.top > tooltipRect.height)) {
                            position = 'top';
                        }
                        
                        // Выбираем горизонтальное положение (по центру, справа или слева)
                        let alignment = 'center';
                        if (cellRect.left + (tooltipRect.width / 2) > viewportWidth) {
                            alignment = 'right';
                        } else if (cellRect.left - (tooltipRect.width / 2) < 0) {
                            alignment = 'left';
                        }
                        
                        // Очищаем предыдущие классы позиционирования
                        tooltip.classList.remove('position-top', 'position-bottom', 'align-left', 'align-center', 'align-right');
                        
                        // Добавляем нужные классы
                        tooltip.classList.add(`position-${position}`, `align-${alignment}`);
                        
                        // Делаем подсказку видимой после настройки позиции
                        tooltip.style.visibility = 'visible';
                    });
                    
                    dateCell.addEventListener('mouseleave', function() {
                        tooltip.style.display = 'none';
                    });
                }
            }
        });
    }
    
    // При изменении размера окна обновляем всплывающие подсказки
    window.addEventListener('resize', function() {
        // Удаляем старые подсказки и создаем новые
        setTimeout(() => {
            document.querySelectorAll('.day-tooltip').forEach(tooltip => tooltip.remove());
            addAsterisksToEvents(calendar);
            addTooltipsToCalendarDays(calendar);
        }, 100);
    });
    
    // Настройка кнопок навигации календаря
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');
    const currentMonthEl = document.getElementById('currentMonth');
    
    if (prevMonthBtn && nextMonthBtn && currentMonthEl) {
        // Переход на предыдущий месяц
        prevMonthBtn.addEventListener('click', function() {
            calendar.prev();
            updateMonthDisplay();
            
            // Обновляем подсказки при смене месяца
            setTimeout(() => {
                document.querySelectorAll('.day-tooltip').forEach(tooltip => tooltip.remove());
                addAsterisksToEvents(calendar);
                addTooltipsToCalendarDays(calendar);
            }, 100);
        });
        
        // Переход на следующий месяц
        nextMonthBtn.addEventListener('click', function() {
            calendar.next();
            updateMonthDisplay();
            
            // Обновляем подсказки при смене месяца
            setTimeout(() => {
                document.querySelectorAll('.day-tooltip').forEach(tooltip => tooltip.remove());
                addAsterisksToEvents(calendar);
                addTooltipsToCalendarDays(calendar);
            }, 100);
        });
        
        /**
         * Функция для обновления заголовка с названием месяца и годом
         */
        function updateMonthDisplay() {
            const date = calendar.getDate();
            const locale = 'ru';
            
            // Форматирование месяца и года
            const monthName = date.toLocaleString(locale, { month: 'long' });
            const year = date.getFullYear();
            
            // Установка заголовка с учетом склонения в русском языке
            let formattedMonth = monthName.charAt(0).toUpperCase() + monthName.slice(1);
            currentMonthEl.textContent = `${formattedMonth} ${year}`;
        }
        
        // Инициализация заголовка при загрузке
        updateMonthDisplay();
    }
}

/**
 * Добавляет интерактивность к новостным блокам
 * Создает эффекты при наведении и взаимодействии
 */
function initNewsItems() {
    const newsItems = document.querySelectorAll('.news-item');
    
    newsItems.forEach(item => {
        // Добавляем анимацию при наведении
        item.addEventListener('mouseenter', function() {
            newsItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.style.opacity = '0.7';
                    otherItem.style.transform = 'scale(0.98)';
                }
            });
        });
        
        // Возвращаем исходное состояние при убирании курсора
        item.addEventListener('mouseleave', function() {
            newsItems.forEach(otherItem => {
                otherItem.style.opacity = '';
                otherItem.style.transform = '';
            });
        });
    });
}

/**
 * Инициализирует анимацию счетчиков статистики
 * Запускает счетчики при прокрутке до блока статистики
 */
function initStatsCounter() {
    const stats = document.querySelectorAll('.stat-number');
    let counted = false;
                        
    /**
     * Функция анимации счетчика
     * @param {Element} target - Целевой элемент для анимации
     * @param {number} start - Начальное значение
     * @param {number} end - Конечное значение
     * @param {number} duration - Длительность анимации в мс
     */
    function animateCounter(target, start, end, duration) {
        let startTime = null;
        
        // Функция анимации
        function animation(currentTime) {
            if (!startTime) startTime = currentTime;
            const progress = Math.min((currentTime - startTime) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            target.textContent = value;
            
            if (progress < 1) {
                window.requestAnimationFrame(animation);
            }
        }
        
        window.requestAnimationFrame(animation);
    }
    
    /**
     * Проверяет, виден ли блок статистики в области просмотра
     * и запускает анимацию при необходимости
     */
    function checkScroll() {
        if (counted) return;
        
        const windowHeight = window.innerHeight;
        const statsSection = document.querySelector('.stats');
        
        if (!statsSection) return;
        
        const statsSectionTop = statsSection.getBoundingClientRect().top;
        const statsSectionBottom = statsSection.getBoundingClientRect().bottom;
        
        if (statsSectionTop < windowHeight && statsSectionBottom > 0) {
            counted = true;
            
            stats.forEach(stat => {
                const target = parseInt(stat.textContent, 10);
                animateCounter(stat, 0, target, 2000);
            });
        }
    }
    
    // Добавляем обработчик прокрутки
    window.addEventListener('scroll', checkScroll);
                            
    // Проверяем при начальной загрузке
    checkScroll();
}

/**
 * Инициализирует эффекты при наведении на блоки школ
 */
function initSchoolsHover() {
    const schools = document.querySelectorAll('.school');
    
    schools.forEach(school => {
        // Затемняем другие школы при наведении на одну
        school.addEventListener('mouseenter', function() {
            schools.forEach(s => {
                if (s !== school) {
                    s.style.opacity = '0.6';
                }
            });
        });
        
        // Возвращаем исходное состояние при убирании курсора
        school.addEventListener('mouseleave', function() {
            schools.forEach(s => {
                s.style.opacity = '';
            });
        });
    });
}

/**
 * Инициализирует анимацию при прокрутке новостных блоков
 * Новости открываются при достижении середины экрана
 */
function initNewsScrollAnimation() {
    const newsItems = document.querySelectorAll('.news-item');
    
    /**
     * Обновляет состояние анимации новостных блоков при прокрутке
     */
    function updateNewsAnimation() {
        newsItems.forEach((item) => {
            const rect = item.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            const middleScreen = windowHeight / 2;
            
            // Проверяем, достигла ли верхняя часть новости середины экрана
            // и нижняя часть все еще видна
            if (rect.top <= middleScreen && rect.bottom >= 0) {
                // Элемент виден и верхняя часть достигла середины экрана
                item.style.setProperty('--open-progress', '1');
            } else {
                // Элемент не виден или верхняя часть еще не достигла середины
                item.style.setProperty('--open-progress', '0');
            }
        });
    }
    
    // Первоначальное обновление анимации
    updateNewsAnimation();
    
    // Обновление при прокрутке
    window.addEventListener('scroll', updateNewsAnimation);
} 