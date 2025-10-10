{{-- resources/views/blocks/previews/tabs.blade.php --}}
<div class="bg-white border border-gray-200 rounded-lg p-4">
    <div class="flex items-center space-x-2 mb-2">
        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
        </svg>
        <span class="font-medium text-gray-700">Блок табов</span>
    </div>
    
    @if(isset($tabs) && count($tabs) > 0)
        <div class="space-y-2">
            <div class="flex space-x-1 border-b border-gray-200">
                @foreach($tabs as $index => $tab)
                    <div class="px-3 py-1 text-sm {{ $index === 0 ? 'border-b-2 border-blue-500 text-blue-600' : 'text-gray-500' }}">
                        {{ $tab['title'] ?? 'Таб ' . ($index + 1) }}
                    </div>
                @endforeach
            </div>
            <div class="text-sm text-gray-600">
                Количество табов: {{ count($tabs) }}
            </div>
        </div>
    @else
        <div class="text-gray-500 text-sm">Добавьте табы для отображения</div>
    @endif
</div>