<div class="flex flex-col md:flex-row space-x-10 space-y-6 text-white text-base font-sf">
    @foreach ($list as $item)
    <div class="flex space-x-2">
        <img src="/storage/{{ $item['icon'] }}" class="w-7 h-7" alt="icon">
        <div>
            <p class="text-sm text-gray-300">{{ $item['title'] }}:</p>
            <a href="tel:+77172672037" class="topfoot-call">{{ $item['value'] }}</a>
        </div>
    </div>
    @endforeach
</div>