<x-layout :meta-title="$news->meta_title" :meta-description="$news->description">
    @push('styles')
        <link rel="stylesheet" href="{{ asset("css/newspage.css") }}">
    @endpush
    
    <main class="page-wrapper">
        <div class="content-container">
            <!-- Фото новости вместо баннера -->
            <div class="news-featured-image">
                <img src="{{ $news->getPhoto() }}" alt="{{ $news->{'title_'.app()->getLocale()} }}">
            </div>

            <!-- Основной контент новости -->
            <div class="article-wrapper">
                <div class="article-meta">
                    <div class="article-author">
                        <i class="fas fa-user"></i>
                        <span>{{ __('Пресс-служба') }}</span>
                    </div>
                    <div class="article-date">
                        <i class="far fa-calendar-alt"></i>
                        <span>{{ $news->getFormattedDate() }}</span>
                    </div>
                    <div class="article-category">
                        <i class="fas fa-tag"></i>
                        <span>{{ __('Новости') }}</span>
                    </div>
                </div>
                
                <h1 class="article-title">{{ $news->{'title_'.app()->getLocale()} }}</h1>
                
                <div class="article-divider"></div>
                
                <div class="article-content">
                    {!! $news->{'content_'.app()->getLocale()} !!}
                </div>

                <!-- Кнопка "Назад к новостям" -->
                <div class="article-back-navigation">
                    <a href="{{ route('news',['locale'=>app()->getLocale()]) }}" class="back-button">
                        <i class="fas fa-arrow-left"></i> {{ __('Назад к новостям') }}
                    </a>
                </div>
            </div>
        </div>
    </main>

    @push('scripts')
        <script src="{{ asset('js/newspage.js') }}"></script>
    @endpush
</x-layout>