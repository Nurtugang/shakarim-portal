<x-layout>
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 95]) }}" class="hover:text-shakarim-blue">
                    {{ __('Campus Life') }}
                </a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Студенттік парламент') }}</span>
            </nav>
        </div>
    </section>

    <!-- Student Parliament Section -->
    <section class="bg-white py-6 md:py-12">
        <div class="max-w-7xl mx-auto px-4">
            {{-- Заголовок страницы --}}
            <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-6 md:mb-8">
                {{ __('Студенттік парламент') }}
            </h1>

            @if(!empty($mainContent))
                <div class="prose max-w-none mb-8 text-gray-800">
                    {{ $mainContent}}
                </div>
            @endif

            {{-- Если студентов нет --}}
            @if($students->isEmpty())
                <div class="text-center py-12">
                    <i class="fas fa-users-slash text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">{{ __('Студенты не найдены') }}</p>
                </div>
            @else
                {{-- Сетка студентов --}}
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                    @foreach($students as $student)
                        <div class="block bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-200 group">
                            <!-- Student Image -->
                            @if($student->image)
                                <div class="h-64 overflow-hidden bg-gray-100">
                                    <img src="{{ $student->getImageUrl() }}"
                                         alt="{{ $student->{'fullname_' . $locale} }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                            @else
                                <div class="h-48 bg-gradient-to-br from-shakarim-blue to-blue-600 flex items-center justify-center">
                                    <i class="fas fa-user-graduate text-white text-5xl opacity-50"></i>
                                </div>
                            @endif

                            <div class="p-4 md:p-6 text-center">
                                <!-- Student Name -->
                                <h3 class="text-base md:text-lg font-bold text-shakarim-blue mb-1 md:mb-2">
                                    {{ $student->{'fullname_' . $locale} }}
                                </h3>

                                <!-- Position -->
                                <p class="text-gray-700 text-sm md:text-base mb-2 md:mb-3 line-clamp-2">
                                    {{ $student->{'position_' . $locale} }}
                                </p>

                                <!-- Faculty -->
                                <p class="text-gray-500 text-xs md:text-sm line-clamp-2 mb-3">
                                    {{ $student->{'faculty_' . $locale} }}
                                </p>

                                <!-- Contact -->
                                @if($student->phone)
                                    <div class="flex items-center justify-center text-gray-700 text-xs md:text-sm">
                                        <i class="fas fa-phone text-shakarim-blue mr-2"></i>
                                        <span>{{ $student->phone }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-layout>
