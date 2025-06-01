<x-layout>
    
    <div class="container mx-auto my-8 px-4">
<x-page-banner banner="/img/news_banner.jpg" text="Баспасөз-қызметі" sub-text=""></x-page-banner>
        <div class="grid grid-cols-1 lg:grid-cols-5 mb-4 gap-8">
            <div class="lg:col-span-1">
                <div>
                  <p class="font-semibold text-lg">Баспасөз-қызметі</p>
                  <div class="bg-gray-700 h-[3px] w-[30px] my-4"></div>
                </div>
                <a class="block text-primary border-primary border-b" href="{{ route('news',['locale'=>app()->getLocale()]) }}">Жаңалықтар</a>
            </div>
            <div class="lg:col-span-4">
                <h1 class="text-3xl font-semibold uppercase">Соңғы жаңалықтар</h1>
                <div class="bg-primary h-[3px] w-[74px] my-4"></div>
               
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
                                <h1 class="font-semibold mb-2">{{ $item->{'title_'.app()->getLocale()} }}</h1>
                            </a>
                           
                        </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="my-4">
                        {{ $news->links() }}
                    </div>
                </div>
                 <div class="my-4">
        </div>
            </div>
        </div>
    </div>
</x-layout>