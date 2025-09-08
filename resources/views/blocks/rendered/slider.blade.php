<div class="slider-container relative h-64 md:h-[400px]">
    <!-- Slide 1: QS Rankings -->
    @foreach($items as $item)
    <div class="slide absolute top-0 left-0 w-full h-full transition duration-500 ease-in-out">
        <div class="flex h-full">
            <div class="w-1/2 h-full" style="background-color: {{ $item['left_bg_color'] }}">
                <div class="flex flex-col h-full justify-center text-center">
                    @if($item['left_image'])
                    <img src="/storage/{{ $item['left_image'] }}" alt="" class="w-full h-full object-cover">
                    @else
                    {!! $item['left_content'] !!}
                    @endif
                </div>
            </div>
            <div class="w-1/2 h-full" style="background-color: {{ $item['right_bg_color'] }}">
                <div class="flex flex-col h-full justify-center text-center">
                    @if($item['right_image'])
                    <img src="/storage/{{ $item['right_image'] }}" alt="" class="w-full h-full object-cover">
                    @else
                    {!! $item['right_content'] !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Slide Navigation -->
    <div class="absolute bottom-3 md:bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
        @foreach($items as $index => $item)
        <button class="slide-dot w-2 h-2 md:w-3 md:h-3 rounded-full bg-white {{ $index > 0 ? 'bg-opacity-50' : '' }}" data-slide="{{ $index }}"></button>
        @endforeach
    </div>

    <!-- Navigation Arrows -->
    <button class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-20 text-white p-3 rounded-full hover:bg-opacity-30 transition z-10 hidden md:block" onclick="previousSlide()">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-20 text-white p-3 rounded-full hover:bg-opacity-30 transition z-10 hidden md:block" onclick="nextSlide()">
        <i class="fas fa-chevron-right"></i>
    </button>
</div>