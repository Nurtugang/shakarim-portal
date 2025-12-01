@props(['sections', 'active' => null])

<div>
    <!-- Mobile horizontal sections -->
    <div class="lg:hidden mb-6">
        <div class="flex overflow-x-auto space-x-2 pb-2">
            @foreach($sections as $key => $title)
                <button onclick="showTab('{{ $key }}', event)" id="mobile-tab-{{ $key }}" class="section-btn whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ ($loop->first && !$active) || $active === $key ? 'active' : '' }}">
                    {{ $title }}
                </button>
            @endforeach
        </div>
    </div>

    <!-- Desktop vertical sections -->
    <div class="hidden lg:block sticky top-24">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('Разделы') }}</h3>
            <nav class="space-y-2">
                @foreach($sections as $key => $title)
                    <button onclick="showTab('{{ $key }}', event)" id="desktop-tab-{{ $key }}" class="section-btn desktop w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-colors {{ ($loop->first && !$active) || $active === $key ? 'active' : '' }}">
                        {{ $title }}
                    </button>
                @endforeach
            </nav>
        </div>
    </div>
</div>

<style>
    .section-btn { 
        background-color: #f3f4f6; 
        color: #4b5563; 
    }
    .section-btn:hover { 
        background-color: #e5e7eb; 
    }
    .section-btn.active { 
        background-color: #003163 !important; 
        color: #ffffff !important; 
    }

    .flex.overflow-x-auto::-webkit-scrollbar { height: 4px; }
    .flex.overflow-x-auto::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 2px; }
    .flex.overflow-x-auto::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 2px; }
    .flex.overflow-x-auto::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
</style>

<script>
    if (typeof window.showTab === 'undefined') {
        window.showTab = function(tabName, event) {
            if (event) { event.preventDefault(); }
            document.querySelectorAll('.tab-content').forEach(function(content) {
                content.classList.add('hidden');
            });
            // Activate selected buttons
            document.querySelectorAll('#mobile-tab-' + tabName + ', #desktop-tab-' + tabName).forEach(function(btn) {
                btn.classList.add('active');
            });
            // Deactivate others
            document.querySelectorAll('.section-btn').forEach(function(btn) {
                var id = btn.id.replace('mobile-tab-', '').replace('desktop-tab-', '');
                if (id !== tabName) { btn.classList.remove('active'); }
            });
            // Show content
            var toShow = document.getElementById('content-' + tabName);
            if (toShow) { toShow.classList.remove('hidden'); }
            // Update URL hash
            if (history.pushState) { history.pushState(null, null, '#' + tabName); }
        };

        document.addEventListener('DOMContentLoaded', function() {
            var hash = window.location.hash.substring(1);
            var initial = hash || (function() {
                var activeBtn = document.querySelector('.section-btn.active');
                if (activeBtn) {
                    return activeBtn.id.replace('mobile-tab-', '').replace('desktop-tab-', '');
                }
                var firstContent = document.querySelector('.tab-content');
                if (firstContent && firstContent.id.startsWith('content-')) {
                    return firstContent.id.replace('content-', '');
                }
                return null;
            })();
            if (initial) { window.showTab(initial); }
        });
    }
</script>
