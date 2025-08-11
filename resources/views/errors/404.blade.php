<x-layout metaTitle="Страница не найдена">

<div class=" flex items-center justify-center px-4 py-8">
    <div class="max-w-6xl mx-auto w-full">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-12 lg:gap-16">
            <!-- Изображение - показываем первым на мобилке -->
            <div class="lg:flex-1 max-w-md lg:max-w-lg xl:max-w-xl lg:order-2">
                <img src="{{ asset('img/404.webp') }}" 
                     alt="404 Not Found" 
                     class="w-full h-auto object-contain">
            </div>
            
            <!-- Текстовая часть -->
            <div class="text-center lg:text-left lg:flex-1 lg:order-1">
                <div class="space-y-6">
                    <p class="text-xl md:text-2xl text-gray-600 leading-relaxed max-w-md mx-auto lg:mx-0">
                        Страница не найдена<br>
                        <span class="text-lg md:text-xl text-gray-500">
                            Возможно, вы ошиблись адресом или страница была удалена.
                        </span>
                    </p>
                    <a href="{{ url('/') }}" 
                       class="inline-block bg-primary hover:bg-blue-800 text-white font-semibold px-8 py-4 rounded-lg transition-colors duration-200 text-lg">
                        На главную
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</x-layout>