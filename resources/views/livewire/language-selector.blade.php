<div class="flex items-center space-x-2 lang-selector">
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
</div>

@script
<script>
    $wire.on('language-changed', (event) => {

        const language = event[0].language;
        
        const currentUrl = new URL(window.location.href);

        const segments = currentUrl.pathname.split('/');
        if (['kk', 'ru', 'en'].includes(segments[1])) {
            segments[1] = language;
        } else {
            segments.splice(1, 0, language);
        }

        const newPath = segments.join('/');
        window.location.href = currentUrl.origin + newPath;
    });
</script>
@endscript