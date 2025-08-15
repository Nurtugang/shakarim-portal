<div class="hero-card">
                <h3 style="color: white; margin-bottom: 1rem; font-size: 1.5rem;">{{ $title }}</h3>
                <div style="color: rgba(255,255,255,0.9); margin-bottom: 1.5rem; line-height: 1.5;">
                    {!! $text !!}
                </div>
                @if(isset($first_button_label))
                <a target="_blank" href="{{$first_button_link}}" class="{{ $first_button_class }}" style="background: --accent-color; margin-bottom: 1rem;">
                    @if($first_button_label)
                    <i class="fas {{$first_button_icon}}"></i>
                    @endif
                    {{ $first_button_label }}
                </a>
                @endif
                <p style="color: rgba(255,255,255,0.8); font-size: 0.9rem;">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                    <i class="fas fa-phone"></i> {{ __('Приемная комиссия: +7 (771) 365-46-25')}}
                </p>
            </div>