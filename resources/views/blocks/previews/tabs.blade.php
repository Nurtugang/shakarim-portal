<div
    x-data="{
        active: '{{ 0 }}',
        vertical: true
    }"
    class="flex flex-col mb-10"
    x-bind:class="{
        'sm:flex-row': vertical
    }"
>
    <!-- Nav Tabs -->
    <div
        x-on:keydown.right.prevent.stop="$focus.wrap().next()"
        x-on:keydown.left.prevent.stop="$focus.wrap().previous()"
        x-on:keydown.home.prevent.stop="$focus.first()"
        x-on:keydown.end.prevent.stop="$focus.last()"
        x-bind:class="{
            'sm:w-36 sm:flex-none sm:flex-col sm:items-stretch': vertical
        }"
        class="flex items-center font-sf text-lg text-sm dark:border-zinc-700"
    >
        @foreach($tabs as $key => $tab)
            <button
                x-on:click="active = '{{ $key }}'"
                x-on:focus="active = '{{ $key }}'"
                type="button"
                id="{{ $key }}-tab"
                role="tab"
                aria-controls="{{ $key }}-tab-pane"
                x-bind:aria-selected="active === '{{ $key }}' ? 'true' : 'false'"
                x-bind:tabindex="active === '{{ $key }}' ? '0' : '-1'"
                x-bind:class="{
                    'text-zinc-950 dark:text-zinc-50 border-zinc-200/75 dark:border-zinc-700/75 bg-white dark:bg-zinc-900': active === '{{ $key }}',
                    'text-zinc-500 border-transparent hover:text-zinc-950 dark:text-zinc-300 dark:hover:text-zinc-50': active !== '{{ $key }}',
                    'sm:border-e-0 sm:border-y sm:border-s sm:rounded-s-lg sm:rounded-e-none sm:-me-px': vertical,
                }"
                class="z-10 -mb-px flex items-center gap-2 rounded-t-lg border-x border-t text-xl px-5 py-3 font-medium"
            >
                {{ $tab['title'] }}
            </button>
        @endforeach
    </div>
    <!-- END Nav Tabs -->

    <!-- Tab Content -->
    <div class="w-full rounded-b-lg rounded-tr-lg border border-zinc-200/75 bg-white p-5 dark:border-zinc-700/75 dark:bg-zinc-900">
        @foreach($tabs as $key => $tab)
            <div
                x-transition
                x-show="active === '{{ $key }}'"
                id="{{ $key }}-tab-pane"
                tab="tabpanel"
                aria-labelledby="{{ $key }}-tab"
                tabindex="0"
            >
                <h4 class="mb-2 text-lg font-inter">{{ $tab['title'] }}</h4>
                <p class="text-sm leading-relaxed text-zinc-700 dark:text-zinc-400">
                    {!! $tab['text'] !!}
                </p>
            </div>
        @endforeach
    </div>
    <!-- END Tab Content -->
</div>
