<div x-data="{ menuVisible: false }" class="lang-selector">
    <!-- Кнопка выбора -->
    <button @click="menuVisible = !menuVisible" class="lang-btn active">
 {{ $languages[$currentLanguage] }}
    </button>

    <!-- Выпадающее меню -->
    <div x-cloak x-show="menuVisible" @click.away="menuVisible = false" class="lang-dropdown">
            <button wire:click="changeLanguage('kk')" 
                @click="menuVisible = false" class="lang-btn" >KZ</button>
            <button wire:click="changeLanguage('ru')" 
                @click="menuVisible = false" class="lang-btn">RU</button>
            <button wire:click="changeLanguage('en')" 
                @click="menuVisible = false" class="lang-btn">EN</button>
    </div>
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
            segments.splice(1, 0, language); // Добавляем сегмент языка
        }

        const newPath = segments.join('/');
        window.location.href = currentUrl.origin + newPath;
    });
</script>
@endscript