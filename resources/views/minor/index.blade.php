<x-layout>
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Minor') }}</span>
            </nav>
        </div>
    </section>

    <!-- Minors Section -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Page Title -->
            <div class="mb-8 mt-2">
                <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">
                    {{ __('Minor') }}
                </h1>
                <p class="text-gray-600 mt-2">{{ __('Выберите дополнительную специализацию') }}</p>
            </div>


            <!-- Minors Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($minors as $minor)
                    <a href="{{ route('minor.show', ['locale' => $locale, 'id' => $minor->id]) }}" 
                    class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                        <h2 class="text-xl font-bold text-gray-800 mb-3">
                            {{ $minor->title }}
                        </h2>
                        <p class="text-gray-600 text-sm line-clamp-4">
                            {{ Str::limit(strip_tags($minor->content), 180) }}
                        </p>
                        <div class="mt-4 text-shakarim-blue font-semibold text-sm">
                            {{ __('Подробнее') }} →
                        </div>
                    </a>
                @empty
                    <div class="col-span-full bg-white rounded-xl shadow-lg p-8 text-center">
                        <i class="fas fa-inbox text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">{{ __('Нет доступных записей') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layout>