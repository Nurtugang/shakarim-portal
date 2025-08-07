{{-- resources/views/sitemap/sitemap.blade.php --}}
<x-layout>
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex items-center space-x-2" aria-label="Breadcrumb">
                <a href="#" class="hover:text-shakarim-blue">Главная страница</a>
                <span class="mx-1">&#8250;</span>
                <span class="text-shakarim-grey"></span>
            </nav>
        </div>
    </section>
    <div class="max-w-7xl mx-auto px-4 py-8">
    

    {{-- Основное меню в 3 колонки на больших экранах --}}
    <section class="mb-12">
      <h2 class="text-2xl font-medium mb-4">Основное меню</h2>
      <ul class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($menu as $item)
          @php $locale = app()->getLocale(); @endphp
          <li>
            <a href="{{ $item->page?->getUrl() ?? '#' }}"
               class="block text-shakarim-blue font-semibold hover:underline mb-2">
              {{ $item->{'title_'.$locale} }}
            </a>
            @if($item->children->isNotEmpty())
              <ul class="list-disc list-inside space-y-1 text-gray-700">
                @foreach($item->children as $child)
                  <li>
                    <a href="{{ $child->page?->getUrl() ?? '#' }}"
                       class="hover:text-shakarim-blue transition-colors duration-150">
                      {{ $child->{'title_'.$locale} }}
                    </a>
                    @if($child->children->isNotEmpty())
                      <ul class="list-disc list-inside ml-4 mt-1 space-y-1">
                        @foreach($child->children as $grand)
                          <li>
                            <a href="{{ $grand->page?->getUrl() ?? '#' }}"
                               class="hover:text-shakarim-blue transition-colors duration-150">
                              {{ $grand->{'title_'.$locale} }}
                            </a>
                          </li>
                        @endforeach
                      </ul>
                    @endif
                  </li>
                @endforeach
              </ul>
            @endif
          </li>
        @endforeach
      </ul>
    </section>

    {{-- Футерные ссылки — тоже в колонках --}}
    <section>
      <h2 class="text-2xl font-medium mb-4">Ссылки в футере</h2>
      <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
        @foreach($footer_menu as $section)
          @php $locale = app()->getLocale(); @endphp
          <div>
            <h3 class="font-semibold mb-2">{{ $section->{'title_'.$locale} }}</h3>
            @if($section->children->isNotEmpty())
              <ul class="list-disc list-inside space-y-1 text-gray-700">
                @foreach($section->children as $link)
                  @if($link->page)
                    <li>
                      <a href="{{ $link->page->getUrl() }}"
                         class="hover:text-shakarim-blue transition-colors duration-150">
                        {{ $link->{'title_'.$locale} }}
                      </a>
                    </li>
                  @endif
                @endforeach
              </ul>
            @endif
          </div>
        @endforeach
      </div>
    </section>

  </div>
</x-layout>
