<x-layout>
    @section('meta_title', __('Реестр дипломов 2025') . ' - Shakarim University')
    @section('meta_robots', 'noindex, nofollow')

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-2 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-xs text-gray-500 flex flex-wrap items-center gap-x-2">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Реестр дипломов 2025') }}</span>
            </nav>
        </div>
    </section>

    <section class="bg-white py-4 min-h-screen">
        <div class="max-w-7xl mx-auto px-4">
            
            <div class="mb-3 flex flex-col md:flex-row md:items-end justify-between gap-3">
                <div>
                    <h1 class="text-xl font-bold text-shakarim-blue">
                        {{ __('Реестр дипломов 2025') }}
                    </h1>
                    <p class="text-gray-500 text-xs">{{ __('Электронные версии дипломов') }}</p>
                </div>

                <!-- Форма с твоим роутом -->
                <form method="GET" class="flex items-center gap-2">
                    <label for="limit" class="text-xs text-gray-700 font-bold">{{ __('На странице:') }}</label>
                    <select name="limit" id="limit" onchange="this.form.submit()" style="background-image: none !important;"
                            class="border border-gray-300 rounded text-xs px-2 py-1 h-8 bg-white focus:ring-1 focus:ring-shakarim-blue outline-none cursor-pointer shadow-sm">
                        <option value="15" {{ $current_limit == 15 ? 'selected' : '' }}>15</option>
                        <option value="50" {{ $current_limit == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $current_limit == 100 ? 'selected' : '' }}>100</option>
                        <option value="-1" {{ $current_limit == -1 ? 'selected' : '' }}>{{ __('Все') }}</option>
                    </select>
                </form>
            </div>

            <div class="bg-white rounded border border-gray-300 overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse text-sm">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700 border-b border-gray-300 text-xs uppercase">
                                <th class="px-2 py-2 text-center w-8 font-bold border-r border-gray-200">#</th>
                                <th class="px-3 py-2 text-left font-bold w-1/4 border-r border-gray-200">{{ __('ФИО Выпускника') }}</th>
                                <th class="px-3 py-2 text-left font-bold w-1/4 border-r border-gray-200">{{ __('Программа') }}</th>
                                <th class="px-3 py-2 text-left font-bold border-r border-gray-200">{{ __('Диплом') }}</th>
                                <th class="px-2 py-2 text-center w-16 font-bold">{{ __('Файл') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($students as $index => $student)
                                <tr class="hover:bg-blue-50 transition-colors odd:bg-white even:bg-gray-50">
                                    <!-- # -->
                                    <td class="px-2 py-1.5 text-center text-gray-500 text-xs border-r border-gray-200">
                                        {{ $students->firstItem() + $index }}
                                    </td>
                                    
                                    <!-- ФИО -->
                                    <td class="px-3 py-1.5 border-r border-gray-200 align-middle">
                                        <div class="font-bold text-gray-800 leading-tight">
                                            {{ $student['lastname'] }} {{ $student['firstname'] }}
                                        </div>
                                        <div class="text-xs text-gray-500">{{ $student['patronymic'] }}</div>
                                        <div class="text-[10px] text-gray-400">ID: {{ $student['student_id'] }}</div>
                                    </td>

                                    <!-- Программа -->
                                    <td class="px-3 py-1.5 border-r border-gray-200 align-middle">
                                        <span class="inline-block px-1.5 rounded-[3px] text-[10px] font-bold bg-blue-100 text-blue-800 mb-0.5">
                                            {{ $student['degree'] }}
                                        </span>
                                        <div class="text-xs font-medium text-gray-700 leading-tight">
                                            {{ Str::limit($student['op'], 50) }}
                                        </div>
                                    </td>

                                    <!-- Диплом (Серия и номер в одну строку для экономии места) -->
                                    <td class="px-3 py-1.5 border-r border-gray-200 align-middle">
                                        <div class="flex flex-col text-xs">
                                            <span class="font-mono font-bold text-gray-800">
                                                {{ $student['diploma_series'] }} {{ $student['diploma_number'] }}
                                            </span>
                                            <span class="text-gray-500 text-[10px]">
                                                Рег: {{ $student['reg_number'] }} 
                                                <span class="text-gray-300">|</span> 
                                                {{ \Carbon\Carbon::parse($student['issue_date'])->format('d.m.Y') }}
                                            </span>
                                        </div>
                                    </td>

                                    <!-- Кнопка -->
                                    <td class="px-2 py-1.5 text-center align-middle">
                                        <a href="{{ route('diplomas.download', ['id' => $student['student_id']]) }}" 
                                           target="_blank"
                                           class="inline-flex items-center justify-center w-7 h-7 rounded bg-white border border-gray-300 text-red-600 hover:bg-red-600 hover:text-white hover:border-red-600 transition shadow-sm"
                                           title="Скачать">
                                            <i class="fas fa-file-pdf text-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-8 text-center text-gray-500 text-sm">
                                        {{ __('Список пуст') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Пагинация -->
                @if($current_limit != -1 && $students->hasPages())
                    <div class="bg-white px-3 py-2 border-t border-gray-200 text-xs">
                        {{ $students->appends(['limit' => $current_limit])->links() }} 
                    </div>
                @endif
            </div>
            
            <div class="mt-2 text-right text-[10px] text-gray-400">
                {{ __('Всего записей:') }} {{ $students->total() }}
            </div>

        </div>
    </section>
</x-layout>