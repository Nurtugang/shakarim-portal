<div x-data="{ menuVisible: false }" class="relative">
    <!-- Обычные кнопки для планшетов и больших экранов (md+) -->
    <div class="hidden md:flex items-center space-x-2 lang-selector">
        <button
            wire:click="changeLanguage('kk')"
            @click="menuVisible = false"
            class="px-3 py-1 rounded text-xs transition-colors duration-150
                   {{ $currentLanguage === 'kk'
                       ? 'bg-shakarim-blue text-white'
                       : 'text-gray-600 hover:bg-gray-200' }}">
            ҚАЗ
        </button>

        <button
            wire:click="changeLanguage('ru')"
            @click="menuVisible = false"
            class="px-3 py-1 rounded text-xs transition-colors duration-150
                   {{ $currentLanguage === 'ru'
                       ? 'bg-shakarim-blue text-white'
                       : 'text-gray-600 hover:bg-gray-200' }}">
            РУС
        </button>

        <button
            wire:click="changeLanguage('en')"
            @click="menuVisible = false"
            class="px-3 py-1 rounded text-xs transition-colors duration-150
                   {{ $currentLanguage === 'en'
                       ? 'bg-shakarim-blue text-white'
                       : 'text-gray-600 hover:bg-gray-200' }}">
            ENG
        </button>
        <button
            wire:click="changeLanguage('cn')"
            @click="menuVisible = false"
            class="px-3 py-1 rounded text-xs transition-colors duration-150
                   {{ $currentLanguage === 'cn'
                       ? 'bg-shakarim-blue text-white'
                       : 'text-gray-600 hover:bg-gray-200' }}">
            中文
        </button>
    </div>

    <!-- Dropdown для мобильных устройств (до md) -->
    <div class="md:hidden relative">
        <button 
            @click="menuVisible = !menuVisible" 
            class="px-3 py-1 bg-shakarim-blue text-white rounded text-xs flex items-center">
            {{ $currentLanguage === 'kk' ? 'ҚАЗ' : ($currentLanguage === 'ru' ? 'РУС' : ($currentLanguage === 'cn' ? '中文' : 'ENG')) }}
            <i class="fas fa-chevron-down ml-1 text-xs"></i>
        </button>

        <div x-show="menuVisible" 
             x-transition
             @click.away="menuVisible = false" 
             class="absolute top-full right-0 mt-1 bg-white shadow-lg rounded border z-[9999] min-w-[60px]">
            <button 
                wire:click="changeLanguage('kk')" 
                @click="menuVisible = false" 
                class="block w-full px-3 py-2 text-left text-xs text-gray-700 hover:bg-gray-100 
                       {{ $currentLanguage === 'kk' ? 'bg-blue-50 text-shakarim-blue font-medium' : '' }}">
                ҚАЗ
            </button>
            <button 
                wire:click="changeLanguage('ru')" 
                @click="menuVisible = false" 
                class="block w-full px-3 py-2 text-left text-xs text-gray-700 hover:bg-gray-100
                       {{ $currentLanguage === 'ru' ? 'bg-blue-50 text-shakarim-blue font-medium' : '' }}">
                РУС
            </button>
            <button 
                wire:click="changeLanguage('en')" 
                @click="menuVisible = false" 
                class="block w-full px-3 py-2 text-left text-xs text-gray-700 hover:bg-gray-100
                       {{ $currentLanguage === 'en' ? 'bg-blue-50 text-shakarim-blue font-medium' : '' }}">
                ENG
            </button>
            <button 
                wire:click="changeLanguage('cn')" 
                @click="menuVisible = false" 
                class="block w-full px-3 py-2 text-left text-xs text-gray-700 hover:bg-gray-100
                       {{ $currentLanguage === 'cn' ? 'bg-blue-50 text-shakarim-blue font-medium' : '' }}">
                中文
            </button>
        </div>
    </div>
</div>

@script
<script>
    $wire.on('language-changed', (event) => {

        const language = event[0].language;
        
        const currentUrl = new URL(window.location.href);

        const segments = currentUrl.pathname.split('/');
        if (['kk', 'ru', 'en', 'cn'].includes(segments[1])) {
            segments[1] = language;
        } else {
            segments.splice(1, 0, language);
        }

        const newPath = segments.join('/');
        window.location.href = currentUrl.origin + newPath;
    });
</script>
@endscript