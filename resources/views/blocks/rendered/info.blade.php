<div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center rounded-lg overflow-hidden shadow-lg bg-white gap-8">
            <!-- Левая часть: Текст -->
            <div x-data="{ shown: false }" x-intersect="shown = true" :class="{
             'opacity-0': !shown,
             'opacity-100 animate-fade-in-left': shown
         }" class="md:w-1/2 py-10 px-10 md:px-20">
                <h2 class="text-4xl lg:text-5xl font-inter text-gray-800 mb-4">
                    {{ $title }}
                </h2>
                <div class="font-sf text-lg text-gray-600 my-8">
                    {!! $text !!}
                </div>
                <ul>
                    @foreach ($list as $item)
                        <li class="flex items-center space-x-4 mb-4">
                            <img src="/storage/{{ $item['icon'] }}" class="w-7 h-7 text-secondary" />
                            <span>{{ $item['text'] }}</span>
                        </li>
                    @endforeach
                </ul>

            </div>
            <!-- Правая часть: Изображение/Иллюстрация -->
            <div x-data="{ shown: false }" x-intersect="shown = true" :class="{
             'opacity-0': !shown,
             'opacity-100 animate-fade-in-right': shown
         }" class="md:w-1/2">
                <img
                    src="/storage/{{ $banner }}"
                    alt="Иллюстрация"
                    class="w-full h-auto hidden md:block" />
            </div>
        </div>
    </div>