<x-layout>
<!-- Героическая секция -->
<section class="hero">
    <div class="hero-content">
        @if($welcome)
            {!! tiptap_converter()->asHTML($welcome->{'content_'.app()->getLocale()}) !!}
        @else
            <p>Контент пока не добавлен</p>
        @endif
        <div class="hero-visual">
            @if($card)
                {!! tiptap_converter()->asHTML($card->{'content_'.app()->getLocale()}) !!}
            @else
                <p>Контент пока не добавлен</p>
            @endif
        </div>
    </div>
</section>

<!-- Статистика -->
<section class="stats">
    <div class="stats-container">
        <div class="section-title animate-on-scroll">
            <h2>Университет в цифрах</h2>
            <p>Наши достижения говорят сами за себя</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card animate-on-scroll">
                <div class="stat-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="stat-number">6692</div>
                <div class="stat-label">Студентов</div>
            </div>

            <div class="stat-card animate-on-scroll">
                <div class="stat-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="stat-number">354</div>
                <div class="stat-label">ППС</div>
            </div>

            <div class="stat-card animate-on-scroll">
                <div class="stat-icon">
                    <i class="fas fa-building"></i>
                </div>
                <div class="stat-number">9</div>
                <div class="stat-label">Корпусов</div>
            </div>

            <div class="stat-card animate-on-scroll">
                <div class="stat-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="stat-number">5</div>
                <div class="stat-label">Общежитий</div>
            </div>
        </div>
    </div>
    <h2 class="catalog-heading">Что мы можем предложить?</h2>
</section>

<!-- Каталог -->
<section class="catalog">

    <div class="catalog-grid">
        <div class="catalog-item">
            <a href="#" class="catalog-link">
                <div class="catalog-bg"></div>
                <div class="catalog-overlay"></div>
                <div class="catalog-title">Школьникам</div>
                <div class="catalog-content">
                    <div class="catalog-separator"></div>
                    <div class="catalog-text">Наша цель — заинтересовать детей наукой и показать, что она тоже может быть занимательной и абсолютно доступной.</div>
                </div>
            </a>
        </div>

        <div class="catalog-item">
            <a href="#" class="catalog-link">
                <div class="catalog-bg"></div>
                <div class="catalog-overlay"></div>
                <div class="catalog-title">Поступающим</div>
                <div class="catalog-content">
                    <div class="catalog-separator"></div>
                    <div class="catalog-text">Если вы хотите приобрести востребованную, гарантирующую стабильный доход специальность, наши двери открыты для вас!</div>
                </div>
            </a>
        </div>

        <div class="catalog-item">
            <a href="#" class="catalog-link">
                <div class="catalog-bg"></div>
                <div class="catalog-overlay"></div>
                <div class="catalog-title">Обучающимся</div>
                <div class="catalog-content">
                    <div class="catalog-separator"></div>
                    <div class="catalog-text">Вы имеете возможность ознакомиться с информацией, касающейся Вашей академической деятельности, найдете ответы на вопросы о студенческой жизни.</div>
                </div>
            </a>
        </div>

        <div class="catalog-item">
            <a href="#" class="catalog-link">
                <div class="catalog-bg"></div>
                <div class="catalog-overlay"></div>
                <div class="catalog-title">Выпускникам</div>
                <div class="catalog-content">
                    <div class="catalog-separator"></div>
                    <div class="catalog-text">Одной из задач Университета Шакарима является обеспечение конкурентоспособности выпускников. Мы заинтересованы в сотрудничестве с вами.</div>
                </div>
            </a>
        </div>

        <div class="catalog-item">
            <a href="#" class="catalog-link">
                <div class="catalog-bg"></div>
                <div class="catalog-overlay"></div>
                <div class="catalog-title">Работодателям</div>
                <div class="catalog-content">
                    <div class="catalog-separator"></div>
                    <div class="catalog-text">Мы предлагаем Вам различные формы сотрудничества такие как подбор соискателей на вакантные места, организация встреч с обучающимися.</div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Школы -->
<section class="schools">
     <div class="schools-container">
        <div class="section-title animate-on-scroll">
            <h2>Школы</h2>
            <p>Ведущие образовательные подразделения университета</p>
            <p class="flip-hint">Нажмите на карточку или стрелки, чтобы узнать специальности</p>
        </div>

        <div class="schools-grid">
            <!-- Новая карточка школы -->
            <div class="school-card">
                <div class="school-card-inner">
                    <div class="school-card-front">
                        <a href="#" style="text-decoration: none; color: inherit;">
                            <div class="school-icon"><i class="fas fa-flask"></i></div>
                            <div class="school-name">Исследовательская школа пищевой инженерии</div>
                        </a>
                        <div class="card-hint-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>

                    </div>
                    <div class="school-card-back">
                        <div class="school-back-title">Специальности:</div>
                        <ul class="school-back-list">
                            <li>Технология пищевых продуктов</li>
                            <li>Инженерия производства</li>
                            <li>Экологический контроль</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="school-card">
                <div class="school-card-inner">
                    <div class="school-card-front">
                        <a href="#">
                            <div class="school-icon"><i class="fas fa-leaf"></i></div>
                            <div class="school-name">Исследовательская школа ветеринарии и сельского хозяйства</div>
                        </a>
                        <div class="card-hint-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                    </div>
                    <div class="school-card-back">
                        <div class="school-back-title">Специальности:</div>
                        <ul class="school-back-list">
                            <li>Ветеринария</li>
                            <li>Агрономия</li>
                            <li>Зоотехния</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="school-card">
                <div class="school-card-inner">
                    <div class="school-card-front">
                        <a href="#">
                            <div class="school-icon"><i class="fas fa-microchip"></i></div>
                            <div class="school-name">Высшая школа искусственного интеллекта и строительства</div>
                        </a>
                        <div class="card-hint-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                    </div>
                    <div class="school-card-back">
                        <div class="school-back-title">Специальности:</div>
                        <ul class="school-back-list">
                            <li>Искусственный интеллект</li>
                            <li>Строительство</li>
                            <li>Информационные технологии</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Высший колледж Шакарима -->
            <div class="school-card">
                <div class="school-card-inner">
                    <div class="school-card-front">
                        <a href="#">
                            <div class="school-icon"><i class="fas fa-university"></i></div>
                            <div class="school-name">Высший колледж Шакарима</div>
                        </a>
                        <div class="card-hint-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                    </div>
                    <div class="school-card-back">
                        <div class="school-back-title">Специальности:</div>
                        <ul class="school-back-list">
                            <li>Программирование</li>
                            <li>Бухгалтерский учет</li>
                            <li>Туризм</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Высшая школа филологии -->
            <div class="school-card">
                <div class="school-card-inner">
                    <div class="school-card-front">
                        <a href="#">
                            <div class="school-icon"><i class="fas fa-book"></i></div>
                            <div class="school-name">Высшая школа филологии</div>
                        </a>
                        <div class="card-hint-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                    </div>
                    <div class="school-card-back">
                        <div class="school-back-title">Специальности:</div>
                        <ul class="school-back-list">
                            <li>Казахская филология</li>
                            <li>Русская филология</li>
                            <li>Иностранные языки</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Высшая школа физико-математических наук -->
            <div class="school-card">
                <div class="school-card-inner">
                    <div class="school-card-front">
                        <a href="#">
                            <div class="school-icon"><i class="fas fa-calculator"></i></div>
                            <div class="school-name">Высшая школа физико-математических наук</div>
                        </a>
                        <div class="card-hint-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                    </div>
                    <div class="school-card-back">
                        <div class="school-back-title">Специальности:</div>
                        <ul class="school-back-list">
                            <li>Физика</li>
                            <li>Математика</li>
                            <li>Информатика</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Высшая школа естественных наук -->
            <div class="school-card">
                <div class="school-card-inner">
                    <div class="school-card-front">
                        <a href="#">
                            <div class="school-icon"><i class="fas fa-atom"></i></div>
                            <div class="school-name">Высшая школа естественных наук</div>
                        </a>
                        <div class="card-hint-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                    </div>
                    <div class="school-card-back">
                        <div class="school-back-title">Специальности:</div>
                        <ul class="school-back-list">
                            <li>Биология</li>
                            <li>Экология</li>
                            <li>География</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Высшая школа образования -->
            <div class="school-card">
                <div class="school-card-inner">
                    <div class="school-card-front">
                        <a href="#">
                            <div class="school-icon"><i class="fas fa-graduation-cap"></i></div>
                            <div class="school-name">Высшая школа образования</div>
                        </a>
                        <div class="card-hint-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                    </div>
                    <div class="school-card-back">
                        <div class="school-back-title">Специальности:</div>
                        <ul class="school-back-list">
                            <li>Педагогика</li>
                            <li>Психология</li>
                            <li>Дошкольное образование</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Shakarim High School -->
            <div class="school-card">
                <div class="school-card-inner">
                    <div class="school-card-front">
                        <a href="#">
                            <div class="school-icon"><i class="fas fa-school"></i></div>
                            <div class="school-name">Shakarim High School</div>
                        </a>
                        <div class="card-hint-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                    </div>
                    <div class="school-card-back">
                        <div class="school-back-title">Специальности:</div>
                        <ul class="school-back-list">
                            <li>Физика и математика</li>
                            <li>Химия и биология</li>
                            <li>Общая подготовка</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Исследовательская школа физических и химических наук -->
            <div class="school-card">
                <div class="school-card-inner">
                    <div class="school-card-front">
                        <a href="#">
                            <div class="school-icon"><i class="fas fa-vial"></i></div>
                            <div class="school-name">Исследовательская школа физических и химических наук</div>
                        </a>
                        <div class="card-hint-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                    </div>
                    <div class="school-card-back">
                        <div class="school-back-title">Специальности:</div>
                        <ul class="school-back-list">
                            <li>Физика</li>
                            <li>Химия</li>
                            <li>Нанотехнологии</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="school-card">
                <div class="school-card-inner">
                    <div class="school-card-front">
                        <a href="#">
                            <div class="school-icon"><i class="fas fa-chart-line"></i></div>
                            <div class="school-name">Высшая школа бизнеса</div>
                        </a>
                        <div class="card-hint-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                    </div>
                    <div class="school-card-back">
                        <div class="school-back-title">Специальности:</div>
                        <ul class="school-back-list">
                            <li>Менеджмент</li>
                            <li>Маркетинг</li>
                            <li>Финансы</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Новости -->
<!-- Новости -->
<section class="news">
<div class="news-container">
    <div class="section-title animate-on-scroll">
        <h2>{{ __("Latest news") }}</h2>
        <p>{{ __("Stay up to date with university events") }}</p>
    </div>

    <div class="news-grid">
         @foreach ($news as $new)

         <article
         @class([
            'news-card animate-on-scroll',
                    'news-featured' => $loop->first,
                ])>
            <div class="news-image">
                <img src="{{ $new->getPhoto() }}" class="mx-auto h-full object-cover object-top">
            </div>
            <div class="news-content">
                <div class="news-date">{{ $new->getFormattedDate() }}</div>
                <h3 class="news-title">{{ $new->{'title_'.app()->getLocale()} }}</h3>
                <a href="{{ route('news.show', ['locale'=>app()->getLocale(),'news'=>$new->slug]) }}" class="news-link">
                    Читать полностью <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </article>
            @endforeach


        {{-- <article class="news-card animate-on-scroll">
            <div class="news-image" style="background-image: url('https://images.unsplash.com/photo-1581092795442-6d9c7e4b6c8e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80');"></div>
            <div class="news-content">
                <div class="news-date">12 декабря 2024</div>
                <h3 class="news-title">АРА АУРУЛАРЫНЫҢ АЛДЫН АЛУ – ӨЗЕКТІ МӘСЕЛЕ</h3>
                <a href="#" class="news-link">
                    Подробнее <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </article>

        <article class="news-card animate-on-scroll">
            <div class="news-image" style="background-image: url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80');"></div>
            <div class="news-content">
                <div class="news-date">10 декабря 2024</div>
                <h3 class="news-title">ХОРВАТИЯНЫҢ ҚАЗАҚСТАНДАҒЫ ЕЛШІСІ - SHAKARIM UNIVERSITY-ДЕ</h3>
                <a href="#" class="news-link">
                    Подробнее <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </article>

        <article class="news-card animate-on-scroll">
            <div class="news-image" style="background-image: url('https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80');"></div>
            <div class="news-content">
                <div class="news-date">8 декабря 2024</div>
                <h3 class="news-title">Студенческие достижения</h3>
                <a href="#" class="news-link">
                    Подробнее <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </article>
        <article class="news-card animate-on-scroll">
            <div class="news-image" style="background-image: url('https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80');"></div>
            <div class="news-content">
                <div class="news-date">8 декабря 2024</div>
                <h3 class="news-title">Студенческие достижения</h3>
                <a href="#" class="news-link">
                    Подробнее <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </article> --}}
    </div>

    <div class="news-all-btn-container">
        <a href="{{ route('news', ['locale' => app()->getLocale()]) }}" class="news-all-btn pulsing">Все новости</a>
    </div>
</div>
</section>

    <script>
        function handleScrollAnimation() {
            const element = document.querySelector('.catalog-heading');
            const rect = element.getBoundingClientRect();
            const triggerPoint = window.innerHeight * 0.9;

            if (rect.top < triggerPoint) {
                element.classList.add('animate-visible');
                window.removeEventListener('scroll', handleScrollAnimation);
            }
        }

        window.addEventListener('scroll', handleScrollAnimation);
        window.addEventListener('load', handleScrollAnimation); // на случай если уже видно
    </script>

    <script>
        function handleCatalogTextAnimation() {
            const texts = document.querySelectorAll('.catalog-text');
            const triggerBottom = window.innerHeight * 0.9;

            texts.forEach(text => {
                const rect = text.getBoundingClientRect();
                if (rect.top < triggerBottom && !text.classList.contains('visible')) {
                    text.classList.add('visible');
                }
            });
        }

        window.addEventListener('scroll', handleCatalogTextAnimation);
        window.addEventListener('load', handleCatalogTextAnimation);
    </script>

    <script>
        document.querySelectorAll('.school-card').forEach(card => {
            card.addEventListener('click', () => {
                card.classList.toggle('flipped');
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const firstCard = document.querySelector('.school-card');

            if (!firstCard) return;

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        firstCard.classList.add('flipped');
                        setTimeout(() => {
                            firstCard.classList.remove('flipped');
                        }, 2000);
                        observer.unobserve(firstCard); // чтобы сработало только один раз
                    }
                });
            }, {
                threshold: 0.5 // половина карточки должна быть видна
            });

            observer.observe(firstCard);
        });
    </script>



</x-layout>
