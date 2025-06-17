<x-layout>
<!-- Героическая секция -->
<section class="hero">
    <div class="hero-content">
        
        {!! tiptap_converter()->asHTML($welcome->{'content_'.app()->getLocale()}) !!}
        <div class="hero-visual">
            {!! tiptap_converter()->asHTML($card->{'content_'.app()->getLocale()}) !!}
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
        
        <div class="catalog-item">
            <a href="#" class="catalog-link">
                <div class="catalog-bg"></div>
                <div class="catalog-overlay"></div>
                <div class="catalog-title">Серебряный университет</div>
                <div class="catalog-content">
                    <div class="catalog-separator"></div>
                    <div class="catalog-text">На базе Университета Шакарима создана новая форма деятельности направленная на повышение качества жизни граждан взрослого поколения.</div>
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
        </div>
        
        <div class="schools-grid">
            <div class="school animate-on-scroll">
                <a href="#" style="text-decoration: none; color: inherit;">
                    <div class="school-icon"><i class="fas fa-flask"></i></div>
                    <div class="school-name">Исследовательская школа пищевой инженерии</div>
                </a>
            </div>
            
            <div class="school animate-on-scroll">
                <a href="#" style="text-decoration: none; color: inherit;">
                    <div class="school-icon"><i class="fas fa-leaf"></i></div>
                    <div class="school-name">Исследовательская школа ветеринарии и сельского хозяйства</div>
                </a>
            </div>
            
            <div class="school animate-on-scroll">
                <a href="#" style="text-decoration: none; color: inherit;">
                    <div class="school-icon"><i class="fas fa-microchip"></i></div>
                    <div class="school-name">Высшая школа искусственного интеллекта и строительства</div>
                </a>
            </div>
            
            <div class="school animate-on-scroll">
                <a href="#" style="text-decoration: none; color: inherit;">
                    <div class="school-icon"><i class="fas fa-university"></i></div>
                    <div class="school-name">Высший колледж Шакарима</div>
                </a>
            </div>
            
            <div class="school animate-on-scroll">
                <a href="#" style="text-decoration: none; color: inherit;">
                    <div class="school-icon"><i class="fas fa-book"></i></div>
                    <div class="school-name">Высшая школа филологии</div>
                </a>
            </div>
            
            <div class="school animate-on-scroll">
                <a href="#" style="text-decoration: none; color: inherit;">
                    <div class="school-icon"><i class="fas fa-calculator"></i></div>
                    <div class="school-name">Высшая школа физико-математических наук</div>
                </a>
            </div>
            
            <div class="school animate-on-scroll">
                <a href="#" style="text-decoration: none; color: inherit;">
                    <div class="school-icon"><i class="fas fa-atom"></i></div>
                    <div class="school-name">Высшая школа естественных наук</div>
                </a>
            </div>
            
            <div class="school animate-on-scroll">
                <a href="#" style="text-decoration: none; color: inherit;">
                    <div class="school-icon"><i class="fas fa-graduation-cap"></i></div>
                    <div class="school-name">Высшая школа образования</div>
                </a>
            </div>
            
            <div class="school animate-on-scroll">
                <a href="#" style="text-decoration: none; color: inherit;">
                    <div class="school-icon"><i class="fas fa-school"></i></div>
                    <div class="school-name">Shakarim High School</div>
                </a>
            </div>
            
            <div class="school animate-on-scroll">
                <a href="#" style="text-decoration: none; color: inherit;">
                    <div class="school-icon"><i class="fas fa-vial"></i></div>
                    <div class="school-name">Исследовательская школа физических и химических наук</div>
                </a>
            </div>
            
            <div class="school animate-on-scroll">
                <a href="#" style="text-decoration: none; color: inherit;">
                    <div class="school-icon"><i class="fas fa-chart-line"></i></div>
                    <div class="school-name">Высшая школа бизнеса</div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Новости -->
<!-- Новости -->
<section class="news">
<div class="news-container">
    <div class="section-title animate-on-scroll">
        <h2>Последние новости</h2>
        <p>Будьте в курсе событий университетской жизни</p>
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
        <a href="#" class="news-all-btn">Все новости</a>
    </div>
</div>
</section>

</x-layout>