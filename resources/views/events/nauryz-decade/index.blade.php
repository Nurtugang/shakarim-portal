<x-layout>
    @section('meta_title', __('Декада Наурызнама') . ' - Shakarim University')

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Декада Наурызнама') }}</span>
            </nav>
        </div>
    </section>

    <!-- Nauryz Decade Section -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Page Title -->
            <div class="mb-8 mt-2 text-center">
                <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">
                    {{ __('Декада Наурызнама') }}
                </h1>
                <p class="text-gray-600 mt-2">{{ __('14-23 наурыз') }}</p>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6">
                <!-- Day 1 - 14 наурыз -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow group">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/nauryz/day-14.jpeg') }}" 
                             alt="14 наурыз - Амал мерекесі" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-heading font-bold text-lg text-shakarim-blue mb-1">14 наурыз</h3>
                        <p class="text-gray-600 text-sm">Амал мерекесі</p>
                    </div>
                </div>

                <!-- Day 2 - 15 наурыз -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow group">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/nauryz/day-15.jpeg') }}" 
                             alt="15 наурыз - Қайырымдылық күні" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-heading font-bold text-lg text-shakarim-blue mb-1">15 наурыз</h3>
                        <p class="text-gray-600 text-sm">Қайырымдылық күні</p>
                    </div>
                </div>

                <!-- Day 3 - 16 наурыз -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow group">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/nauryz/day-16.jpeg') }}" 
                             alt="16 наурыз - Мәдениет және ұлттық салт-дәстүр күні" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-heading font-bold text-lg text-shakarim-blue mb-1">16 наурыз</h3>
                        <p class="text-gray-600 text-sm">Мәдениет және ұлттық салт-дәстүр күні</p>
                    </div>
                </div>

                <!-- Day 4 - 17 наурыз -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow group">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/nauryz/day-17.jpeg') }}" 
                             alt="17 наурыз - Шаңырақ күні" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-heading font-bold text-lg text-shakarim-blue mb-1">17 наурыз</h3>
                        <p class="text-gray-600 text-sm">Шаңырақ күні</p>
                    </div>
                </div>

                <!-- Day 5 - 18 наурыз -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow group">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/nauryz/day-18.jpeg') }}" 
                             alt="18 наурыз - Ұлттық киім күні" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-heading font-bold text-lg text-shakarim-blue mb-1">18 наурыз</h3>
                        <p class="text-gray-600 text-sm">Ұлттық киім күні</p>
                    </div>
                </div>

                <!-- Day 6 - 19 наурыз -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow group">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/nauryz/day-19.jpeg') }}" 
                             alt="19 наурыз - Жаңару күні" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-heading font-bold text-lg text-shakarim-blue mb-1">19 наурыз</h3>
                        <p class="text-gray-600 text-sm">Жаңару күні</p>
                    </div>
                </div>

                <!-- Day 7 - 20 наурыз -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow group">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/nauryz/day-20.jpeg') }}" 
                             alt="20 наурыз - Ұлттық спорт күні" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-heading font-bold text-lg text-shakarim-blue mb-1">20 наурыз</h3>
                        <p class="text-gray-600 text-sm">Ұлттық спорт күні</p>
                    </div>
                </div>

                <!-- Day 8 - 21 наурыз -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow group">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/nauryz/day-21.jpeg') }}" 
                             alt="21 наурыз - Ынтымақ күні" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-heading font-bold text-lg text-shakarim-blue mb-1">21 наурыз</h3>
                        <p class="text-gray-600 text-sm">Ынтымақ күні</p>
                    </div>
                </div>

                <!-- Day 9 - 22 наурыз -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow group">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/nauryz/day-22.jpeg') }}" 
                             alt="22 наурыз - Жыл басы" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-heading font-bold text-lg text-shakarim-blue mb-1">22 наурыз</h3>
                        <p class="text-gray-600 text-sm">Жыл басы</p>
                    </div>
                </div>

                <!-- Day 10 - 23 наурыз -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow group">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/nauryz/day-23.jpeg') }}" 
                             alt="23 наурыз - Тазару күні" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-heading font-bold text-lg text-shakarim-blue mb-1">23 наурыз</h3>
                        <p class="text-gray-600 text-sm">Тазару күні</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
