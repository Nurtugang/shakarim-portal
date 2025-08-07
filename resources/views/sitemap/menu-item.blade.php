{{-- resources/views/sitemap/menu-item.blade.php --}}
@php $locale = app()->getLocale(); @endphp

<li class="text-gray-800">
  <a href="{{ $item->page?->getUrl() ?? '#' }}"
     class="text-shakarim-blue hover:underline transition-colors duration-150">
    {{ $item->{'title_'.$locale} }}
  </a>

  @if($item->children->isNotEmpty())
    <ul class="list-disc list-inside ml-6 mt-1 space-y-1">
      @foreach($item->children as $child)
        @include('sitemap.menu-item', ['item' => $child])
      @endforeach
    </ul>
  @endif
</li>
