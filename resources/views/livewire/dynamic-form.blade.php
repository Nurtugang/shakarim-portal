<div>
    <h2 class="text-3xl text-center font-sf mb-4">{{ $formTitle }}</h2>

    <form wire:submit="submit">
        {{ $this->form }}

        <button type="submit" class="bg-primary text-white px-4 py-2 rounded my-4">{{ __('Отправить')}}</button>
    </form>

    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
</div>