<x-layout :metaTitle="__('Ғылыми атақ ізденушілері')">

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 28]) }}" class="hover:text-shakarim-blue">{{ __('Наука') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Ғылыми атақ ізденушілері')}}</span>
            </nav>
        </div>
    </section>

    <!-- Aspirants Section -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <!-- Заголовок страницы -->
                    <div class="mb-8 mt-2">
                        <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">
                            {{ __('Ғылыми атақ ізденушілері')}}
                        </h1>
                        <p class="text-gray-600 mt-2">{{ __('Соискатели ученых званий и их научные работы') }}</p>
                    </div>

                    <!-- Проверка на наличие данных -->
                    @if($aspirants->count() > 0)
                        <!-- Список соискателей -->
                        <div class="space-y-4 mb-12">
                            @foreach($aspirants as $aspirant)
                                <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                                    <!-- Заголовок соискателя -->
                                    <button class="w-full px-6 py-4 bg-gray-50 hover:bg-gray-100 text-left font-medium text-shakarim-blue flex items-center justify-between transition-colors duration-200"
                                            type="button" 
                                            onclick="toggleCollapse('aspirant-{{ $aspirant->id }}')">
                                        <span class="text-lg font-semibold">{{ $aspirant->fullname }}</span>
                                        <i class="fas fa-chevron-down transform transition-transform duration-200" id="icon-aspirant-{{ $aspirant->id }}"></i>
                                    </button>

                                    <!-- Содержимое соискателя -->
                                    <div id="aspirant-{{ $aspirant->id }}" class="hidden">
                                        <div class="p-6">
                                            @if($aspirant->documents->count() > 0)
                                                <div class="space-y-4">
                                                    @foreach($aspirant->documents as $document)
                                                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                                            <div class="flex items-center space-x-3">
                                                                <!-- Иконка файла -->
                                                                <div class="flex-shrink-0">
                                                                    @if($document->is_pdf)
                                                                        <i class="fas fa-file-pdf text-red-500 text-xl"></i>
                                                                    @elseif($document->is_doc)
                                                                        <i class="fas fa-file-word text-blue-500 text-xl"></i>
                                                                    @else
                                                                        <i class="fas fa-file text-gray-500 text-xl"></i>
                                                                    @endif
                                                                </div>
                                                                
                                                                <!-- Информация о документе -->
                                                                <div class="flex-grow">
                                                                    <a href="{{ $document->file_url }}" 
                                                                       target="_blank"
                                                                       class="text-shakarim-blue hover:text-shakarim-dark font-medium">
                                                                        {{ $document->name }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Кнопка скачивания -->
                                                            <a href="{{ $document->file_url }}" 
                                                               target="_blank"
                                                               class="inline-flex items-center px-3 py-1 text-sm bg-shakarim-blue text-white rounded hover:bg-shakarim-dark transition-colors duration-200">
                                                                <i class="fas fa-download mr-1"></i>
                                                                {{ __('Скачать') }}
                                                            </a>
                                                        </div>

                                                        @if(!$loop->last)
                                                            <hr class="border-gray-200">
                                                        @endif
                                                    @endforeach
                                                </div>
                                                
                                                @if($aspirant->formatted_date)
                                                    <div class="mt-4 pt-4 border-t border-gray-200">
                                                        <span class="text-sm text-gray-500">
                                                            <i class="fas fa-calendar-alt mr-1"></i>
                                                            {{ $aspirant->formatted_date }}
                                                        </span>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="text-center py-6">
                                                    <i class="fas fa-file-alt text-gray-300 text-3xl mb-2"></i>
                                                    <p class="text-gray-500">{{ __('Документы отсутствуют') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Сообщение когда нет данных -->
                        <div class="text-center py-12">
                            <div class="max-w-md mx-auto">
                                <i class="fas fa-user-graduate text-6xl text-gray-300 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-600 mb-2">
                                    {{ __('Соискателей не найдено') }}
                                </h3>
                                <p class="text-gray-500 mb-6">
                                    {{ __('Информация о соискателях ученых званий в настоящее время обновляется') }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="space-y-6">
                        <!-- Статистика -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                <i class="fas fa-chart-bar mr-2"></i>
                                {{ __('Статистика') }}
                            </h3>
                            <div class="space-y-3">
                                @if($aspirants->count() > 0)
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">{{ __('Всего соискателей:') }}</span>
                                        <span class="font-semibold text-shakarim-blue">{{ $aspirants->count() }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">{{ __('Документов:') }}</span>
                                        <span class="font-semibold text-shakarim-blue">{{ $aspirants->sum(fn($a) => $a->documents->count()) }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@push('scripts')
<script>
function toggleCollapse(elementId) {
    const element = document.getElementById(elementId);
    const icon = document.getElementById('icon-' + elementId);
    
    if (element.classList.contains('hidden')) {
        element.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        element.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}

function scrollToAspirant(aspirantId) {
    const element = document.getElementById(aspirantId);
    if (element) {
        // Открываем секцию если она закрыта
        if (element.classList.contains('hidden')) {
            toggleCollapse(aspirantId);
        }
        // Скроллим к элементу
        element.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}
</script>
@endpush

</x-layout>