<x-layout>
@push('styles')
<link rel="stylesheet" href="{{ asset("css/structure-style.css") }}">
<link rel="stylesheet" href="{{ asset("css/staff.css") }}">
@endpush

<!-- ЗАГОЛОВОК КАТЕГОРИИ -->
<div class="page-header-section">
    <div class="page-title-container">
        <h1 class="page-title">{{ $structure->{'title_'.app()->getLocale()} }}</h1>
        <p class="page-subtitle">
            {{ __("Organizational structure and management system of the university") }}
        </p>
    </div>
</div>

<!-- ХЛЕБНЫЕ КРОШКИ -->
<div class="breadcrumb-container">
    <div class="breadcrumb">
        <a href="/" title="{{ __("Home page") }}"><i class="fas fa-home"></i></a>
        <span class="breadcrumb-separator">〉</span>
        <a href="{{route('structure.index',['locale'=>app()->getLocale()])}}">{{ __("Organizational structures") }}</a>
        <span class="breadcrumb-separator">〉</span>
        <span class="current">{{ $structure->{'title_'.app()->getLocale()} }}</span>
    </div>
</div>

<!-- ЦЕНТРАЛЬНЫЙ БЛОК -->
<div class="content">
    <div class="department-layout">
        <!-- Левая колонка - Руководитель -->
        <div class="department-head">
            <div class="head-card">
                <div class="head-photo">
                    <img src="{{ $structure->filteredData->getPhoto() }}" alt="{{ $structure->filteredData->leader_name }}">
                    <div class="photo-overlay">
                        <i class="fas fa-user-tie"></i>
                    </div>
                </div>
                <div class="head-info">
                    <h3>{{ $structure->filteredData->leader_name }}</h3>
                    <p class="position">{{ $structure->filteredData->leader_position }}</p>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <a href="tel:{{ $structure->filteredData->phone }}">{{ $structure->filteredData->phone }}</a>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:{{ $structure->filteredData->email ?? 'info@shakarim.edu.kz' }}">{{ $structure->filteredData->email ?? 'info@shakarim.edu.kz' }}</a>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $structure->filteredData->address }}</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-door-open"></i>
                            <span>2-этаж, музей</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Правая колонка - Информация -->
        <div class="department-content">
            <!-- Основные виды деятельности -->
            @foreach ($structure->filteredData->data as $item)
               <div class="activity-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas {{ $item['icon'] }}"></i>
                    </div>
                    <h3>{{ $item['title'] }}</h3>
                </div>
                
                <div class="activity-grid">
                    <div class="activity-text">
                        {!! $item['text'] !!}
                    </div>
                   
                </div>
            </div>             
            @endforeach
            
            
            <!-- Сотрудники -->
            @if($structure->employees->count() > 0)
            <div class="staff-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <h3>Сотрудники</h3>
                </div>
                
                <div class="staff-grid" data-count="{{ $structure->employees->count() }}">
                    @foreach ($structure->employees as $item)
                        <div class="staff-card">
                            <div class="staff-card-inner">
                                <div class="staff-photo">
                                    <img src="{{ $item->getPhoto() }}" alt="{{ $item->{'fullname_'.app()->getLocale()} }}">
                                    <div class="staff-overlay">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="staff-info">
                                    <h4>{{ $item->{'fullname_'.app()->getLocale()} }}</h4>
                                    <p>{{ $item->{'position_'.app()->getLocale()} }}</p>
                                    <div class="staff-contact">
                                        @if($item->email)
                                            <a href="mailto:{{ $item->email }}" class="contact-badge">
                                                <i class="fas fa-envelope"></i>
                                                <span>Связаться</span>
                                            </a>
                                        @elseif($item->phone)
                                            <a href="tel:{{ $item->phone }}" class="contact-badge">
                                                <i class="fas fa-phone"></i>
                                                <span>Связаться</span>
                                            </a>
                                        @else
                                            <div class="contact-badge">
                                                <i class="fas fa-user"></i>
                                                <span>Сотрудник</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

</x-layout>