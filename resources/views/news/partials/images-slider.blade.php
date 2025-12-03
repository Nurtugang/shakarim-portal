
@php
    $images = $images ?? ($news->images ?? collect());
@endphp

@if($images->count() > 0)
    <style>
        .custom-slider-news { position: relative; overflow: hidden; border-radius: 1rem; background: #f8fafc; }
        .custom-slider-news .slide { display: none; align-items: center; justify-content: center; height: 420px; transition: opacity 0.5s; }
        .custom-slider-news .slide.active { display: flex; animation: fadeIn 0.7s; }
        .custom-slider-news .slide img { max-height: 400px; width: auto; max-width: 100%; border-radius: 1rem; box-shadow: 0 4px 24px 0 #0001; }
        .custom-slider-news .slide-title { position: absolute; bottom: 1.5rem; left: 50%; transform: translateX(-50%); background: rgba(255,255,255,0.92); padding: 0.5rem 1.5rem; border-radius: 0.75rem; font-size: 1rem; font-weight: 500; color: #1e293b; box-shadow: 0 2px 8px #0001; }
        .custom-slider-news .arrow-btn { position: absolute; top: 50%; transform: translateY(-50%); background: #fff; color: #334155; border: none; border-radius: 50%; width: 44px; height: 44px; font-size: 1.5rem; box-shadow: 0 2px 8px #0002; display: flex; align-items: center; justify-content: center; cursor: pointer; opacity: 0.92; transition: background 0.2s, color 0.2s; z-index: 10; }
        .custom-slider-news .arrow-btn:hover { background: #2563eb; color: #fff; }
        .custom-slider-news .arrow-btn.left { left: 1rem; }
        .custom-slider-news .arrow-btn.right { right: 1rem; }
        .custom-slider-news .slider-dots { position: absolute; bottom: 1rem; left: 50%; transform: translateX(-50%); display: flex; gap: 0.5rem; z-index: 10; }
        .custom-slider-news .slider-dot { width: 12px; height: 12px; border-radius: 50%; background: #cbd5e1; border: 2px solid #fff; cursor: pointer; transition: background 0.2s, border 0.2s; }
        .custom-slider-news .slider-dot.active { background: #2563eb; border-color: #2563eb; }
        @media (max-width: 600px) {
            .custom-slider-news .slide { height: 220px; }
            .custom-slider-news .slide img { max-height: 200px; }
            .custom-slider-news .slide-title { font-size: 0.92rem; padding: 0.4rem 1rem; }
            .custom-slider-news .arrow-btn { width: 36px; height: 36px; font-size: 1.1rem; }
        }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    </style>
    <div class="custom-slider-news">
        @foreach($images as $i => $img)
            @php $filename = is_string($img->image) ? basename($img->image) : $img->image; @endphp
            <div class="slide @if($i === 0) active @endif">
                <img src="/storage/news/images/{{ $filename }}" alt="{{ $img->title ?? $news->locale_title }}">
                @if($img->title)
                    <div class="slide-title">{{ $img->title }}</div>
                @endif
            </div>
        @endforeach
        @if($images->count() > 1)
            <button class="arrow-btn left" type="button" aria-label="Назад" onclick="newsSliderPrev(this)"><svg width="20" height="20" fill="none" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
            <button class="arrow-btn right" type="button" aria-label="Вперёд" onclick="newsSliderNext(this)"><svg width="20" height="20" fill="none" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
            <div class="slider-dots">
                @foreach($images as $i => $img)
                    <div class="slider-dot @if($i === 0) active @endif" onclick="newsSliderGoTo(this, {{ $i }})"></div>
                @endforeach
            </div>
        @endif
    </div>
    <script>
        // Универсальный слайдер для каждой галереи на странице
        function getSliderElements(btn) {
            let slider = btn.closest('.custom-slider-news');
            return {
                slider,
                slides: slider.querySelectorAll('.slide'),
                dots: slider.querySelectorAll('.slider-dot'),
            };
        }
        function newsSliderShow(slider, idx) {
            let slides = slider.querySelectorAll('.slide');
            let dots = slider.querySelectorAll('.slider-dot');
            slides.forEach((el, i) => {
                el.classList.toggle('active', i === idx);
            });
            dots.forEach((el, i) => {
                el.classList.toggle('active', i === idx);
            });
            slider.dataset.active = idx;
        }
        function newsSliderPrev(btn) {
            let {slider, slides} = getSliderElements(btn);
            let idx = parseInt(slider.dataset.active || 0);
            idx = (idx - 1 + slides.length) % slides.length;
            newsSliderShow(slider, idx);
        }
        function newsSliderNext(btn) {
            let {slider, slides} = getSliderElements(btn);
            let idx = parseInt(slider.dataset.active || 0);
            idx = (idx + 1) % slides.length;
            newsSliderShow(slider, idx);
        }
        function newsSliderGoTo(dot, idx) {
            let slider = dot.closest('.custom-slider-news');
            newsSliderShow(slider, idx);
        }
        // Инициализация (фикс для SSR)
        document.querySelectorAll('.custom-slider-news').forEach(function(slider){
            slider.dataset.active = 0;
        });
    </script>
@endif
