<x-layout>
    <link rel="stylesheet" href="{{ asset('css/custom/minor.show.css') }}">
    
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
            <a href="{{ route('site.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
            <span class="mx-1">&#8250;</span>
            <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 10]) }}" class="hover:text-shakarim-blue">{{ __('Образование') }}</a>
            <span class="mx-1">&#8250;</span>
            <a href="{{ route('academy.op.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Образовательные программы') }}</a>
            <span class="mx-1">&#8250;</span>
            <span class="text-shakarim-blue font-semibold">{{ $minor->title }}</span>
        </nav>
        </div>
    </section>

    <!-- Minor Content Section -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Page Title -->
            <div class="mb-8">
                <h1 class="text-2xl md:text-4xl font-heading font-bold text-shakarim-blue">
                    {{ $minor->title }}
                </h1>
            </div>

            <!-- Content -->
            <div class="bg-white md:p-8">
                <div class="minor-content text-gray-700">
                    {!! $minor->content !!}
                </div>
            </div>
            
        </div>
    </section>
</x-layout>