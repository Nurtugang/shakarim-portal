<div x-data="{ menuVisible: false }" class="relative inline-block text-left">
    <!-- Кнопка выбора -->
    <button @click="menuVisible = !menuVisible" class="flex items-center w-full justify-center text-white px-4 font-medium cursor-pointer">
       <span class="text-sf text-xl uppercase">{{ $languages[$currentLanguage] }}</span> 
       <svg class="-mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
    </button>

    <!-- Выпадающее меню -->
    <div x-cloak x-show="menuVisible" @click.away="menuVisible = false" class="absolute left-1/2 transform -translate-x-1/2 mt-4 z-20 origin-top rounded-3xl bg-transparent w-16 shadow-lg ring-1 ring-secondary ring-opacity-5 p-4">
        <div class="py-1 text-sf text-xl text-white">
            <button wire:click="changeLanguage('kk')" 
                @click="menuVisible = false" 
                class="block w-full rounded-3xl hover:text-white hover:bg-secondary cursor-pointer">KZ</button>
            <button wire:click="changeLanguage('ru')" 
                @click="menuVisible = false" 
                class="block w-full rounded-3xl hover:text-white hover:bg-secondary cursor-pointer">RU</button>
            <button wire:click="changeLanguage('en')" 
                @click="menuVisible = false" 
                class="block w-full rounded-3xl hover:text-white  hover:bg-secondary cursor-pointer">EN</button>
        </div>
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