<x-filament-widgets::widget class="fi-wi-account">
    <x-filament::section>
        <div class="flex items-center gap-x-3">
            <x-filament-panels::avatar.user size="lg" :user="$this->getUser()" />

            <div class="flex-1">
                <h2 class="grid flex-1 text-base font-semibold leading-6 text-gray-950 dark:text-white">
                    {{ $this->getGreeting() }} {{ filament()->getUserName($this->getUser()) }}
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Ваша роль: {{ $this->getUser()->getRoleNames()->map(fn($role) => ucfirst($role))->join(', ') }}
                </p>
                
            </div>

            <form
                action="{{ filament()->getLogoutUrl() }}"
                method="post"
                class="my-auto"
            >
                @csrf

                <x-filament::button
                    color="gray"
                    icon="heroicon-m-arrow-left-on-rectangle"
                    icon-alias="panels::widgets.account.logout-button"
                    labeled-from="sm"
                    tag="button"
                    type="submit"
                >
                </x-filament::button>
            </form>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>