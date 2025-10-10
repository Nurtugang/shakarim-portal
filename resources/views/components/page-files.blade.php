@props([
'files',
])
<div>

   <div class="">
    @foreach ($files as $file)
   
    <div class="flex border-t py-6">
      <div class="shrink-0">
        <img class="w-40 shadow-2xl" src="{{$file->getThumbnail()}}" alt="docs">
      </div>
        
        <div class="p-8 flex-1">
          <p class="text-gray-400 text-sm mb-4">{{ $file->getFormattedDate() }}</p>
            <p class="font-sf font-medium text-2xl mb-2">{{ $file->{'title_'.app()->getLocale()} }}</p>
            @if ($file->{'files_'.app()->getLocale()})
             <div class="font-sf text-xl my-4">
              <div class="mb-4">
                {!! $file->{'description_'.app()->getLocale()} !!}
              </div>
              <x-button-secondary class="mr-1">
                <a href="/storage/{{ $file->{'files_'.app()->getLocale()} ? $file->{'files_'.app()->getLocale()}[0] :'/'  }}" target="_blank">{{ __("View") }}</a>
              </x-button-secondary>
                <!-- <x-button-secondary>
                  <a href="/storage/{{ $file->{'files_'.app()->getLocale()} ? $file->{'files_'.app()->getLocale()}[0] :'/'  }}" download="">{{ __("Download") }}</a>
                </x-button-secondary> -->
             </div>
            @endif
            
        </div>
    </div>
    @endforeach
</div> 

<div>
    {{ $files->links() }}
</div>
</div>
