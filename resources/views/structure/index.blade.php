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
                    <button class="item green-button">{{ $structures->{'title_'.app()->getLocale()} }}</button>
                </a>
        </div>
    </li>
     @if ($structures->children->isNotEmpty())

     @foreach ($structures->children as $child)

      @include('structure.partials.node', ['node' => $child])
     @endforeach

        
    </li>
    @endif
</ol>
</div>

@push('scripts')
<script>
    
</script>
@endpush

</x-layout>