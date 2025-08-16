<x-layout :metaTitle="__('Ғылыми жобалар')">
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 28]) }}" class="hover:text-shakarim-blue">{{ __('Наука') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Ғылыми жобалар')}}</span>
            </nav>
        </div>
    </section>

    <!-- Scientific Projects Section -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <!-- Page Title -->
                    <div class="mb-8 mt-2">
                        <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">
                            {{ __('Ғылыми жобалар')}}
                        </h1>
                        <p class="text-gray-600 mt-2">{{ __('Университеттің ғылыми зерттеу жобалары') }}</p>
                    </div>

                    @if($projectsByYears->count() > 0)
                        <!-- Projects by Years -->
                        <div class="space-y-6">
                            @foreach($projectsByYears as $year => $projects)
                                <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm bg-white">
                                    <!-- Year Header -->
                                    <button class="w-full px-6 py-4 bg-shakarim-blue  hover:from-shakarim-dark hover:to-blue-800 text-white text-left font-medium flex items-center justify-between transition-all duration-200"
                                            type="button" 
                                            onclick="toggleCollapse('year-{{ $year }}')">
                                        <span class="text-lg font-semibold flex items-center">
                                            <i class="fas fa-calendar-alt mr-3"></i>
                                            {{ $year }}
                                        </span>
                                        <div class="flex items-center">
                                            <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm mr-3">
                                                {{ $projects->count() }} {{ __('жоба') }}
                                            </span>
                                            <i class="fas fa-chevron-down transform transition-transform duration-200" id="icon-year-{{ $year }}"></i>
                                        </div>
                                    </button>

                                    <!-- Projects List -->
                                    <div id="year-{{ $year }}" class="hidden">
                                        <div class="divide-y divide-gray-100">
                                            @foreach($projects as $project)
                                                <div class="p-6 hover:bg-gray-50 transition-colors duration-200">
                                                    <div class="flex flex-col md:flex-row md:items-start gap-4">
                                                        <!-- Project Icon -->
                                                        <div class="flex-shrink-0">
                                                            <div class="w-12 h-12 bg-gradient-to-br from-shakarim-blue to-blue-600 rounded-lg flex items-center justify-center">
                                                                <i class="fas fa-flask text-white text-lg"></i>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Project Content -->
                                                        <div class="flex-grow min-w-0">
                                                            <!-- Project Title -->
                                                            <h3 class="mb-3">
                                                                <a href="{{ route('science.projects.show', ['locale' => app()->getLocale(), 'id' => $project->id]) }}" 
                                                                   class="text-lg font-semibold text-shakarim-blue hover:text-shakarim-dark transition-colors duration-200 leading-tight line-clamp-2">
                                                                    {{ $project->localized_name }}
                                                                </a>
                                                            </h3>
                                                            
                                                            <!-- Project Supervisor -->
                                                            <div class="mb-2">
                                                                <span class="text-sm font-medium text-gray-700">{{ __('Жоба жетекшісі') }}:</span>
                                                                <span class="text-sm text-gray-600 ml-1">{{ $project->localized_supervisor }}</span>
                                                            </div>
                                                            
                                                            <!-- Project Duration -->
                                                            <div class="mb-3">
                                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                                    <i class="fas fa-clock mr-1"></i>
                                                                    {{ $project->years }}
                                                                </span>
                                                            </div>
                                                            
                                                            <!-- Project Preview -->
                                                            @if($project->localized_relevance)
                                                                <div class="text-sm text-gray-600 leading-relaxed">
                                                                    <div class="line-clamp-3">
                                                                        {!! Str::limit(strip_tags($project->localized_relevance), 200) !!}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        
                                                        <!-- Arrow Icon -->
                                                        <div class="flex-shrink-0 self-center">
                                                            <i class="fas fa-chevron-right text-gray-400"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- No Projects Message -->
                        <div class="text-center py-16">
                            <div class="max-w-md mx-auto">
                                <i class="fas fa-flask text-6xl text-gray-300 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-600 mb-2">
                                    {{ __('Жобалар табылмады') }}
                                </h3>
                                <p class="text-gray-500">
                                    {{ __('Қазіргі уақытта ешқандай ғылыми жобалар жоқ') }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="space-y-6">
                        <!-- Quick Links -->
                        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
                            <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                <i class="fas fa-external-link-alt mr-2"></i>
                                {{ __('Пайдалы сілтемелер') }}
                            </h3>
                            <div class="space-y-2">
                                <a href="{{ route('science.best-teachers', ['locale' => app()->getLocale()]) }}" 
                                   class="block p-2 text-sm text-gray-600 hover:text-shakarim-blue hover:bg-gray-50 rounded transition duration-200">
                                    {{ __('Үздік оқытушылар') }}
                                </a>
                                <a href="{{ route('science.aspirants', ['locale' => app()->getLocale()]) }}" 
                                   class="block p-2 text-sm text-gray-600 hover:text-shakarim-blue hover:bg-gray-50 rounded transition duration-200">
                                    {{ __('Аспиранттар') }}
                                </a>
                                <a href="{{ route('science.purchases', ['locale' => app()->getLocale()]) }}" 
                                   class="block p-2 text-sm text-gray-600 hover:text-shakarim-blue hover:bg-gray-50 rounded transition duration-200">
                                    {{ __('Сатып алулар') }}
                                </a>
                            </div>
                        </div>
                        <!-- Statistics -->
                        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-shakarim-blue">
                            <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                <i class="fas fa-chart-bar mr-2"></i>
                                {{ __('Статистика') }}
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">{{ __('Барлық жобалар:') }}</span>
                                    <span class="font-semibold text-shakarim-blue text-lg">{{ $projectsByYears->flatten()->count() }}</span>
                                </div>
                                @if(count($years) > 0)
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">{{ __('Кезең:') }}</span>
                                        <span class="font-semibold text-shakarim-blue">2020-2026</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Quick Navigation -->
                        @if(count($years) > 0)
                            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
                                <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                    <i class="fas fa-list mr-2"></i>
                                    {{ __('Жылдар бойынша') }}
                                </h3>
                                <div class="space-y-2">
                                    @foreach($years as $year)
                                        @php
                                            $count = $projectsByYears[$year]->count() ?? 0;
                                        @endphp
                                        <button onclick="scrollToYear('year-{{ $year }}')"
                                               class="flex items-center justify-between w-full p-3 rounded-lg hover:bg-gray-50 transition duration-200 text-left group">
                                            <span class="text-sm font-medium text-gray-700 group-hover:text-shakarim-blue">{{ $year }}</span>
                                            <span class="text-xs text-white bg-shakarim-blue px-2 py-1 rounded-full">
                                                {{ $count }}
                                            </span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@push('scripts')
<script>
function toggleCollapse(elementId) {
    const element = document.getElementById(elementId);
    const icon = document.getElementById('icon-' + elementId);
    
    if (element.classList.contains('hidden')) {
        element.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        element.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}

function scrollToYear(yearId) {
    const element = document.getElementById(yearId);
    if (element) {
        if (element.classList.contains('hidden')) {
            toggleCollapse(yearId);
        }
        setTimeout(() => {
            element.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start',
                inline: 'nearest'
            });
        }, 100);
    }
}

// Auto-expand first year on page load
document.addEventListener('DOMContentLoaded', function() {
    const firstYear = document.querySelector('[id^="year-"]');
    if (firstYear && firstYear.classList.contains('hidden')) {
        const yearId = firstYear.id;
        toggleCollapse(yearId);
    }
});
</script>
@endpush

</x-layout>