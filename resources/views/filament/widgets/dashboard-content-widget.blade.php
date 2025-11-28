<x-filament::widget>
    {{-- Проверяем, есть ли вообще записи --}}
    @if($records->count() > 0)
        
        {{-- Обертка с отступами между карточками --}}
        <div class="flex flex-col gap-y-4">
            
            @foreach($records as $record)
                <x-filament::section>
                    {{-- Заголовок --}}
                    <div class="flex items-center gap-x-3 mb-4 border-b pb-2">
                        <h2 class="text-lg font-bold text-gray-800 dark:text-white">
                            {{ $record->title }}
                        </h2>
                        
                        {{-- (Опционально) Дата публикации --}}
                        <span class="text-xs text-gray-400 ml-auto">
                            {{ $record->updated_at->format('d.m.Y') }}
                        </span>
                    </div>

                    {{-- Контент --}}
                    <div class="prose max-w-none dark:prose-invert text-sm text-gray-600 dark:text-gray-300">
                        {!! $record->content !!}
                    </div>
                </x-filament::section>
            @endforeach

        </div>

    @endif
</x-filament::widget>