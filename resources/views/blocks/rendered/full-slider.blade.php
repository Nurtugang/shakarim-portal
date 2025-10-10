<div class="overflow-hidden header-slider relative h-screen [max-height:calc(100vh-180px)] shadow-md border-t lg:border-none border-gray-200">
    <div class="swiper-wrapper flex items-stretch h-full">
       @foreach ($slides as $slide)
       <div class="swiper-slide h-full max-h-screen overflow-hidden">
            <div class="relative h-full">
                <img src="/storage/{{ $slide['banner'] }}" class="absolute inset-0 object-cover object-left h-full w-full lg:h-auto lg:object-right md:object-center" alt="">
                <div class="relative h-full z-20">
                   
         <div class="container mx-auto h-full">
<div class="flex items-center h-full space-x-10 text-primary">
<img src="/img/element.png" class="h-full" alt="">    
                        <div x-data="{ shown: false }" x-intersect:enter="shown = true" 
                        x-intersect:leave="shown = false" class="w-full" :class="{
             'opacity-0': !shown,
             'opacity-100 animate-fade-in-left': shown
         }">
                        {!! $slide['text'] !!}
                    </div>
                    </div>
         </div>
                </div>
            </div>
        </div>
       @endforeach
    </div>
    <div class="swiper-pagination bottom-10!"></div>
</div>