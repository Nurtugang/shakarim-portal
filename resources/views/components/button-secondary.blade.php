<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border border-secondary rounded-3xl font-semibold text-base text-white bg-secondary hover:text-secondary hover:bg-white focus:bg-secondary active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
