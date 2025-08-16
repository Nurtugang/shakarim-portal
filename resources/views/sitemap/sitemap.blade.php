{{-- resources/views/sitemap/sitemap.blade.php --}}
<x-layout>
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{__('Главная страница')}}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Карта сайта') }}</span>
            </nav>
        </div>
    </section>
    
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Основные разделы -->
        <section class="mb-12">
            <div class="bg-white rounded-lg shadow-md p-3 md:p-6 mb-8">
                <h2 class="text-xl md:text-2xl font-semibold text-gray-800 mb-4 md:mb-6 flex items-center">
                    <i class="fas fa-sitemap text-shakarim-blue mr-2 md:mr-3"></i>
                    {{ __('Основные разделы') }}
                </h2>
                
                <!-- Мобильная версия - 2 колонки СО СПИСКАМИ -->
                <div class="md:hidden grid grid-cols-1 gap-4">
                    @foreach($menu as $item)
                        @php $locale = app()->getLocale(); @endphp
                        <div class="border-l-4 border-shakarim-blue pl-3 bg-gray-50 rounded-r p-3">
                            <div class="mb-2">
                                <a href="{{ $item->page?->getUrl() ?? route('menu.show', ['locale' => app()->getLocale(), 'menu' => $item->id]) }}"
                                    class="text-sm font-semibold text-shakarim-blue hover:underline block">
                                        {{ $item->{'title_'.$locale} }}
                                </a>
                            </div>
                            
                            @if(isset($item->children) && count($item->children) > 0)
                                <ul class="space-y-1 ml-2">
                                    @foreach($item->children as $child)
                                        <li>
                                            <a href="{{ $child->getUrl() }}"
                                            class="text-xs text-gray-700 hover:text-shakarim-blue block">
                                                • {{ $child->{'title_'.$locale} }}
                                            </a>
                                            
                                            @if(isset($child->children) && count($child->children) > 0)
                                                <ul class="ml-3 mt-1 space-y-1">
                                                    @foreach($child->children as $grand)
                                                        <li>
                                                            <a href="{{ $grand->getUrl() }}"
                                                            class="text-xs text-gray-600 hover:text-shakarim-blue block">
                                                                - {{ $grand->{'title_'.$locale} }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Десктопная версия -->
                <div class="hidden md:grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($menu as $item)
                        @php $locale = app()->getLocale(); @endphp
                        <div class="border-l-4 border-shakarim-blue pl-4">
                            <div class="mb-3">
                                <a href="{{ $item->page?->getUrl() ?? route('menu.show', ['locale' => app()->getLocale(), 'menu' => $item->id]) }}"
                                    class="text-lg font-semibold text-shakarim-blue hover:underline flex items-center">
                                        <i class="fas fa-folder-open mr-2"></i>
                                        {{ $item->{'title_'.$locale} }}
                                </a>
                            </div>
                            
                            @if(isset($item->children) && count($item->children) > 0)
                                <ul class="space-y-2">
                                    @foreach($item->children as $child)
                                        <li class="ml-4">
                                            <a href="{{ $child->getUrl() }}"
                                               class="text-gray-700 hover:text-shakarim-blue transition-colors duration-150 flex items-center">
                                                <i class="fas fa-file-alt text-gray-400 mr-2 text-sm"></i>
                                                {{ $child->{'title_'.$locale} }}
                                            </a>
                                            
                                            @if(isset($child->children) && count($child->children) > 0)
                                                <ul class="ml-6 mt-2 space-y-1">
                                                    @foreach($child->children as $grand)
                                                        <li>
                                                            <a href="{{ $grand->getUrl() }}"
                                                               class="text-sm text-gray-600 hover:text-shakarim-blue transition-colors duration-150 flex items-center">
                                                                <i class="fas fa-chevron-right text-gray-300 mr-2 text-xs"></i>
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
                        </div>
                    @endforeach
                    <div class="border-l-4 border-shakarim-blue pl-4">
                            <div class="mb-3">
                                <a href=""
                                   class="text-lg font-semibold text-shakarim-blue hover:underline flex items-center">
                                    <i class="fas fa-folder-open mr-2"></i>
                                    {{ __('Дополнительные разделы') }}
                                </a>
                            </div>
                            
                            <ul class="space-y-2">
                                <li class="ml-4">
                                    <a href="{{ route('news', ['locale' => app()->getLocale()]) }}"
                                        class="text-gray-700 hover:text-shakarim-blue transition-colors duration-150 flex items-center">
                                        <i class="fas fa-file-alt text-gray-400 mr-2 text-sm"></i>
                                        {{ __('Новости') }}
                                    </a>
                                </li>
                                <li class="ml-4">
                                    <a href="{{ route('announcements.index', ['locale' => app()->getLocale()]) }}"
                                        class="text-gray-700 hover:text-shakarim-blue transition-colors duration-150 flex items-center">
                                        <i class="fas fa-file-alt text-gray-400 mr-2 text-sm"></i>
                                        {{ __('Объявления') }}
                                    </a>
                                </li>
                                <li class="ml-4">
                                    <a href="{{ route('rector.blog', ['locale' => app()->getLocale()]) }}"
                                        class="text-gray-700 hover:text-shakarim-blue transition-colors duration-150 flex items-center">
                                        <i class="fas fa-file-alt text-gray-400 mr-2 text-sm"></i>
                                        {{ __('Блог ректора') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                </div>
            </div>
        </section>

        <!-- Футерные ссылки -->
        <section>
            <div class="bg-white rounded-lg shadow-md p-3 md:p-6">
                <h2 class="text-xl md:text-2xl font-semibold text-gray-800 mb-4 md:mb-6 flex items-center">
                    <i class="fas fa-link text-shakarim-blue mr-2 md:mr-3"></i>
                    {{ __('Дополнительная информация') }}
                </h2>
                
                <!-- Мобильная версия футера - 2 колонки -->
                <div class="md:hidden grid grid-cols-1 gap-4">
                    @foreach($footer_menu as $section)
                        @php $locale = app()->getLocale(); @endphp
                        <div class="border rounded-lg p-3 bg-gray-50">
                            <div class="mb-2">
                                <a href="{{ $section->page?->getUrl() ?? route('menu.show', ['locale' => app()->getLocale(), 'menu' => $section->id]) }}"
                                    class="text-sm font-semibold text-shakarim-blue hover:underline block">
                                    {{ $section->{'title_'.$locale} }}
                                </a>
                            </div>
                            
                            @if(isset($section->children) && count($section->children) > 0)
                                <ul class="space-y-1 ml-2">
                                    @foreach($section->children as $link)
                                        <li>
                                            <a href="{{ $link->getUrl() }}"
                                            class="text-xs text-gray-700 hover:text-shakarim-blue block">
                                                • {{ $link->{'title_'.$locale} }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Десктопная версия футера -->
                <div class="hidden md:grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($footer_menu as $section)
                        @php $locale = app()->getLocale(); @endphp
                        <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                            <div class="mb-3">
                                <a href="{{ $section->page?->getUrl() ?? route('menu.show', ['locale' => app()->getLocale(), 'menu' => $section->id]) }}"
                                    class="text-lg font-semibold text-shakarim-blue hover:underline flex items-center">
                                    <i class="fas fa-folder mr-2"></i>
                                    {{ $section->{'title_'.$locale} }}
                                </a>
                            </div>
                            
                            @if(isset($section->children) && count($section->children) > 0)
                                <ul class="space-y-2">
                                    @foreach($section->children as $link)
                                        <li>
                                            <a href="{{ $link->getUrl() }}"
                                               class="text-gray-700 hover:text-shakarim-blue transition-colors duration-150 flex items-center text-sm">
                                                <i class="fas fa-chevron-right text-gray-400 mr-2 text-xs"></i>
                                                {{ $link->{'title_'.$locale} }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-layout>