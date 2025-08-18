<x-layout>
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('structure.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __("Organizational Structure") }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">
                    {{ \Illuminate\Support\Str::limit($structure->{'title_'.app()->getLocale()}, 40) }}
                </span>
            </nav>
        </div>
    </section>

    <!-- Основной контент -->
    <section class="bg-white py-4 md:py-8">
        <div class="max-w-7xl mx-auto px-4">
            
            <!-- Карточка руководителя и информации -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-0">
                    
                    <!-- Левая часть - Руководитель -->
                    <div class="bg-shakarim-blue text-white p-4 md:p-6 col-span-1">
                        <div class="text-center">
                            <!-- Фото прямоугольное -->
                            <div class="relative mx-auto w-32 h-40 md:w-40 md:h-48 mb-4 bg-gray-200 rounded-lg overflow-hidden">
                                <img src="{{ $structure->filteredData->getPhoto() }}" 
                                     alt="{{ $structure->filteredData->leader_name }}"
                                     class="w-full h-full object-cover">
                            </div>
                            
                            <!-- Имя и должность -->
                            <h2 class="text-lg md:text-xl font-heading font-bold text-white mb-2">
                                {{ $structure->filteredData->leader_name }}
                            </h2>
                            <p class="text-blue-100 text-sm md:text-base mb-3">
                                {{ $structure->filteredData->leader_position }}
                            </p>
                            <p class="text-blue-200 text-xs md:text-sm">
                                {{ $structure->{'title_'.app()->getLocale()} }}
                            </p>
                        </div>

                        <!-- Контактная информация -->
                        <div class="mt-6">
                            <h3 class="text-base font-semibold text-white mb-3 border-b border-blue-300 pb-2">
                                {{ __("Contact Information") }}
                            </h3>
                            
                            <div class="space-y-2">
                                <div class="flex items-start space-x-2">
                                    <i class="fas fa-map-marker-alt text-blue-200 w-4 mt-0.5 text-xs"></i>
                                    <span class="text-blue-100 text-xs">
                                        {{ $structure->filteredData->address ?? '071412 Республика Казахстан, область Абай, город Семей, ул. Глинки, 20 "Д"' }}
                                    </span>
                                </div>
                                
                                @if($structure->filteredData->cabinet)
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-door-open text-blue-200 w-4 text-xs"></i>
                                    <span class="text-blue-100 text-xs">
                                        {{ __("Office") }}: {{ $structure->filteredData->cabinet }}
                                    </span>
                                </div>
                                @endif

                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-envelope text-blue-200 w-4 text-xs"></i>
                                    <a href="mailto:{{ $structure->filteredData->email }}" 
                                       class="text-blue-100 hover:text-white transition-colors text-xs break-all">
                                        {{ $structure->filteredData->email }}
                                    </a>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-phone text-blue-200 w-4 text-xs"></i>
                                    <a href="tel:{{ $structure->filteredData->phone }}" 
                                       class="text-blue-100 hover:text-white transition-colors text-xs">
                                        {{ $structure->filteredData->phone }}
                                    </a>
                                </div>

                                @if($structure->filteredData->phone_2)
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-phone-alt text-blue-200 w-4 text-xs"></i>
                                    <a href="tel:{{ $structure->filteredData->phone_2 }}" 
                                       class="text-blue-100 hover:text-white transition-colors text-xs">
                                        {{ $structure->filteredData->phone_2 }}
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Правая часть - Информация о структуре -->
                    <div class="p-6 md:p-8 bg-gray-50 col-span-3">
                        <h1 class="text-xl md:text-2xl font-heading font-bold text-gray-800 mb-6">
                            {{ $structure->{'title_'.app()->getLocale()} }}
                        </h1>
                        
                        @if($structure->filteredData->data && count($structure->filteredData->data) > 0)
                            <div class="space-y-4">
                                @foreach($structure->filteredData->data as $item)
                                    <div>
                                        <h3 class="text-base font-semibold text-gray-800 mb-2">
                                            {{ $item['title'] ?? __('Information') }}
                                        </h3>
                                        <!-- ДОБАВЛЕН КЛАСС tiptap-content ДЛЯ СТИЛЕЙ -->
                                        <div class="tiptap-content prose prose-sm max-w-none text-gray-700 text-sm">
                                            {!! $item['text'] ?? __('Information not provided') !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-gray-600 text-sm">
                                <p>{{ __("Department information and management") }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Сотрудники департамента на всю ширину -->
            @if($structure->employees->count() > 0)
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                    <h3 class="text-xl md:text-2xl font-heading font-bold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-users text-shakarim-blue mr-3"></i>
                        {{ __("Department Staff") }}
                        <span class="ml-3 bg-shakarim-blue text-white text-sm font-medium px-3 py-1 rounded-full">
                            {{ $structure->employees->count() }}
                        </span>
                    </h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 md:gap-4">
                        @foreach($structure->employees as $employee)
                            <div class="bg-gray-50 rounded-lg p-3 hover:shadow-md transition-all duration-300 hover:bg-gray-100 text-center">
                                <!-- Фото прямоугольное -->
                                <div class="relative mx-auto w-32 h-40 md:w-40 md:h-48 mb-3 bg-gray-200 rounded-lg overflow-hidden">
                                    <img src="{{ $employee->getPhoto() }}" 
                                        alt="{{ $employee->{'fullname_'.app()->getLocale()} }}"
                                        class="w-full h-full object-cover">
                                </div>
                                
                                <h4 class="font-semibold text-gray-800 text-xs md:text-sm mb-1 leading-tight">
                                    {{ $employee->{'fullname_'.app()->getLocale()} }}
                                </h4>
                                <p class="text-gray-600 text-xs leading-tight">
                                    {{ $employee->{'position_'.app()->getLocale()} }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-layout>