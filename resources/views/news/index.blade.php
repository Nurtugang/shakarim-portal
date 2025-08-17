<x-layout>
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('news', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Жаңалықтар')}}</a>
                @if($selectedCategory)
                    <span>&#8250;</span>
                    <span class="text-shakarim-blue font-semibold">{{ $selectedCategory->{'label_' . app()->getLocale()} }}</span>
                @endif
                @if($selectedTag)
                    <span>&#8250;</span>
                    <span class="text-shakarim-blue font-semibold">{{ $selectedTag->name }}</span>
                @endif
            </nav>
        </div>
    </section>

    <!-- News Cards -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <!-- Заголовок с информацией о фильтре -->
                    <div class="mb-8 mt-2">
                        @if($selectedTag || $selectedCategory)
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                                <div>
                                    <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">
                                        @if($selectedCategory && $selectedTag)
                                            {{ $selectedCategory->{'label_' . app()->getLocale()} }} - {{ $selectedTag->name }}
                                        @elseif($selectedCategory)
                                            {{ $selectedCategory->{'label_' . app()->getLocale()} }}
                                        @else
                                            {{ $selectedTag->name }}
                                        @endif
                                    </h1>
                                    <p class="text-gray-600 mt-2">{{ __('Найдено новостей:')}}' {{ $news->total() }}</p>
                                </div>
                                <div class="flex space-x-2">
                                    @if($selectedTag)
                                        <a href="{{ route('news', array_merge(['locale' => app()->getLocale()], $selectedCategory ? ['category' => $selectedCategory->id] : [])) }}" 
                                           class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 text-sm rounded-full hover:bg-red-200 transition duration-200">
                                            <i class="fas fa-times mr-1 text-xs"></i>
                                            {{ $selectedTag->name }}
                                        </a>
                                    @endif
                                    @if($selectedCategory)
                                        <a href="{{ route('news', array_merge(['locale' => app()->getLocale()], $selectedTag ? ['tag' => $selectedTag->id] : [])) }}" 
                                           class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 text-sm rounded-full hover:bg-red-200 transition duration-200">
                                            <i class="fas fa-times mr-1 text-xs"></i>
                                            {{ $selectedCategory->{'label_' . app()->getLocale()} }}
                                        </a>
                                    @endif
                                    <a href="{{ route('news', ['locale' => app()->getLocale()]) }}" 
                                       class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition duration-200">
                                        <i class="fas fa-refresh mr-2"></i>
                                        {{ __('Все новости')}}
                                    </a>
                                </div>
                            </div>
                        @else
                            <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">{{ __('Жаңалықтар')}}</h1>
                        @endif
                    </div>

                    <!-- Проверка на наличие новостей -->
                    @if($news->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-12">
                            @foreach ($news as $item)
                                <div class="border rounded-lg bg-white overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                                    <!-- Изображение новости -->
                                    @if($item->image)
                                        <div class="h-48 w-full overflow-hidden bg-gray-100">
                                            <a href="{{ route('news.show', ['news' => $item, 'locale' => app()->getLocale()]) }}">
                                                <img src="{{ Storage::url('news/' . $item->image) }}" 
                                                    alt="{{ $item->{'title_' . app()->getLocale()} }}" 
                                                    class="w-full h-full object-cover object-center hover:scale-105 transition-transform duration-300">
                                            </a>
                                        </div>
                                    @else
                                        <div class="h-48 w-full bg-gray-200 flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400 text-3xl"></i>
                                        </div>
                                    @endif
                                    
                                    <!-- Контент карточки -->
                                    <div class="p-6 flex flex-col justify-between min-h-[180px]">
                                        <div>
                                            <div class="flex items-center justify-between mb-3">
                                                <span class="text-gray-400 text-sm">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d.m.Y') }}
                                                </span>
                                                @if ($item->category)
                                                    <a href="{{ route('news', ['locale' => app()->getLocale(), 'category' => $item->category->id]) }}"
                                                       class="bg-shakarim-light text-white text-xs font-semibold px-3 py-1 rounded hover:bg-shakarim-blue transition">
                                                        {{ $item->category->{'label_' . app()->getLocale()} }}
                                                    </a>
                                                @endif
                                            </div>
                                            
                                            <h3 class="font-semibold text-shakarim-blue mb-4 line-clamp-3 leading-relaxed">
                                                <a href="{{ route('news.show', ['news' => $item, 'locale' => app()->getLocale()]) }}" class="hover:text-shakarim-dark">
                                                    {{ $item->{'title_' . app()->getLocale()} }}
                                                </a>
                                            </h3>
                                        </div>
                                        
                                        <a href="{{ route('news.show', ['news' => $item, 'locale' => app()->getLocale()]) }}"
                                        class="border border-shakarim-blue text-shakarim-blue rounded px-4 py-2 text-sm hover:bg-shakarim-blue hover:text-white transition w-max mt-auto">
                                                {{ __('Подробнее...')}}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="flex justify-center items-center space-x-2">
                            {{ $news->onEachSide(1)->links('vendor.pagination.tailwind') }}
                        </div>
                    @else
                        <!-- Сообщение когда нет новостей -->
                        <div class="text-center py-12">
                            <div class="max-w-md mx-auto">
                                <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-600 mb-2">
                                    @if($selectedTag || $selectedCategory)
                                        {{ __('Новостей по выбранным критериям не найдено')}}
                                    @else
                                        {{ __('Новостей пока нет')}}
                                    @endif
                                </h3>
                                <p class="text-gray-500 mb-6">
                                    @if($selectedTag || $selectedCategory)
                                        {{ __('Попробуйте изменить фильтры или просмотреть все новости')}}
                                    @else
                                        {{ __('Следите за обновлениями на нашем сайте')}}
                                    @endif
                                </p>
                                @if($selectedTag || $selectedCategory)
                                    <a href="{{ route('news', ['locale' => app()->getLocale()]) }}" 
                                       class="inline-flex items-center px-6 py-3 bg-shakarim-blue text-white rounded-lg hover:bg-shakarim-dark transition duration-200">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        {{ __('Все новости')}}
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="space-y-6">
                        <!-- Категории -->
                        @if($categories->count() > 0)
                            <div class="bg-white rounded-xl shadow-md p-6">
                                <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                    <i class="fas fa-folder mr-2"></i>
                                    {{ __('Категории')}}
                                </h3>
                                <div class="space-y-2">
                                    @foreach($categories as $category)
                                        <a href="{{ route('news', ['locale' => app()->getLocale(), 'category' => $category->id]) }}" 
                                           class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50 transition duration-200 {{ $selectedCategory && $selectedCategory->id == $category->id ? 'bg-shakarim-blue text-white hover:bg-shakarim-dark' : 'text-gray-700' }}">
                                            <span class="text-sm font-medium">{{ $category->{'label_' . app()->getLocale()} }}</span>
                                            <span class="text-xs {{ $selectedCategory && $selectedCategory->id == $category->id ? 'text-white' : 'text-gray-500' }} bg-gray-100 {{ $selectedCategory && $selectedCategory->id == $category->id ? 'bg-white bg-opacity-20' : '' }} px-2 py-1 rounded-full">
                                                {{ $category->news_count }}
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Популярные теги -->
                        @if($popularTags->count() > 0)
                            <div class="bg-white rounded-xl shadow-md p-6">
                                <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                    <i class="fas fa-tags mr-2"></i>
                                    {{ __('Популярные теги')}}
                                </h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($popularTags as $loop => $tag)
                                        @php
                                        $colorClasses = [
                                            'bg-blue-100 text-blue-800 hover:bg-blue-200',
                                            'bg-green-100 text-green-800 hover:bg-green-200', 
                                            'bg-purple-100 text-purple-800 hover:bg-purple-200',
                                            'bg-pink-100 text-pink-800 hover:bg-pink-200',
                                            'bg-indigo-100 text-indigo-800 hover:bg-indigo-200',
                                            'bg-yellow-100 text-yellow-800 hover:bg-yellow-200',
                                            'bg-red-100 text-red-800 hover:bg-red-200',
                                            'bg-orange-100 text-orange-800 hover:bg-orange-200'
                                        ][$loop->index % 8];
                                        
                                        if($selectedTag && $selectedTag->id == $tag->id) {
                                            $colorClasses = 'bg-shakarim-blue text-white hover:bg-shakarim-dark';
                                        }
                                        @endphp
                                        
                                        <a href="{{ route('news', ['locale' => app()->getLocale(), 'tag' => $tag->id]) }}" 
                                           class="px-3 py-1 {{ $colorClasses }} rounded-full text-xs font-medium transition duration-200 hover:scale-105"
                                           title="Показать все новости с тегом {{ $tag->name }}">
                                            {{ $tag->name }} ({{ $tag->news_count }})
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>