<x-layout :metaTitle="$course->name">

    <!-- Breadcrumbs -->
    <section class="bg-gray-50 py-3 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-xs md:text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Образование') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('courses.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue transition-colors">{{ __('Курсы повышения квалификации и переподготовки') }}</a>
                <span class="text-gray-400">&#8250;</span>
                <span class="text-shakarim-blue font-semibold truncate max-w-[150px] md:max-w-xs">{{ $course->name }}</span>
            </nav>
        </div>
    </section>

    <!-- Content -->
    <section class="bg-gray-50 py-6 min-h-screen">
        <div class="max-w-7xl mx-auto px-4"> <!-- Чуть шире контейнер для удобства чтения PDF -->
            
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 {{ $course->filename ? 'lg:grid-cols-2' : '' }} gap-6 items-start">
                
                <!-- Left Column: Text Info -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 lg:p-8">
                    
                    <!-- Badges -->
                    <div class="flex flex-wrap gap-3 mb-5 text-xs font-medium">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-blue-50 text-shakarim-blue border border-blue-100">
                            <i class="fas fa-clock mr-2"></i> {{ $course->hours }}
                        </span>
                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-green-50 text-green-700 border border-green-100">
                            <i class="fas fa-chalkboard-teacher mr-2"></i> {{ $course->form }}
                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-xl md:text-2xl lg:text-3xl font-heading font-bold text-gray-900 mb-6 leading-tight">
                        {{ $course->name }}
                    </h1>

                    <!-- Description -->
                    <div class="prose prose-sm md:prose-base max-w-none tiptap-content text-gray-700">
                        @if($course->text)
                            {!! $course->text !!}
                        @else
                            <div class="p-4 bg-gray-50 rounded border border-gray-100 text-gray-400 italic text-center">
                                {{ __('Описание курса отсутствует.') }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Right Column: PDF Viewer -->
                @if($course->filename)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden sticky top-4 h-[85vh]">
                        <!-- Toolbar -->
                        <div class="bg-white px-4 py-3 border-b border-gray-200 flex justify-between items-center z-10 relative shadow-sm">
                            <h3 class="font-semibold text-gray-700 text-sm flex items-center">
                                <i class="fas fa-file-pdf text-red-600 mr-2 text-lg"></i>
                                {{ __('Образовательная программа') }}
                            </h3>
                        </div>
                        
                        <!-- PDF Frame -->
                        <div class="w-full h-[calc(100%-50px)] bg-gray-100 flex items-center justify-center">
                            <iframe 
                                src="{{ $course->getFileUrl() }}" 
                                class="w-full h-full" 
                                frameborder="0"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

</x-layout>