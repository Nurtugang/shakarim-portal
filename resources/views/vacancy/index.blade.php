<x-layout>
    <style>
        .vacancy-content p { margin-bottom: 0.75rem; }
        .vacancy-content ul { margin-left: 1.5rem; list-style: disc; }
        .vacancy-content li { margin-bottom: 0.5rem; }
        .vacancy-content strong { font-weight: 600; color: #1e40af; }
    </style>

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Вакансии') }}</span>
            </nav>
        </div>
    </section>

    <!-- Vacancies Section -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Page Title -->
            <div class="mb-8 mt-2">
                <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">
                    {{ __('Вакансии') }}
                </h1>
                <p class="text-gray-600 mt-2">{{ __('Актуальные предложения по трудоустройству') }}</p>
            </div>

            <!-- Vacancies List -->
            <div class="space-y-6">
                @forelse($vacancies as $vacancy)
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                        <div class="flex items-start justify-between mb-4">
                            <h2 class="text-xl font-bold text-gray-800 flex-1">
                                {{ $vacancy->position }}
                            </h2>
                            @if($vacancy->created_at)
                                <span class="text-sm text-gray-500 ml-4">
                                    {{ date('d.m.Y', $vacancy->created_at) }}
                                </span>
                            @endif
                        </div>
                        
                        <div class="vacancy-content text-gray-700 text-sm mb-4">
                            {!! Str::limit(strip_tags($vacancy->content), 300) !!}
                        </div>
                        
                        <a href="{{ route('vacancy.show', ['locale' => app()->getLocale(), 'id' => $vacancy->id]) }}" 
                           class="inline-flex items-center text-shakarim-blue font-semibold hover:underline">
                            {{ __('Подробнее') }} →
                        </a>
                    </div>
                @empty
                    <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                        <i class="fas fa-briefcase text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">{{ __('На данный момент вакансий нет') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layout>