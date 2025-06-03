<x-layout>
@push('styles')
<link rel="stylesheet" href="{{ asset("css/structure-style.css") }}">
@endpush


<div class="container profile-box">
        <div class="row">
            <div class="col-md-4 left-co">
                <div class="left-side">
                    <div class="profile-info">
                        <img src="{{ $structure->data->getPhoto() }}" alt="">
                        <h3>{{ $structure->data->leader_name }}</h3>
                        <span>{{ $structure->data->leader_position }}</span>
                    </div>
                    <h4 class="ltitle">Байланыс</h4>
                                      <div class="contact-box">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="detail">
                            {{ $structure->data->address }}<br>
                       <span style="font-size:12px;color: beige;">{{ $structure->data->cabinet }}</span>
                        </div>
                    </div>
                    <div class="contact-box">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="detail" style="overflow-wrap: anywhere;">
                            {{ $structure->data->email }} </div>
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
                       {!! $structure->data->main_activities !!}
                    </div>
                </div>
                <hr>
                                    <h5 class="rit-titl flex pt-4"><i class="employees-icon"></i> Қызметкерлер</h5>
                <div class="grid-2">
                                            <div class="about">
                            <div class="employee">
                                <img src="/upload/structure/employees/ba8347a2d27c59cf5efecfbbaa703323.jpeg" alt="">
                                <ul class="employee-info">
                                    <li><h5 class="title">Газизова Назигул Слямболовна</h5><span class="subtext">Үйлестіруші</span></li>
                                </ul>
                            </div>
                            <hr>
                        </div>
                                            <div class="about">
                            <div class="employee">
                                <img src="/upload/structure/employees/e308447986404d35b6b4c1a294a33847.png" alt="">
                                <ul class="employee-info">
                                    <li><h5 class="title">Киреенко Елена Александровна </h5><span class="subtext">Деректерді өндеу технигі </span></li>
                                </ul>
                            </div>
                            <hr>
                        </div>
                                    </div>
                            </div>
        </div>
            </div>

</x-layout>