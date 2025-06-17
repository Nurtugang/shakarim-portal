<x-layout>
    @push('styles')
<link rel="stylesheet" href="{{ asset("css/content.css") }}">
@endpush
   <main class="page-wrapper">
    <div class="content-container">
        <!-- Баннер страницы -->
        

        <x-page-banner banner="/img/building.webp" text="Жаңалықтар" sub-text=""></x-page-banner>

        <!-- Основная сетка контента -->
        <div class="content-grid">
            <!-- Боковая навигация -->
             <div class="sidebar-nav animate-fade-in-up">
                {{-- <ul>
                    <li><a href="{{ route('news',['locale'=>app()->getLocale()]) }}">Жаңалықтар</a></li>
                </ul> --}}
            </div>
            
            <!-- Основной контент -->
            <div class="main-content animate-fade-in-down">
                <h1>Соңғы жаңалықтар</h1>
                <div class="my-10">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach ($news as $item)
                        <div class="flex flex-col border rounded">
                        <div class="h-52">
                            <img class="w-full h-full object-cover" src="{{ $item->getPhoto() }}" alt="photo">
                        </div>
                        <div class="grow bg-gray-200 p-4">
                            <p class="mb-2 text-gray-500">{{ $item->getFormattedDate() }}</p>
                            <a href="{{ route('news.show',['locale'=>app()->getLocale(),'news'=>$item]) }}">
                                <h2 class="font-semibold text-lg mb-2">{{ $item->{'title_'.app()->getLocale()} }}</h2>
                            </a>
                           
                        </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="my-4">
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
  
</x-layout>