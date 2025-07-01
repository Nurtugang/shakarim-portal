<x-layout>
@push('styles')
<link rel="stylesheet" href="{{ asset("css/structure-style.css") }}">
<link rel="stylesheet" href="{{ asset("css/staff.css") }}">
@endpush
<!-- ЗАГОЛОВОК КАТЕГОРИИ -->
<div class="category-header">
    <div class="category-bg"></div>
    <div class="category-content">
        <h1 class="category-title">{{ $structure->{'title_'.app()->getLocale()} }}</h1>
        <p class="category-subtitle">Изучение и популяризация наследия великого поэта</p>
    </div>
</div>

<!-- ХЛЕБНЫЕ КРОШКИ -->
<div class="breadcrumb-container">
    <div class="breadcrumb">
        <a href="/" title="Домашняя страница"><i class="fas fa-home"></i></a>
        <span class="breadcrumb-separator">〉</span>
        <a href="{{route('structure.index',['locale'=>app()->getLocale()])}}">Организационная структура</a>
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
                            <span>{{ $structure->filteredData->phone }}</span>
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
           @foreach ($structure->filteredData->data as $item)
            <div class="activity-section">
               
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas {{ $item['icon'] }}"></i>
                    </div>
                    <h3>{{ $item['title'] }}</h3>
                </div>
                  <div>
                    {!! $item['text'] !!}
                  </div>
               
            </div>
             @endforeach
            <!-- Сотрудники -->
            <div class="staff-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <h3>Сотрудники</h3>
                </div>
                
                <div class="staff-grid" data-count="3">
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
                                    <div class="contact-badge">
                                        <i class="fas fa-envelope"></i>
                                        <span>Связаться</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                
            </div>
            
            <!-- Информационная секция -->
            <div class="info-section">
                <div class="info-cards">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h4>Время работы</h4>
                            <p>Понедельник - Пятница<br>09:00 - 18:00</p>
                        </div>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Посещение</h4>
                            <p>Бесплатно для студентов<br>и сотрудников университета</p>
                        </div>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="info-content">
                            <h4>Экскурсии</h4>
                            <p>По предварительной<br>записи</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-layout>