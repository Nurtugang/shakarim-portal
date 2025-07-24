<x-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset("css/news.css") }}">
    @endpush
    
    <main class="page-wrapper">
        <div class="content-container">
            <!-- Новости вместо баннера -->
            <div class="news-section">
                @if($news->count() > 0)
                    <!-- Большая новость -->
                    <div class="news-item news-item-large">
                        <div class="news-image">
                            <img src="{{ $news->first()->getPhoto() }}" alt="{{ $news->first()->{'title_'.app()->getLocale()} }}">
                            <div class="news-overlay">
                                <h2>{{ $news->first()->{'title_'.app()->getLocale()} }}</h2>
                                <div class="news-date">{{ $news->first()->getFormattedDate() }}</div>
                            </div>
                        </div>
                    </div>
                    
                    @if($news->count() > 2)
                        <!-- Две меньшие новости -->
                        <div class="news-row">
                            <div class="news-item news-item-small">
                                <div class="news-image">
                                    <img src="{{ $news->skip(1)->first()->getPhoto() }}" alt="{{ $news->skip(1)->first()->{'title_'.app()->getLocale()} }}">
                                    <div class="news-overlay">
                                        <h3>{{ $news->skip(1)->first()->{'title_'.app()->getLocale()} }}</h3>
                                        <div class="news-date">{{ $news->skip(1)->first()->getFormattedDate() }}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="news-item news-item-small">
                                <div class="news-image">
                                    <img src="{{ $news->skip(2)->first()->getPhoto() }}" alt="{{ $news->skip(2)->first()->{'title_'.app()->getLocale()} }}">
                                    <div class="news-overlay">
                                        <h3>{{ $news->skip(2)->first()->{'title_'.app()->getLocale()} }}</h3>
                                        <div class="news-date">{{ $news->skip(2)->first()->getFormattedDate() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>

            <!-- Основная сетка контента -->
            <div class="content-grid">
                <!-- Основной контент (теперь слева) -->
                <div class="main-content">
                    <h1>{{ __('Новости университета') }}</h1>
                    
                    <!-- Список новостей -->
                    <div class="news-list">
                        @foreach ($news as $item)
                            <div class="news-list-item">
                                <div class="news-list-image">
                                    <img src="{{ $item->getPhoto() }}" alt="{{ $item->{'title_'.app()->getLocale()} }}">
                                </div>
                                <div class="news-list-content">
                                    <h3>
                                        <a href="{{ route('news.show',['locale'=>app()->getLocale(),'news'=>$item]) }}">
                                            {{ $item->{'title_'.app()->getLocale()} }}
                                        </a>
                                    </h3>
                                    <div class="news-list-date">{{ $item->getFormattedDate() }}</div>
                                    <div class="news-list-excerpt">
                                        {{ $item->shortBody(20) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Пагинация -->
                    <div class="pagination">
                        @if ($news->hasPages())
                            <div class="pagination">
                                {{-- Previous Page Link --}}
                                @if ($news->onFirstPage())
                                    <span class="prev-next disabled"><i class="fas fa-chevron-left"></i></span>
                                @else
                                    <a href="{{ $news->appends(request()->query())->previousPageUrl() }}" class="prev-next">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                @endif

                                {{-- Pagination Elements --}}
                                @if($news->currentPage() > 3)
                                    <a href="{{ $news->appends(request()->query())->url(1) }}">1</a>
                                    @if($news->currentPage() > 4)
                                        <span class="disabled">...</span>
                                    @endif
                                @endif

                                @for ($i = max(1, $news->currentPage() - 2); $i <= min($news->lastPage(), $news->currentPage() + 2); $i++)
                                    @if ($i == $news->currentPage())
                                        <a href="{{ $news->appends(request()->query())->url($i) }}" class="active">{{ $i }}</a>
                                    @else
                                        <a href="{{ $news->appends(request()->query())->url($i) }}">{{ $i }}</a>
                                    @endif
                                @endfor

                                @if($news->currentPage() < $news->lastPage() - 2)
                                    @if($news->currentPage() < $news->lastPage() - 3)
                                        <span class="disabled">...</span>
                                    @endif
                                    <a href="{{ $news->appends(request()->query())->url($news->lastPage()) }}">{{ $news->lastPage() }}</a>
                                @endif

                                {{-- Next Page Link --}}
                                @if ($news->hasMorePages())
                                    <a href="{{ $news->appends(request()->query())->nextPageUrl() }}" class="prev-next">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                @else
                                    <span class="prev-next disabled"><i class="fas fa-chevron-right"></i></span>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Боковая навигация (теперь справа) -->
                <aside class="sidebar-nav">
                    <ul>
                        <li><a href="{{ route('news',['locale'=>app()->getLocale()]) }}" class="active">{{ __('Все новости') }}</a></li>
                        <li><a href="#">{{ __('Наука и исследования') }}</a></li>
                        <li><a href="#">{{ __('Образование') }}</a></li>
                        <li><a href="#">{{ __('Международные связи') }}</a></li>
                        <li><a href="#">{{ __('Студенческая жизнь') }}</a></li>
                        <li><a href="#">{{ __('Спорт') }}</a></li>
                        <li><a href="#">{{ __('Культурные события') }}</a></li>
                        <li><a href="#">{{ __('Объявления') }}</a></li>
                    </ul>
                </aside>
            </div>
        </div>
        
        <!-- Секция видео -->
        <div class="content-container">
            <div class="video-section-block">
                <div class="video-header">
                    <h2>{{ __('Видео') }}</h2>
                    <div class="video-nav">
                        <button class="video-nav-btn prev">❮</button>
                        <button class="video-nav-btn next">❯</button>
                    </div>
                </div>
                
                <div class="video-grid-wrapper">
                    <div class="video-grid">
                        <!-- Заглушки для видео - позже можно будет добавить модель Video -->
                        @for($i = 1; $i <= 8; $i++)
                            <div class="video-item">
                                <div class="video-thumbnail">
                                    <img src="{{ asset('img/building.webp') }}" alt="Видео {{ $i }}">
                                    <div class="play-button"><i class="fas fa-play"></i></div>
                                </div>
                                <h3>{{ __('Видео университета') }} {{ $i }}</h3>
                                <div class="video-date">{{ now()->subDays($i)->format('d M Y') }}</div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </main>

    @push('scripts')
        <script src="{{ asset('js/news.js') }}"></script>
    @endpush
</x-layout>