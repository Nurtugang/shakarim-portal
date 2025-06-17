<div class="hero-text">
            <h1>{{ $title }}</h1>
            {!! $text !!}
            <div class="hero-buttons">
                @if(isset($first_button_label))
                <a target="_blank" href="{{$first_button_link}}" class="{{ $first_button_class }}">
                    @if($first_button_label)
                    <i class="fas {{$first_button_icon}}"></i>
                    @endif
                    {{ $first_button_label }}
                </a>
                @endif
                @if(isset($second_button_label))
                <a href="{{$second_button_link}}" class="{{ $second_button_class }}">
                    @if($second_button_icon)
                    <i class="fas {{$second_button_icon}}"></i>
                     @endif
                   {{ $second_button_label }}
                </a>
                @endif
            </div>
        </div>