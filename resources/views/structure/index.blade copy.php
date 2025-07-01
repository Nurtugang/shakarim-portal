<x-layout>
@push('styles')
<link rel="stylesheet" href="{{ asset("css/structure-style.css") }}">
 <link rel="stylesheet" href="{{ asset("css/content.css") }}">
 <link rel="stylesheet" href="{{ asset("css/staff.css") }}">
@endpush
        <!-- ХЛЕБНЫЕ КРОШКИ -->
<div class="breadcrumb-container">
    <div class="breadcrumb">
        <a href="/" title="Домашняя страница"><i class="fas fa-home"></i></a>
        <span class="breadcrumb-separator">〉</span>
        <span class="current">Организационная структура</span>
    </div>
</div>
<div  class="content structure-bg">

<ol class="organizational-chart overflow-hidden">
    <li>
        <div class="structure-header justify-content-center align-items-center">
                <a style="z-index:10" target="_blank" href="https://www.gov.kz/memleket/entities/sci?lang=kz">
                    <button class="item green-button">{{ $node->{'title_'.app()->getLocale()} }}</button>
                </a>
        </div>
    </li>
     @if ($node->children->isNotEmpty())

     @foreach ($node->children as $child)
      @switch($node->layout_type)
        @case('center_with_sides')
            @php
                $leftChildren = $node->children->where('position', 'left')->sortBy('sort_order');
                $rightChildren = $node->children->where('position', 'right')->sortBy('sort_order');
            @endphp
            <li>
        <div class="structure-header justify-content-center align-items-center">

            <div class="d-flex flex-column align-items-center">
                <a class="top-inline pb-2 w-100 px-4 position-relative" href="/kz/structure/corporate-secretary">
                    <button style="z-index:10" class="position-relative main-button d-block w-100">Корпоративтік хатшы</button>
                </a>
                <a class="center-inline pb-2 w-100 px-4 position-relative" href="/kz/structure/internal-audit-service">
                    <button style="z-index:10" class="position-relative main-button d-block w-100">Ішкі аудит қызметі</button>
                </a>
                <a class="bottom-inline pb-2 w-100 px-4 position-relative" href="/kz/structure/sluzhba-komplayens">
                    <button style="z-index:10" class="position-relative main-button d-block w-100">Комплаенс қызметі</button>
                </a>
            </div>
            
                <a class="d-block line position-relative" style="z-index:10" href="/kz/board-of-directors/list?pathway=universitet">
                    <button class="position-relative item green-button">ДИРЕКТОРЛАР КЕҢЕСІ</button>
                </a>

            <div class="d-flex flex-column align-items-center">
                <a class="top-inline-right pb-2 w-100 px-4 position-relative" href="#">
                    <button style="z-index:10" class="position-relative main-button d-block w-100">Аудит жөніндегі комитет</button>
                </a>
                <a class="center-inline-right pb-2 w-100 px-4 position-relative" href="#">
                    <button style="z-index:10" class="position-relative main-button d-block w-100">Кадр және сыйақылар жөніндегі комитет</button>
                </a>
                <a class="bottom-inline-right pb-2 w-100 px-4 position-relative" href="#">
                    <button style="z-index:10" class="position-relative main-button d-block w-100">Стратегиялық жоспарлау жөніндегі комитет</button>
                </a>
            </div>
        </div>
    </li>

        @break
    

     @endforeach

    
    
    <li>
        <div class="structure-header justify-content-center align-items-center">
            <div class="d-flex flex-column align-items-center">
                <a class="pb-2 w-100 position-relative" href="/kz/structure/uchenyy-sovet">
                    <button style="z-index:10" class="position-relative main-button d-block w-100">Ғылыми кеңес</button>
                </a>
            </div>
                      <a class="d-block line position-relative" style="z-index:10" href="/kz/structure/vice-rector/chairman-of-the-board-rector">
                <button class="position-relative item green-button">Басқарма төрағасы - Ректор</button>
           </a>

                      <div class="d-flex flex-column align-items-center">
                <a class="pb-2 w-100 position-relative" href="/kz/structure/management-board">
                    <button style="z-index:10" class="position-relative main-button d-block w-100">Басқарма</button>
                </a>
            </div>
        </div>
        </li>
        <li>
            <ol>
        @foreach ($structures as $item)
        <li>
                <div>
                    <a href="{{ $item->getUrl() }}"><h2>{{ $item->{'title_'.app()->getLocale()} }}</h2></a>
                </div>
                @if ($item->children->count() > 0)
                <ol>
                    @foreach ($item->children as $child)
                    <li>
                        <div>
                            <a href="{{ $child->getUrl() }}">{{ $child->{'title_'.app()->getLocale()} }}</a>
                        </div> 
                         @if ($child->children->count() > 0)
                <ol>
                    @foreach ($child->children as $child_child)
                    <li>
                        <div>
                            <a href="{{ $child_child->getUrl() }}">{{ $child_child->{'title_'.app()->getLocale()} }}</a>
                        </div>                            
                    </li>
                    @endforeach
                    </ol>
                @endif                           
                    </li>
                    @endforeach
                    </ol>
                @endif
            </li>   
             @endforeach   
        </ol>
        </li>
    </li>
    @endif
</ol>
</div>

@push('scripts')
<script>
    
</script>
@endpush

</x-layout>