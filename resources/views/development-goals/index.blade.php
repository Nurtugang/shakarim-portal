<x-layout :metaTitle="__('Цели развития')">
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

    <!-- Main Section -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Page Title -->
            <div class="mb-8 mt-2">
                <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">
                    {{ __('Цели развития') }}
                </h1>
                <p class="text-gray-600 mt-2">{{ __('Цели устойчивого развития ООН в Шәкәрім Университет') }}</p>
            </div>

            <!-- Tab Navigation -->
            <div class="mb-6">
                <!-- Mobile horizontal tabs -->
                <div class="lg:hidden">
                    <div class="flex overflow-x-auto space-x-2 pb-2 border-b border-gray-200">
                        <button onclick="showDevTab('goals')" id="tab-goals" class="dev-tab-button active whitespace-nowrap px-4 py-3 text-sm font-medium transition-colors border-b-2">
                            <i class="fas fa-bullseye mr-2"></i>{{ __('Цели ЦУР') }}
                        </button>
                        <button onclick="showDevTab('education')" id="tab-education" class="dev-tab-button whitespace-nowrap px-4 py-3 text-sm font-medium transition-colors border-b-2">
                            <i class="fas fa-graduation-cap mr-2"></i>{{ __('Образование') }}
                        </button>
                        <button onclick="showDevTab('documents')" id="tab-documents" class="dev-tab-button whitespace-nowrap px-4 py-3 text-sm font-medium transition-colors border-b-2">
                            <i class="fas fa-file-pdf mr-2"></i>{{ __('Документы') }}
                        </button>
                    </div>
                </div>

                <!-- Desktop tabs -->
                <div class="hidden lg:block">
                    <div class="border-b border-gray-200">
                        <nav class="flex space-x-8">
                            <button onclick="showDevTab('goals')" id="desktop-tab-goals" class="desktop-dev-tab-button active py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                                <i class="fas fa-bullseye mr-2"></i>{{ __('Цели устойчивого развития') }}
                            </button>
                            <button onclick="showDevTab('education')" id="desktop-tab-education" class="desktop-dev-tab-button py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                                <i class="fas fa-graduation-cap mr-2"></i>{{ __('Образование для УР') }}
                            </button>
                            <button onclick="showDevTab('documents')" id="desktop-tab-documents" class="desktop-dev-tab-button py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                                <i class="fas fa-file-pdf mr-2"></i>{{ __('Документы') }}
                            </button>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Tab Contents -->
            
            <!-- Tab 1: Goals (17 ЦУР) -->
            <div id="content-goals" class="dev-tab-content">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Левая панель - список целей -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24 max-h-[80vh] overflow-y-auto">
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
            </div>

            <!-- Tab 2: Education for SD -->
            <div id="content-education" class="dev-tab-content hidden">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Образование для устойчивого развития') }}</h2>
                    
                    <!-- Intro Text -->
                    <div class="prose max-w-none mb-8">
                        <div class="bg-blue-50 border-l-4 border-shakarim-blue p-6 rounded-r-lg my-6">
                            <h3 class="font-bold text-gray-800 mb-3">{{ __('Ключевые элементы образовательной политики:') }}</h3>
                            <ol class="space-y-3 text-gray-700">
                                <li>
                                    <strong>1. {{ __('Включение универсальных модулей об устойчивом развитии') }}</strong>
                                </li>
                                <li class="mt-4">
                                    <strong>2. {{ __('Реализация отдельных образовательных программ с фокусом на ЦУР') }}</strong>
                                </li>
                            </ol>
                        </div>
                    </div>

                    <!-- Table Section -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">{{ __('Образовательные программы по ЦУР') }}</h3>
                        <div class="overflow-x-auto shadow-md rounded-lg">
                            <table class="w-full border-collapse bg-white">
                                <thead>
                                    <tr class="bg-shakarim-blue text-white">
                                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold">{{ __('ЦУР') }}</th>
                                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold">{{ __('Шифр и наименование ОП') }}</th>
                                        <th class="border border-gray-300 px-4 py-3 text-center text-sm font-semibold w-32">{{ __('Ссылка') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $currentGoalId = null;
                                    @endphp
                                    
                                    @forelse($educationProgramsFlat as $program)
                                        @php
                                            $isNewGoal = $currentGoalId !== $program->development_goal_id;
                                            $goalRowspan = $isNewGoal ? $educationProgramsFlat->where('development_goal_id', $program->development_goal_id)->count() : 0;
                                            if ($isNewGoal) {
                                                $currentGoalId = $program->development_goal_id;
                                            }
                                        @endphp
                                        
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            @if($isNewGoal)
                                                <td rowspan="{{ $goalRowspan }}" class="border border-gray-300 px-4 py-3 align-top bg-blue-50 font-medium text-sm">
                                                    {{ $program->developmentGoal->title }}
                                                </td>
                                            @endif
                                            
                                            <td class="border border-gray-300 px-4 py-3 text-sm">
                                                {{ $program->op }}
                                            </td>
                                            
                                            <td class="border border-gray-300 px-4 py-3 text-center">
                                                @if($program->link)
                                                    <a href="{{ $program->link }}" 
                                                    target="_blank"
                                                    class="inline-flex items-center px-3 py-1.5 bg-shakarim-blue hover:bg-shakarim-dark text-white rounded text-xs transition-colors">
                                                        <i class="fas fa-external-link-alt mr-1"></i>
                                                        {{ __('Открыть') }}
                                                    </a>
                                                @else
                                                    <span class="text-gray-400 text-sm">—</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="border border-gray-300 px-4 py-8 text-center text-gray-500">
                                                {{ __('Образовательные программы не найдены') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 3: Documents -->
            <div id="content-documents" class="dev-tab-content hidden">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Документы') }}</h2>
                    
                    <!-- Regular Documents -->
                    @if($documents->count() > 0)
                        <div class="space-y-3 mb-8">
                            @foreach($documents as $doc)
                            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">{{ $doc->title }}</h3>
                                        <p class="text-xs text-gray-500">PDF {{ __('документ') }}</p>
                                    </div>
                                </div>
                                <a href="{{ $doc->getFileUrl() }}" 
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center px-4 py-2 bg-shakarim-blue hover:bg-shakarim-dark text-white rounded-lg transition text-sm">
                                    <i class="fas fa-external-link-alt mr-2"></i>
                                    {{ __('Открыть') }}
                                </a>
                            </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Reports Section (Expandable) -->
                    @if($reports->count() > 0)
                    <div class="mt-6">
                        <button onclick="toggleReports()" 
                                class="w-full flex items-center justify-between p-4 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition">
                            <div class="flex items-center">
                                <i class="fas fa-chart-line text-shakarim-blue mr-3 text-xl"></i>
                                <span class="font-semibold text-gray-800">{{ __('Отчеты о реализации политики устойчивого развития') }}</span>
                                <span class="ml-3 bg-shakarim-blue text-white text-xs px-2 py-1 rounded-full">{{ $reports->count() }}</span>
                            </div>
                            <i id="reports-icon" class="fas fa-chevron-down text-gray-600 transition-transform"></i>
                        </button>
                        
                        <div id="reports-content" class="hidden mt-3 space-y-3 ml-4">
                            @foreach($reports as $report)
                            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-file-chart-line text-blue-500 text-2xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">{{ $report->title }}</h3>
                                        <p class="text-xs text-gray-500">{{ __('Отчет') }} • PDF</p>
                                    </div>
                                </div>
                                <a href="{{ $report->getFileUrl() }}" 
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition text-sm">
                                    <i class="fas fa-external-link-alt mr-2"></i>
                                    {{ __('Открыть') }}
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Empty State -->
                    @if($documents->count() === 0 && $reports->count() === 0)
                    <div class="text-center py-16">
                        <div class="max-w-md mx-auto">
                            <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-600 mb-2">
                                {{ __('Документы не найдены') }}
                            </h3>
                            <p class="text-gray-500">
                                {{ __('В настоящее время нет доступных документов') }}
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Tab styles */
        .dev-tab-button {
            color: #6b7280;
            border-color: transparent;
        }
        .dev-tab-button.active {
            color: #003163;
            border-color: #003163;
        }
        .dev-tab-button:hover:not(.active) {
            color: #003163;
            background-color: #f3f4f6;
        }

        .desktop-dev-tab-button {
            color: #6b7280;
            border-color: transparent;
        }
        .desktop-dev-tab-button.active {
            color: #003163;
            border-color: #003163;
        }
        .desktop-dev-tab-button:hover:not(.active) {
            color: #003163;
        }

        /* Table responsive */
        @media (max-width: 768px) {
            table {
                font-size: 0.875rem;
            }
            th, td {
                padding: 0.5rem;
            }
        }
    </style>

    <script>
        // Tab switching
        function showDevTab(tabName) {
            document.querySelectorAll('.dev-tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            document.querySelectorAll('.dev-tab-button, .desktop-dev-tab-button').forEach(button => {
                button.classList.remove('active');
            });
            document.getElementById('content-' + tabName).classList.remove('hidden');
            const mobileBtn = document.getElementById('tab-' + tabName);
            const desktopBtn = document.getElementById('desktop-tab-' + tabName);
            if (mobileBtn) mobileBtn.classList.add('active');
            if (desktopBtn) desktopBtn.classList.add('active');
        }

        // Goals navigation (existing code)
        document.addEventListener('DOMContentLoaded', function() {
            const goalItems = document.querySelectorAll('.goal-item');
            const goalContent = document.getElementById('goal-content');

            const goalsData = {!! json_encode($goals->keyBy('id')->map(function($goal) {
                return [
                    'title' => $goal->title,
                    'content' => $goal->content
                ];
            })) !!};

            goalItems.forEach(item => {
                item.addEventListener('click', function() {
                    const goalId = this.dataset.goalId;
                    
                    goalItems.forEach(el => {
                        el.classList.remove('bg-blue-50', 'border-shakarim-blue');
                        el.classList.add('border-gray-200');
                    });
                    
                    this.classList.add('bg-blue-50', 'border-shakarim-blue');
                    this.classList.remove('border-gray-200');
                    
                    if (goalsData[goalId]) {
                        goalContent.innerHTML = `
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">${goalsData[goalId].title}</h2>
                            <div class="prose max-w-none">${goalsData[goalId].content}</div>
                        `;
                    }
                });
            });
        });

        // Toggle reports section
        function toggleReports() {
            const content = document.getElementById('reports-content');
            const icon = document.getElementById('reports-icon');
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }
    </script>
</x-layout>