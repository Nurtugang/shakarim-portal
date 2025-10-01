<x-layout>
    <style>
        .vacancy-content { line-height: 1.8; }
        .vacancy-content p { margin-bottom: 1rem; }
        .vacancy-content ul { margin: 1rem 0 1rem 1.5rem; list-style: disc; }
        .vacancy-content li { margin-bottom: 0.5rem; }
        .vacancy-content strong { font-weight: 600; color: #1e40af; }
        .vacancy-content a { color: #2563eb; text-decoration: underline; }
        
        @media (max-width: 640px) {
            .vacancy-content { font-size: 0.875rem; }
        }
    </style>

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('vacancy.index', ['locale' => $vacancy->language]) }}" class="hover:text-shakarim-blue">
                    {{ __('Вакансии') }}
                </a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ $vacancy->position }}</span>
            </nav>
        </div>
    </section>

    <!-- Vacancy Content Section -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Page Title -->
            <div class="mb-8">
                <h1 class="text-2xl md:text-4xl font-heading font-bold text-shakarim-blue mb-2">
                    {{ $vacancy->position }}
                </h1>
                @if($vacancy->created_at)
                    <p class="text-gray-500">
                        {{ __('Опубликовано') }}: {{ date('d.m.Y', $vacancy->created_at) }}
                    </p>
                @endif
            </div>

            <!-- Content -->
            <div class="bg-white rounded-xl shadow-lg p-4 md:p-8">
                <div class="vacancy-content text-gray-700">
                    {!! $vacancy->content !!}
                </div>
            </div>
        </div>
    </section>
</x-layout>