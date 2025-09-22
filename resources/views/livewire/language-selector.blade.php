<div x-data="{ menuVisible: false }" class="relative inline-block">
    <button
        @click="menuVisible = !menuVisible"
        class="inline-flex items-center justify-center w-full px-3 py-1 bg-shakarim-blue text-white rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-shakarim-blue">
        <span>{{ $languages[$currentLanguage] }}</span>
        <svg class="w-5 h-5 -mr-1 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>
    
    <div x-show="menuVisible"
         x-transition
         @click.away="menuVisible = false"
         class="absolute left-0 mt-2 w-full rounded-md shadow-lg bg-white border z-[9999]"
         style="display: none;">
        <div class="py-1">
            @foreach($languages as $code => $name)
                <button
                    wire:click="changeLanguage('{{ $code }}')"
                    @click="menuVisible = false"
                    class="block w-full text-center px-4 py-2 text-sm hover:bg-gray-100
                           {{ $currentLanguage === $code ? 'bg-blue-50 text-shakarim-blue font-semibold' : 'text-gray-700' }}">
                    {{ $name }}
                </button>
            @endforeach
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