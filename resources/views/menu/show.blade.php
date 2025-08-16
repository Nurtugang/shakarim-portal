{{-- resources/views/menu/show.blade.php --}}
<x-layout>
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2">
                <a href="{{ route('site.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{__('Главная страница')}}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ $menu->{'title_'.app()->getLocale()} }}</span>
            </nav>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-lg font-bold text-shakarim-blue mb-8">{{ $menu->{'title_'.app()->getLocale()} }}</h1>
        
        <!-- Мобильный вид - простой список -->
        <div class="md:hidden">
            <div class="grid grid-cols-2 gap-3">
                @foreach($children as $child)
                    <div class="bg-white border-l-4 border-shakarim-blue p-2 shadow-sm">
                        <a href="{{ $child->getUrl() }}" class="text-sm font-medium text-shakarim-blue hover:underline block">
                            {{ $child->{'title_'.app()->getLocale()} }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Десктопный вид - карточки -->
        <div class="hidden md:grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($children as $child)
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <h3 class="text-xl font-semibold">
                        <a href="{{ $child->getUrl() }}" class="text-shakarim-blue hover:underline">
                            {{ $child->{'title_'.app()->getLocale()} }}
                        </a>
                    </h3>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>