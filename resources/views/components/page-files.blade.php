@props([
'files',
])
<div>

   <div class="">
    @foreach ($files as $file)
   
    <div class="flex border-t py-6">
      <div class="shrink-0 shadow-2xl">
        <img class="w-36" src="{{$file->getThumbnail()}}" alt="docs">
      </div>
        
        <div class="p-8 flex-1">
            <p class="font-sf font-medium text-2xl mb-8">{{ $file->{'title_'.app()->getLocale()} }}</p>
            @if ($file->{'files_'.app()->getLocale()})
             <div class="font-sf text-xl my-4">
              <x-button-secondary class="mr-1">
                <a href="/storage/{{ $file->{'files_'.app()->getLocale()} ? $file->{'files_'.app()->getLocale()}[0] :'/'  }}" target="_blank">{{ __("View online") }}</a>
              </x-button-secondary>
                <x-button-secondary>
                  <a href="/storage/{{ $file->{'files_'.app()->getLocale()} ? $file->{'files_'.app()->getLocale()}[0] :'/'  }}" download="">{{ __("Download") }}</a>
                </x-button-secondary>
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
