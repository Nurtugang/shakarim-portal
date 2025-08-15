<x-layout :metaTitle="$project->localized_name">

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="/{{ app()->getLocale() }}/science" class="hover:text-shakarim-blue">{{ __('Наука') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('science.projects.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Ғылыми жобалар') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Жоба туралы') }}</span>
            </nav>
        </div>
    </section>

    <!-- Project Details Section -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <!-- Back Button -->
                    <div class="mb-6">
                        <a href="{{ route('science.projects.index', ['locale' => app()->getLocale()]) }}" 
                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-shakarim-blue hover:text-shakarim-dark transition-colors duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>
                            {{ __('Жобалар тізіміне оралу') }}
                        </a>
                    </div>

                    <!-- Project Header -->
                    <div class="bg-gradient-to-r from-shakarim-blue to-blue-700 rounded-lg p-6 text-white mb-8">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-flask text-2xl"></i>
                                </div>
                            </div>
                            <div class="flex-grow">
                                <h1 class="text-2xl md:text-3xl font-bold mb-3 leading-tight">
                                    {{ $project->localized_name }}
                                </h1>
                                <div class="flex flex-wrap gap-4 text-sm">
                                    <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        {{ $project->years }}
                                    </span>
                                    @if($project->month)
                                        <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full">
                                            <i class="fas fa-clock mr-1"></i>
                                            {{ $project->month }} {{ __('месяц') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project Supervisor -->
                    <div class="bg-blue-50 border-l-4 border-shakarim-blue p-6 mb-8 rounded-r-lg">
                        <h2 class="text-lg font-semibold text-shakarim-blue mb-2 flex items-center">
                            <i class="fas fa-user-tie mr-2"></i>
                            {{ __('Жоба жетекшісі') }}
                        </h2>
                        <p class="text-gray-700">{{ $project->localized_supervisor }}</p>
                    </div>

                    <!-- Project Content Sections -->
                    <div class="space-y-8">
                        <!-- Relevance Section -->
                        @if($project->localized_relevance)
                            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                                <h2 class="text-xl font-semibold text-shakarim-blue mb-4 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-3"></i>
                                    {{ __('Өзектілігі') }}
                                </h2>
                                <div class="prose prose-blue max-w-none text-gray-700 leading-relaxed">
                                    {!! $project->localized_relevance !!}
                                </div>
                            </div>
                        @endif

                        <!-- Target Section -->
                        @if($project->localized_target)
                            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                                <h2 class="text-xl font-semibold text-shakarim-blue mb-4 flex items-center">
                                    <i class="fas fa-bullseye mr-3"></i>
                                    {{ __('Мақсаты') }}
                                </h2>
                                <div class="prose prose-blue max-w-none text-gray-700 leading-relaxed">
                                    {!! $project->localized_target !!}
                                </div>
                            </div>
                        @endif

                        <!-- Expectation Section -->
                        @if($project->localized_expectation)
                            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                                <h2 class="text-xl font-semibold text-shakarim-blue mb-4 flex items-center">
                                    <i class="fas fa-lightbulb mr-3"></i>
                                    {{ __('Күтілетін нәтиже') }}
                                </h2>
                                <div class="prose prose-blue max-w-none text-gray-700 leading-relaxed">
                                    {!! $project->localized_expectation !!}
                                </div>
                            </div>
                        @endif

                        <!-- Results Section -->
                        @if($project->localized_result)
                            <div class="bg-green-50 border border-green-200 rounded-lg p-6 shadow-sm">
                                <h2 class="text-xl font-semibold text-green-700 mb-4 flex items-center">
                                    <i class="fas fa-check-circle mr-3"></i>
                                    {{ __('Қол жеткізілген нәтиже') }}
                                </h2>
                                <div class="prose prose-green max-w-none text-gray-700 leading-relaxed">
                                    {!! $project->localized_result !!}
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Navigation -->
                    <div class="mt-12 pt-8 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <a href="{{ route('science.projects.index', ['locale' => app()->getLocale()]) }}" 
                               class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200">
                                <i class="fas fa-arrow-left mr-2"></i>
                                {{ __('Барлық жобалар') }}
                            </a>
                            
                            <div class="flex gap-3">
                                <button onclick="window.print()" 
                                        class="inline-flex items-center px-4 py-2 bg-shakarim-blue hover:bg-shakarim-dark text-white rounded-lg transition-colors duration-200">
                                    <i class="fas fa-print mr-2"></i>
                                    {{ __('Басып шығару') }}
                                </button>
                                <button onclick="shareProject()" 
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                                    <i class="fas fa-share mr-2"></i>
                                    {{ __('Бөлісу') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="space-y-6">
                        <!-- Project Info Card -->
                        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-shakarim-blue">
                            <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                <i class="fas fa-info-circle mr-2"></i>
                                {{ __('Жоба туралы') }}
                            </h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between items-start">
                                    <span class="text-gray-600 font-medium">{{ __('Кезең:') }}</span>
                                    <span class="text-gray-800 font-semibold">{{ $project->years }}</span>
                                </div>
                                @if($project->month)
                                    <div class="flex justify-between items-start">
                                        <span class="text-gray-600 font-medium">{{ __('Ұзақтығы:') }}</span>
                                        <span class="text-gray-800">{{ $project->month }} {{ __('ай') }}</span>
                                    </div>
                                @endif
                                <div class="flex justify-between items-start">
                                    <span class="text-gray-600 font-medium">{{ __('Категория:') }}</span>
                                    <span class="text-gray-800">{{ $project->category_id }}</span>
                                </div>
                                @if($project->created_at)
                                    <div class="flex justify-between items-start">
                                        <span class="text-gray-600 font-medium">{{ __('Қосылған:') }}</span>
                                        <span class="text-gray-800">{{ date('d.m.Y', $project->created_at) }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Related Projects -->
                        @php
                            $relatedProjects = \App\Models\Science\ScientificProject::where('years', $project->years)
                                ->where('id', '!=', $project->id)
                                ->limit(5)
                                ->get();
                        @endphp
                        
                        @if($relatedProjects->count() > 0)
                            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
                                <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                    <i class="fas fa-project-diagram mr-2"></i>
                                    {{ __('Сол кездегі жобалар') }}
                                </h3>
                                <div class="space-y-3">
                                    @foreach($relatedProjects as $relatedProject)
                                        <a href="{{ route('science.projects.show', ['locale' => app()->getLocale(), 'id' => $relatedProject->id]) }}" 
                                           class="block p-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                                            <h4 class="text-sm font-medium text-gray-800 line-clamp-2 mb-1">
                                                {{ $relatedProject->localized_name }}
                                            </h4>
                                            <p class="text-xs text-gray-600">
                                                {{ Str::limit($relatedProject->localized_supervisor, 60) }}
                                            </p>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Quick Actions -->
                        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
                            <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                <i class="fas fa-external-link-alt mr-2"></i>
                                {{ __('Пайдалы сілтемелер') }}
                            </h3>
                            <div class="space-y-2">
                                <a href="{{ route('science.projects.index', ['locale' => app()->getLocale()]) }}" 
                                   class="block p-2 text-sm text-gray-600 hover:text-shakarim-blue hover:bg-gray-50 rounded transition duration-200">
                                    {{ __('Барлық жобалар') }}
                                </a>
                                <a href="{{ route('science.best-teachers', ['locale' => app()->getLocale()]) }}" 
                                   class="block p-2 text-sm text-gray-600 hover:text-shakarim-blue hover:bg-gray-50 rounded transition duration-200">
                                    {{ __('Үздік оқытушылар') }}
                                </a>
                                <a href="{{ route('science.aspirants', ['locale' => app()->getLocale()]) }}" 
                                   class="block p-2 text-sm text-gray-600 hover:text-shakarim-blue hover:bg-gray-50 rounded transition duration-200">
                                    {{ __('Аспиранттар') }}
                                </a>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-200">
                            <h3 class="text-lg font-bold text-shakarim-blue mb-3 flex items-center">
                                <i class="fas fa-phone mr-2"></i>
                                {{ __('Байланыс') }}
                            </h3>
                            <div class="text-sm text-gray-700 space-y-2">
                                <p>{{ __('Ғылыми бөлім:') }}</p>
                                <p class="font-medium">+7 (7222) 31-31-75</p>
                                <p class="text-blue-600">science@shakarim.kz</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@push('scripts')
<script>
function shareProject() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $project->localized_name }}',
            text: '{{ __("Шәкәрім университетінің ғылыми жобасы") }}',
            url: window.location.href
        });
    } else {
        // Fallback - copy to clipboard
        navigator.clipboard.writeText(window.location.href).then(function() {
            alert('{{ __("Сілтеме көшірілді!") }}');
        });
    }
}

// Print styles
window.addEventListener('beforeprint', function() {
    document.body.classList.add('printing');
});

window.addEventListener('afterprint', function() {
    document.body.classList.remove('printing');
});
</script>

<style>
@media print {
    .sidebar, .navigation, .breadcrumbs {
        display: none !important;
    }
    .lg\:col-span-3 {
        grid-column: span 4 !important;
    }
    .bg-gradient-to-r {
        background: #2563eb !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    body {
        font-size: 12pt;
        line-height: 1.4;
    }
    h1 { font-size: 18pt; }
    h2 { font-size: 16pt; }
    h3 { font-size: 14pt; }
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.prose {
    max-width: none;
}

.prose p {
    margin-bottom: 1rem;
}

.prose ul, .prose ol {
    margin: 1rem 0;
    padding-left: 1.5rem;
}

.prose li {
    margin-bottom: 0.5rem;
}
</style>
@endpush

</x-layout>