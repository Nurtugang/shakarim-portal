<x-layout metaTitle="Страница не найдена">
@push('styles')
<link rel="stylesheet" href="{{ asset('css/404.css') }}">
@endpush

<div class="content-container">
    <div class="error-404-layout">
        <div class="error-404-text">
            <h1 class="error-404-title">404</h1>
            <p class="error-404-message">
                Страница не найдена<br>Возможно, вы ошиблись адресом или страница была удалена.
            </p>
            <a href="{{ url('/') }}" class="btn-primary error-404-btn">
                На главную
            </a>
        </div>
        <div class="error-404-image">
            <img src="{{ asset('img/404.webp') }}" alt="404 Not Found">
        </div>
    </div>
</div>
</x-layout>