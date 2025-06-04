<x-layout>
@push('styles')
<link rel="stylesheet" href="{{ asset("css/structure-style.css") }}">
@endpush

<div class="breadcrumb-container">
    <div class="breadcrumb">
        <a href="/" title="Домашняя страница"><span class="home-icon"></span></a>
        <span class="breadcrumb-separator">〉</span>
        <a href="{{ route('structure.index',['locale'=>app()->getLocale()]) }}">Структура</a>
        <span class="breadcrumb-separator">〉</span>
        <span class="current">{{ $structure->{'title_'.app()->getLocale()} }}</span>
    </div>
</div>
<div class="container profile-box mt-10">
        <div class="row">
            <div class="col-md-4 left-co">
                <div class="left-side">
                    <div class="profile-info">
                        <img src="{{ $structure->filteredData->getPhoto() }}" alt="">
                        <h3>{{ $structure->filteredData->leader_name }}</h3>
                        <span>{{ $structure->filteredData->leader_position }}</span>
                    </div>
                    <h4 class="ltitle">Байланыс</h4>
                                      <div class="contact-box">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="detail">
                            {{ $structure->filteredData->address }}<br>
                       <span style="font-size:12px;color: beige;">{{ $structure->filteredData->cabinet }}</span>
                        </div>
                    </div>
                    <div class="contact-box">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="detail" style="overflow-wrap: anywhere;">
                            {{ $structure->filteredData->email }} </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 rt-div">
                <div class="rit-cover">
                    <div class="hotkey">
                        <h1 class="">{{ $structure->{'title_'.app()->getLocale()} }}</h1>
                    </div>
                    <hr>
                    <h5>Негізгі қызмет түрлері:</h5>
                    <div class="list text-content">
                       {!! $structure->filteredData->main_activities !!}
                    </div>
                </div>
                <hr>
                                    <h5 class="rit-titl flex pt-4"><i class="employees-icon"></i> Қызметкерлер</h5>
                <div class="grid-2">
                    @foreach ($structure->employees as $item)
                    <div class="about">
                            <div class="employee">
                                <img src="{{ $item->getPhoto() }}" alt="">
                                <ul class="employee-info">
                                    <li><h5 class="title">{{ $item->{'fullname_'.app()->getLocale()} }}</h5><span class="subtext">{{ $item->{'position_'.app()->getLocale()} }}</span></li>
                                </ul>
                            </div>
                            <hr>
                        </div>
                    @endforeach         
                                    </div>
                            </div>
        </div>
            </div>

</x-layout>