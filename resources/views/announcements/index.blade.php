<x-layout>
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Объявления') }}</span>
            </nav>
        </div>
    </section>

    <!-- Announcements Cards -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="mb-8 mt-2">
                <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">{{ __('Объявления')}} </h1>
                <small>{{ __('Найдено объявлений:') }} {{ $announcements->total() }}</small>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <!-- Заголовок -->
                    
                    <!-- Проверка на наличие объявлений -->
                    @if($announcements->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-12">
                            @foreach ($announcements as $item)
                                <div class="border rounded-lg bg-white overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                                    <!-- Изображение объявления -->
                                    <div class="h-48 w-full overflow-hidden bg-gray-100">
                                        <a href="{{ route('announcements.show', ['locale' => app()->getLocale(), 'id' => $item->id]) }}">
                                            @if($item->image)
                                                <img src="{{ $item->getOptimizedImageUrl() }}"
                                                    alt="{{ $item->name }}" 
                                                    class="w-full h-full object-cover object-center hover:scale-105 transition-transform duration-300">
                                            @else
                                                <img src="{{ asset('img/university_building.webp') }}"
                                                    alt="{{ $item->name }}" 
                                                    class="w-full h-full object-cover object-center hover:scale-105 transition-transform duration-300">
                                            @endif
                                        </a>
                                    </div>
                                    
                                    <!-- Контент карточки -->
                                    <div class="p-6 flex flex-col justify-between min-h-[180px]">
                                        <div>
                                            <div class="flex items-center justify-between mb-3">
                                                <span class="text-gray-400 text-sm">
                                                    {{ \Carbon\Carbon::createFromTimestamp($item->date)->format('d.m.Y') }}
                                                </span>
                                            </div>
                                            
                                            <h3 class="font-semibold text-shakarim-blue mb-4 line-clamp-3 leading-relaxed">
                                                <a href="{{ route('announcements.show', ['locale' => app()->getLocale(), 'id' => $item->id]) }}" class="hover:text-shakarim-dark">
                                                    {{ $item->name }}
                                                </a>
                                            </h3>
                                            
                                            @if($item->description)
                                                <p class="text-gray-600 text-sm line-clamp-2 mb-4">
                                                    {{ $item->description }}
                                                </p>
                                            @endif
                                        </div>
                                        
                                        <a href="{{ route('announcements.show', ['locale' => app()->getLocale(), 'id' => $item->id]) }}"
                                        class="border border-shakarim-blue text-shakarim-blue rounded px-4 py-2 text-sm hover:bg-shakarim-blue hover:text-white transition w-max mt-auto">
                                             {{ __('Подробнее')}}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="flex justify-center items-center space-x-2">
                            {{ $announcements->onEachSide(1)->links('vendor.pagination.tailwind') }}
                        </div>
                    @else
                        <!-- Сообщение когда нет объявлений -->
                        <div class="text-center py-12">
                            <div class="max-w-md mx-auto">
                                <i class="fas fa-bullhorn text-6xl text-gray-300 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-600 mb-2">
                                    Объявлений пока нет
                                </h3>
                                <p class="text-gray-500 mb-6">
                                    Следите за обновлениями на нашем сайте
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="space-y-6">
                        <!-- Последние объявления -->
                        @if($announcements->count() > 3)
                            <div class="bg-white rounded-xl shadow-md p-6">
                                <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                    <i class="fas fa-clock mr-2"></i>
                                    Последние объявления
                                </h3>
                                <div class="space-y-3">
                                    @foreach($announcements->take(5) as $announcement)
                                        <div class="border-b border-gray-100 pb-3 last:border-b-0 last:pb-0">
                                            <a href="{{ route('announcements.show', ['id' => $announcement->id]) }}" 
                                               class="block hover:text-shakarim-blue transition duration-200">
                                                <h4 class="text-sm font-medium line-clamp-2 mb-1">{{ $announcement->name }}</h4>
                                                <span class="text-xs text-gray-500">
                                                    {{ \Carbon\Carbon::createFromTimestamp($announcement->date)->format('d.m.Y') }}
                                                </span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>