{{-- resources/views/sitemap/sitemap.blade.php --}}
<x-layout>
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ route('site.index', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">Главная страница</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">Карта сайта</span>
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
              @if(isset($item->children) && count($item->children) > 0)
                <ul class="list-disc list-inside space-y-1 text-gray-700">
                  @foreach($item->children as $child)
                    <li>
                      <a href="{{ $child->getUrl() }}"
                        class="hover:text-shakarim-blue transition-colors duration-150">
                        {{ $child->{'title_'.$locale} }}
                      </a>
                      @if(isset($child->children) && count($child->children) > 0)
                        <ul class="list-disc list-inside ml-4 mt-1 space-y-1">
                          @foreach($child->children as $grand)
                            <li>
                              <a href="{{ $grand->getUrl() }}"
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
        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
          @foreach($footer_menu as $section)
            @php $locale = app()->getLocale(); @endphp
            <div>
              <a href="{{ $item->page?->getUrl() ?? '#' }}"
                class="block text-shakarim-blue font-semibold hover:underline mb-2">
                {{ $section->{'title_'.$locale} }}
              </a>
              @if(isset($section->children) && count($section->children) > 0)
                <ul class="list-disc list-inside space-y-1 text-gray-700">
                  @foreach($section->children as $link)
                    <li>
                      <a href="{{ $link->getUrl() }}"
                        class="hover:text-shakarim-blue transition-colors duration-150">
                        {{ $link->{'title_'.$locale} }}
                      </a>
                    </li>
                  @endforeach
                </ul>
              @endif
            </div>
          @endforeach
        </div>
      </section>

    </div>
</x-layout>