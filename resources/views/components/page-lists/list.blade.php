<div>
<div class="my-10">
                        @foreach ($lists as $item)
                        <div class="flex flex-col md:flex-row flex-x-10 rounded-md overflow-hidden shadow-md mb-4">
                        <div class="w-full md:w-64 shrink-0">
                            <img class="w-full h-full object-cover" src="{{ $item->getImage() }}" alt="photo">
                        </div>
                        <div class="flex-1 bg-gray-200 p-8">
                            <a href="{{ route('list.item', ['locale' => app()->getLocale(), 'pageList' => $item]) }}">
                                <h1 class="font-inter text-xl mb-2">{{ $item->{'title_'.app()->getLocale()} }}</h1>
                            </a>
                           <p class="mb-2 text-gray-500">{{ $item->getFormattedDate() }}</p>
                           <x-button-primary class="mt-2">
                               <a href="{{ route('list.item', ['locale' => app()->getLocale(), 'pageList' => $item]) }}">
                            {{ __('More') }}
                                </a>
                           </x-button-primary>
                        </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="my-4">
                        {{ $lists->links() }}
                    </div>
</div>
