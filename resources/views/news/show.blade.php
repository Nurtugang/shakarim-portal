<x-layout  :meta-title="$news->meta_title" :meta-description="$news->description">
@push('styles')
<link rel="stylesheet" href="{{ asset("css/content.css") }}">
@endpush
   <main class="page-wrapper">
    <div class="content-container">
        <!-- Баннер страницы -->
        

        <x-page-banner banner="/img/building.webp" text="Жаңалықтар" sub-text=""></x-page-banner>

        <!-- Основная сетка контента -->
        <div class="content-grid">
            <!-- Боковая навигация -->
             <div class="sidebar-nav animate-fade-in-up">
                <ul>
                    <li><a href="{{ route('news',['locale'=>app()->getLocale()]) }}">Жаңалықтар</a></li>
                </ul>
            </div>
            
            <!-- Основной контент -->
            <div class="main-content animate-fade-in-down">
                <h1>{{ $news->{'title_'.app()->getLocale()} }}</h1>

                 <div class="my-4">
                        <img class="w-full rounded-3xl" src="{{ $news->getPhoto() }}" alt="news">
                    </div>
                <div class="mb-10">
                <p class="font-sf opacity-60 text-sm">{{ $news->getFormattedDate() }}</p>
                    <div class="tiptap-content font-sf text-xl">
                        {!! $news->{'content_'.app()->getLocale()} !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@push('scripts')
<script src="/js/content.js"></script>
<script src="{{ asset("/js/swiper-bundle.min.js") }}"></script>
        <script>

            var swiper = new Swiper('.slider', {

                spaceBetween: 30,
                slidesPerView: 1,
                loop: true,
                // autoplay: {
                //   delay: 2000,
                // },
                mousewheel: true,
                grabCursor: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

        </script>
@endpush
</x-layout>