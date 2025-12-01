@props(['tabs', 'activeTab' => null])

{{-- 
    Принимает массив $tabs вида:
    [
        ['id' => 'goals', 'label' => 'Цели ЦУР', 'icon' => 'fas fa-bullseye'],
        ['id' => 'education', 'label' => 'Образование', 'icon' => 'fas fa-graduation-cap'],
        ...
    ]
--}}

<div class="mb-6">
    <!-- Mobile horizontal tabs -->
    <div class="lg:hidden">
        <div class="flex overflow-x-auto space-x-2 pb-2 border-b border-gray-200">
            @foreach($tabs as $tab)
                <a href="#{{ $tab['id'] }}" 
                   onclick="showTab('{{ $tab['id'] }}', event)" 
                   id="tab-{{ $tab['id'] }}" 
                   class="tab-button {{ ($loop->first && !$activeTab) || $activeTab === $tab['id'] ? 'active' : '' }} whitespace-nowrap px-4 py-3 text-sm font-medium transition-colors border-b-2">
                    @if(isset($tab['icon']))
                        <i class="{{ $tab['icon'] }} mr-2"></i>
                    @endif
                    {{ $tab['label'] }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Desktop tabs -->
    <div class="hidden lg:block">
        <div class="border-b border-gray-200">
            <nav class="flex space-x-8">
                @foreach($tabs as $tab)
                    <a href="#{{ $tab['id'] }}" 
                       onclick="showTab('{{ $tab['id'] }}', event)" 
                       id="desktop-tab-{{ $tab['id'] }}" 
                       class="desktop-tab-button {{ ($loop->first && !$activeTab) || $activeTab === $tab['id'] ? 'active' : '' }} py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                        @if(isset($tab['icon']))
                            <i class="{{ $tab['icon'] }} mr-2"></i>
                        @endif
                        {{ $tab['label'] }}
                    </a>
                @endforeach
            </nav>
        </div>
    </div>
</div>

<style>
    /* Tab styles */
    .tab-button, .desktop-tab-button {
        color: #6b7280;
        border-color: transparent;
    }
    .tab-button.active, .desktop-tab-button.active {
        color: #314266; /* shakarim-blue */
        border-color: #314266; /* shakarim-blue */
    }
    .tab-button:hover:not(.active) {
        color: #314266;
        background-color: #f3f4f6;
    }
    .desktop-tab-button:hover:not(.active) {
        color: #314266;
    }
</style>

<script>
    // Универсальная функция переключения, если она еще не объявлена
    if (typeof window.showTab === 'undefined') {
        window.showTab = function(tabName, event) {
            if (event) {
                event.preventDefault();
            }
            // Скрываем все контенты
            document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
            
            // Убираем активность у всех кнопок
            document.querySelectorAll('.tab-button, .desktop-tab-button').forEach(b => b.classList.remove('active'));
            
            // Показываем нужный контент
            const content = document.getElementById('content-' + tabName);
            if (content) content.classList.remove('hidden');
            
            // Активируем нужные кнопки (и мобильную, и десктопную)
            const mobileBtn = document.getElementById('tab-' + tabName);
            const desktopBtn = document.getElementById('desktop-tab-' + tabName);
            if (mobileBtn) mobileBtn.classList.add('active');
            if (desktopBtn) desktopBtn.classList.add('active');

            // Обновляем URL
            if (history.pushState) {
                history.pushState(null, null, '#' + tabName);
            }
        };
        
        // Автозапуск при загрузке страницы по хешу в URL
        document.addEventListener('DOMContentLoaded', function() {
            const hash = window.location.hash.substring(1);
            if (hash) {
                // Проверяем, существует ли такой таб на странице
                const tabExists = document.getElementById('content-' + hash);
                if (tabExists) {
                    showTab(hash);
                }
            }
        });
    }
</script>