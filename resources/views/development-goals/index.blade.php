<x-layout>
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 1]) }}" class="hover:text-shakarim-blue">{{ __('Университет') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Цели развития') }}</span>
            </nav>
        </div>
    </section>

    <!-- Development Goals Section -->
    <section class="bg-white py-8">

        <div class="max-w-7xl mx-auto px-4">
            <!-- Page Title -->
            <div class="mb-8 mt-2">
                <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">
                    {{ __('Цели развития') }}
                </h1>
                <p class="text-gray-600 mt-2">{{ __('Цели устойчивого развития ООН в Шәкәрім Университет') }}</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Левая панель - список целей (sticky) -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 sticky top-8 max-h-[80vh] overflow-y-auto">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">{{ __('Список целей') }}</h2>
                    <div class="space-y-4">
                        @foreach($goals as $goal)
                            <div class="goal-item cursor-pointer p-4 rounded-lg border hover:bg-gray-50 transition {{ $loop->first ? 'bg-blue-50 border-shakarim-blue' : 'border-gray-200' }}" 
                                 data-goal-id="{{ $goal->id }}">
                                <div class="flex items-center space-x-4">
                                    @if($goal->thumbnail)
                                        <img src="{{ asset('storage/dev_goals/' . $goal->thumbnail) }}" 
                                             alt="{{ $goal->title }}" 
                                             class="w-16 h-16 object-cover rounded-lg">
                                    @endif
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-gray-800 text-sm">{{ $goal->title }}</h3>
                                        <p class="text-gray-600 text-xs mt-1">{{ Str::limit(strip_tags($goal->content), 60) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Правая панель - контент цели -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div id="goal-content">
                        @if($firstGoal)
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ $firstGoal->title }}</h2>
                            <div class="prose max-w-none">
                                {!! $firstGoal->content !!}
                            </div>
                        @else
                            <p class="text-gray-500 text-center">{{ __('Цели развития не найдены') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const goalItems = document.querySelectorAll('.goal-item');
            const goalContent = document.getElementById('goal-content');

            // Данные целей для JavaScript
            const goalsData = {!! json_encode($goals->keyBy('id')->map(function($goal) {
                return [
                    'title' => $goal->title,
                    'content' => $goal->content
                ];
            })) !!};

            goalItems.forEach(item => {
                item.addEventListener('click', function() {
                    const goalId = this.dataset.goalId;
                    
                    // Убираем активное состояние со всех элементов
                    goalItems.forEach(el => {
                        el.classList.remove('bg-blue-50', 'border-shakarim-blue');
                        el.classList.add('border-gray-200');
                    });
                    
                    // Добавляем активное состояние к выбранному элементу
                    this.classList.add('bg-blue-50', 'border-shakarim-blue');
                    this.classList.remove('border-gray-200');
                    
                    // Обновляем контент
                    if (goalsData[goalId]) {
                        goalContent.innerHTML = `
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">${goalsData[goalId].title}</h2>
                            <div class="prose max-w-none">${goalsData[goalId].content}</div>
                        `;
                    }
                });
            });
        });
    </script>
</x-layout>