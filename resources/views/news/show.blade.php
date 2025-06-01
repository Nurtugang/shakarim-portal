<x-layout  :meta-title="$news->meta_title" :meta-description="$news->description">
    
    <div class="container mx-auto my-8 px-4">
<x-page-banner banner="/img/page-banner.jpeg" text="Баспасөз-қызметі" sub-text=""></x-page-banner>
        <div class="grid grid-cols-1 lg:grid-cols-5 mb-4 gap-8">
            <div class="lg:col-span-1">
                <div>
                  <p class="font-semibold text-lg">Баспасөз-қызметі</p>
                  <div class="bg-gray-700 h-[3px] w-[30px] my-4"></div>
                </div>
                <a class="block text-primary border-primary border-b" href="{{ route('news',['locale'=>app()->getLocale()]) }}">Жаңалықтар</a>
            </div>
            <div class="lg:col-span-4">
                    <div class="my-4">
                        <img class="w-full rounded" src="{{ $news->getPhoto() }}" alt="news">
                    </div>
                <h1 class="text-3xl font-semibold uppercase">{{ $news->{'title_'.app()->getLocale()} }}</h1>
                <div class="bg-primary h-[3px] w-[74px] my-4"></div>
               
                <div class="my-10">
                    <div class="tiptap-content">
                        {!! $news->{'content_'.app()->getLocale()} !!}
                    </div>
                    
                </div>

                @if ($news->gallery)
                <div class="mb-10">
                <h1 class="text-3xl font-semibold uppercase">Фотогалерея</h1>
                <div class="bg-primary h-[3px] w-[74px] my-4"></div>

                 <div class="overflow-hidden slider">
                <div class="swiper-wrapper flex items-center">
                    @foreach ($news->gallery as $image)
                    <div class="swiper-slide p-2">
                        
                        <img class="block w-full object-cover" src="/storage/{{$image}}" alt="image-">
                        
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
                </div>
                
                @endif
               
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset("/js/swiper-bundle.min.js") }}"></script>
        <script>

            var swiper = new Swiper('.slider', {

                spaceBetween: 30,
                slidesPerView: 1,
                loop: true,
                // autoplay: {
                //   delay: 2000,
                // },
                mousewheel: true,
                grabCursor: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

        </script>
    @endpush
</x-layout>