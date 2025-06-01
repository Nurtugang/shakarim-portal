document.addEventListener('DOMContentLoaded', function() {
    initCalendar();
});


function initCalendar() {
    const calendarEl = document.getElementById('calendar');
    if (!calendarEl) return;

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: '2025-06-01',
        headerToolbar: false,
        locale: 'ru',
        height: 'auto',
        expandRows: true,
        fixedWeekCount: false,
        dayCellDidMount: function(info) {
            const date = info.date;
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();
            // Июньские праздники
            if (year === 2025 && month === 6) {
                if (day === 1) {
                    const dayNumberEl = info.el.querySelector('.fc-daygrid-day-number');
                    dayNumberEl.classList.add('holiday-circle', 'green-circle');
                    dayNumberEl.setAttribute('data-holiday', 'День защиты детей');
                    dayNumberEl.style.cursor = 'default';
                }
            }
        },
        events: [
            // Прием документов (длительные события, с понедельника по воскресенье)
            {
                title: 'Прием документов',
                start: '2025-06-02',
                end: '2025-06-09',
                color: '#4285F4',
                classNames: ['thin-event']
            },
            {
                title: 'Прием документов',
                start: '2025-06-09',
                end: '2025-06-16',
                color: '#4285F4',
                classNames: ['thin-event']
            },
            {
                title: 'Прием документов',
                start: '2025-06-16',
                end: '2025-06-23',
                color: '#4285F4',
                classNames: ['thin-event']
            },
            {
                title: 'Прием документов',
                start: '2025-06-23',
                end: '2025-06-30',
                color: '#4285F4',
                classNames: ['thin-event']
            },
            // Отдельные события (с астериском)
            {
                title: 'День открытых дверей',
                start: '2025-06-05T10:00:00',
                display: 'background',
                classNames: ['event-with-asterisk']
            },
            {
                title: 'Мастер-класс для абитуриентов',
                start: '2025-06-12T14:30:00',
                display: 'background',
                classNames: ['event-with-asterisk']
            },
            {
                title: 'Встреча с деканами',
                start: '2025-06-20T11:00:00',
                display: 'background',
                classNames: ['event-with-asterisk']
            },
            {
                title: 'Семинар по поступлению',
                start: '2025-06-25T15:00:00',
                display: 'background',
                classNames: ['event-with-asterisk']
            }
        ],
        eventClick: function(info) {
            // Prevent default navigation action
            info.jsEvent.preventDefault();
            return false;
        }
    });
    calendar.render();
    setTimeout(() => {
        addAsterisksToEvents(calendar);
        addTooltipsToCalendarDays(calendar);
        
        // Disable all links in the calendar after rendering
        disableCalendarLinks();
    }, 100);
    
    function disableCalendarLinks() {
        // Find all links and clickable elements in the calendar
        const calendarLinks = calendarEl.querySelectorAll('a');
        calendarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                return false;
            });
            link.style.cursor = 'default';
            link.removeAttribute('href');
        });
    }
    
    function addAsterisksToEvents(calendar) {
        const events = calendar.getEvents();
        const eventDates = {};
        events.forEach(event => {
            if (event.display === 'background' && event.classNames.includes('event-with-asterisk')) {
                const eventDate = event.startStr.split('T')[0];
                eventDates[eventDate] = true;
            }
        });
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
                }
            }
        });
    }
    function addTooltipsToCalendarDays(calendar) {
        const events = calendar.getEvents();
        const eventsByDate = {};
        const holidayDates = {
            '2025-06-01': 'День защиты детей'
        };
        events.forEach(event => {
            const eventStart = event.start;
            if (!eventStart) return;
            const dateStr = eventStart.toISOString().split('T')[0];
            if (!eventsByDate[dateStr]) {
                eventsByDate[dateStr] = [];
            }
            eventsByDate[dateStr].push({
                title: event.title,
                type: event.classNames && event.classNames.includes('thin-event') ? 'session' : 'regular',
                time: eventStart.toTimeString().substring(0, 5)
            });
        });
        Object.keys(holidayDates).forEach(dateStr => {
            if (!eventsByDate[dateStr]) {
                eventsByDate[dateStr] = [];
            }
            eventsByDate[dateStr].unshift({
                title: holidayDates[dateStr],
                type: 'holiday'
            });
        });
        Object.keys(eventsByDate).forEach(dateStr => {
            const dayEvents = eventsByDate[dateStr];
            if (dayEvents.length > 0) {
                const dateCell = document.querySelector(`.fc-daygrid-day[data-date="${dateStr}"]`);
                if (dateCell) {
                    dateCell.classList.add('has-tooltip');
                    const tooltip = document.createElement('div');
                    tooltip.className = 'day-tooltip';
                    const date = new Date(dateStr);
                    const formattedDate = date.toLocaleDateString('ru-RU', { day: 'numeric', month: 'long', year: 'numeric' });
                    const tooltipHeader = document.createElement('h4');
                    tooltipHeader.textContent = `События на ${formattedDate}`;
                    tooltip.appendChild(tooltipHeader);
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
                    dateCell.appendChild(tooltip);
                    dateCell.addEventListener('mouseenter', function() {
                        tooltip.style.visibility = 'hidden';
                        tooltip.style.display = 'block';
                        const tooltipRect = tooltip.getBoundingClientRect();
                        const cellRect = dateCell.getBoundingClientRect();
                        const calendarRect = document.getElementById('calendar').getBoundingClientRect();
                        const viewportHeight = window.innerHeight;
                        const viewportWidth = window.innerWidth;
                        const isInLowerHalf = cellRect.top > calendarRect.top + (calendarRect.height / 2);
                        let position = 'bottom';
                        if (isInLowerHalf || (viewportHeight - cellRect.bottom < tooltipRect.height && cellRect.top > tooltipRect.height)) {
                            position = 'top';
                        }
                        let alignment = 'center';
                        if (cellRect.left + (tooltipRect.width / 2) > viewportWidth) {
                            alignment = 'right';
                        } else if (cellRect.left - (tooltipRect.width / 2) < 0) {
                            alignment = 'left';
                        }
                        tooltip.classList.remove('position-top', 'position-bottom', 'align-left', 'align-center', 'align-right');
                        tooltip.classList.add(`position-${position}`, `align-${alignment}`);
                        tooltip.style.visibility = 'visible';
                    });
                    dateCell.addEventListener('mouseleave', function() {
                        tooltip.style.display = 'none';
                    });
                }
            }
        });
    }
    window.addEventListener('resize', function() {
        setTimeout(() => {
            document.querySelectorAll('.day-tooltip').forEach(tooltip => tooltip.remove());
            addAsterisksToEvents(calendar);
            addTooltipsToCalendarDays(calendar);
        }, 100);
    });
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');
    const currentMonthEl = document.getElementById('currentMonth');
    if (prevMonthBtn && nextMonthBtn && currentMonthEl) {
        prevMonthBtn.addEventListener('click', function() {
            calendar.prev();
            updateMonthDisplay();
            setTimeout(() => {
                document.querySelectorAll('.day-tooltip').forEach(tooltip => tooltip.remove());
                addAsterisksToEvents(calendar);
                addTooltipsToCalendarDays(calendar);
            }, 100);
        });
        nextMonthBtn.addEventListener('click', function() {
            calendar.next();
            updateMonthDisplay();
            setTimeout(() => {
                document.querySelectorAll('.day-tooltip').forEach(tooltip => tooltip.remove());
                addAsterisksToEvents(calendar);
                addTooltipsToCalendarDays(calendar);
            }, 100);
        });
        function updateMonthDisplay() {
            const date = calendar.getDate();
            const locale = 'ru';
            const monthName = date.toLocaleString(locale, { month: 'long' });
            const year = date.getFullYear();
            let formattedMonth = monthName.charAt(0).toUpperCase() + monthName.slice(1);
            currentMonthEl.textContent = `${formattedMonth} ${year}`;
        }
        updateMonthDisplay();
    }
}