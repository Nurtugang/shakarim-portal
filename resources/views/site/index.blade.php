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
</section>

<!-- Каталог -->
<section class="catalog">
    <div class="catalog-grid">
        <div class="catalog-item">
            <a href="/{{ app()->getLocale() }}/structure/shakarim-high-school" class="catalog-link">
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
            <a href="/{{ app()->getLocale() }}/page/abiturientterge" class="catalog-link">
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
            <a href="/{{ app()->getLocale() }}/page/schools" class="catalog-link">
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
            <a href="/{{ app()->getLocale() }}/page/schools" class="catalog-link">
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
    @if($schools)
        {!! tiptap_converter()->asHTML($schools->{'content_'.app()->getLocale()}) !!}
    @else
        <p>Контент пока не добавлен</p>
    @endif
</section>


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
        </div>

        <div class="news-all-btn-container">
            <a href="{{ route('news', ['locale' => app()->getLocale()]) }}" class="news-all-btn">Все новости</a>
        </div>
    </div>
</section>

</x-layout>