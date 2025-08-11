<x-layout>
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">Главная страница</a>
                <span>&#8250;</span>
                <a href="{{ route('news', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">Жаңалықтар</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ $news->{'title_' . app()->getLocale()} }}</span>
            </nav>
        </div>
    </section>

    <!-- News Content -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-8 mt-2">
                {{ $news->{'title_' . app()->getLocale()} }}
            </h1>

            <!-- News Image -->
            @if($news->image)
                <div class="mb-8">
                    <img src="{{ Storage::url('news/' . $news->image) }}" 
                         alt="{{ $news->{'title_' . app()->getLocale()} }}" 
                         class="w-full max-w-4xl mx-auto rounded-lg shadow-lg">
                </div>
            @endif

            <div class="bg-gray-50 rounded-xl shadow p-4 md:p-6 text-gray-700 text-sm leading-relaxed">
                {!! $news->{'content_' . app()->getLocale()} !!}
            </div>
        </div>
    </section>
</x-layout>