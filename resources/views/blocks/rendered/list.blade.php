<div class="schools-container">
        <div class="section-title animate-on-scroll">
            <h2>{{ $title }}</h2>
            <p>{{ $subtitle }}</p>
        </div>
        
        <div class="schools-grid">
            @foreach ($list as $item)
            <div class="school animate-on-scroll">
                <a href="{{ $item['link']??'#' }}" target="_blank" style="text-decoration: none; color: inherit;">
                    <div class="school-icon"><i class="fas {{ $item['icon'] }}"></i></div>
                    <div class="school-name">{{ $item['title'] }}</div>
                </a>
            </div>
            @endforeach
        </div>
    </div>