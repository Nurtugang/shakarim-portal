{{-- resources/views/blocks/rendered/tabs.blade.php --}}
{{-- Отладка: посмотрим структуру данных --}}
{{-- {{ dd($tabs) }} --}}

@if(isset($tabs) && count($tabs) > 0)
<div class="tabs-block bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Navigation -->
            <div class="lg:w-1/4">
                <!-- Mobile horizontal tabs -->
                <div class="lg:hidden mb-6">
                    <div class="flex overflow-x-auto space-x-2 pb-2">
                        @foreach($tabs as $index => $tab)
                        <button onclick="showTab('tab-{{ $index }}')" 
                                id="mobile-tab-{{ $index }}" 
                                class="tab-button {{ $index === 0 ? 'active' : '' }} whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            {{ $tab['title'] }}
                        </button>
                        @endforeach
                    </div>
                </div>

                <!-- Desktop vertical tabs -->
                <div class="hidden lg:block sticky top-24">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                       <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            {{ $sidebar_title ?? 'Разделы' }}
                        </h3>
                        <nav class="space-y-2">
                            @foreach($tabs as $index => $tab)
                            <button onclick="showTab('tab-{{ $index }}')" 
                                    id="desktop-tab-{{ $index }}" 
                                    class="desktop-tab-button {{ $index === 0 ? 'active' : '' }} w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-folder mr-2"></i>
                                {{ $tab['title'] }}
                            </button>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:w-3/4">
                @foreach($tabs as $index => $tab)
                <div id="content-tab-{{ $index }}" class="tab-content {{ $index !== 0 ? 'hidden' : '' }}">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="prose max-w-none">
                            {!! tiptap_converter()->asHTML($tab['text'] ?? '') !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .tab-button.active, .desktop-tab-button.active {
        background-color: #003163 !important;
        color: white !important;
    }

    .tab-button:not(.active), .desktop-tab-button:not(.active) {
        background-color: #f1f5f9;
        color: #64748b;
    }

    .tab-button:not(.active):hover, .desktop-tab-button:not(.active):hover {
        background-color: #e2e8f0;
    }

    /* Custom scrollbar for mobile tabs */
    .flex.overflow-x-auto::-webkit-scrollbar {
        height: 4px;
    }

    .flex.overflow-x-auto::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 2px;
    }

    .flex.overflow-x-auto::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 2px;
    }

    .flex.overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>

<script>
    function showTab(tabId) {
        // Получаем номер таба
        const tabNumber = tabId.split('-')[1];
        
        // Hide all tab contents
        const tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach(content => {
            content.classList.add('hidden');
        });
        
        // Remove active class from all tab buttons (mobile)
        const tabButtons = document.querySelectorAll('.tab-button');
        tabButtons.forEach(button => {
            button.classList.remove('active');
        });
        
        // Remove active class from all desktop tab buttons
        const desktopTabButtons = document.querySelectorAll('.desktop-tab-button');
        desktopTabButtons.forEach(button => {
            button.classList.remove('active');
        });
        
        // Show selected tab content
        const selectedContent = document.getElementById('content-' + tabId);
        if (selectedContent) {
            selectedContent.classList.remove('hidden');
        }
        
        // Add active class to clicked tab button (mobile)
        const activeTabButton = document.getElementById('mobile-' + tabId);
        if (activeTabButton) {
            activeTabButton.classList.add('active');
        }
        
        // Add active class to clicked desktop tab button
        const activeDesktopTabButton = document.getElementById('desktop-' + tabId);
        if (activeDesktopTabButton) {
            activeDesktopTabButton.classList.add('active');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Инициализация стилей для неактивных табов
        const tabButtons = document.querySelectorAll('.tab-button:not(.active)');
        tabButtons.forEach(button => {
            button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        });
        
        const desktopTabButtons = document.querySelectorAll('.desktop-tab-button:not(.active)');
        desktopTabButtons.forEach(button => {
            button.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        });
    });
</script>
@endif