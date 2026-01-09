<x-layout metaTitle="{{ __('Научные журналы') }}">

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ route('site.index', app()->getLocale()) }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 28]) }}" class="hover:text-shakarim-blue">{{ __('Наука') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('science.journals', ['locale' => app()->getLocale()]) }}" class="hover:text-shakarim-blue">{{ __('Научные журналы')}}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Вестник Университета Шакарима. Серия технические науки')}}</span>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            
            <!-- Clickable Image Banner (Centered) -->
            <a href="https://tech.vestnik.shakarim.kz/" 
               target="_blank" 
               rel="noopener noreferrer" 
               class="block max-w-sm mx-auto mb-8 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('img/tech_v2.jpeg') }}" 
                     alt="{{ __('Ғылыми басылымдар') }}" 
                     class="w-full h-full object-cover">
            </a>

            <!-- Journals Accordion -->
            <div class="space-y-4">
                @forelse($journalsByYear as $year => $journals)
                    <div x-data="{ open: false }" class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300">
                        <button @click="open = !open" class="w-full text-left p-4 bg-shakarim-blue text-white hover:bg-shakarim-blue-dark transition-colors flex justify-between items-center">
                            <span class="text-xl font-semibold">{{ $year }} {{ __('жыл') }}</span>
                            <svg x-bind:class="{ 'rotate-180': open }" class="w-6 h-6 text-white transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="p-2 md:p-4 border-t border-gray-200">
                            <ul class="space-y-2">
                                @foreach($journals as $journal)
                                    <li>
                                        <a href="{{ asset('storage/science-journals/' . $journal->filename) }}" target="_blank" 
                                           class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors group">
                                            <span class="text-gray-700 group-hover:text-shakarim-blue">
                                                {{ $journal->{'name_'.app()->getLocale()} ?? $journal->name_ru }} {{ $journal->number }}
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @empty
                    <div class="bg-gray-50 text-center text-gray-500 p-8 rounded-xl shadow-md">
                        <p>{{ __('Журналдар табылмады.') }}</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

</x-layout>