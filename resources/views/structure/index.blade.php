<x-layout>
<link rel="stylesheet" href="{{ asset("css/structure-style.css") }}">

<section class="bg-gray-100 py-3 border-b">
    <div class="max-w-7xl mx-auto px-4">
      <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
        <a href="{{ url('/') }}" class="hover:text-shakarim-blue transition-colors">{{ __('Главная страница') }}</a>
        <span>&#8250;</span>
        <span class="text-shakarim-blue font-semibold">{{ __('Organizational Structure') }}</span>
      </nav>
    </div>
  </section>



<!-- ОСНОВНОЙ КОНТЕНТ СТРУКТУРЫ -->
<section class="bg-shakarim-gray py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-xl p-6">
            <div class="structure-bg">
                <ol class="organizational-chart overflow-hidden">
                    <li>
                        <div class="structure-header justify-content-center align-items-center">
                            <a style="z-index:10" target="_blank" href="https://www.gov.kz/memleket/entities/sci?lang=kz">
                                <button class="item green-button">{{ $structures->{'title_'.app()->getLocale()} }}</button>
                            </a>
                        </div>
                    </li>
                    @if ($structures->children->isNotEmpty())
                        @foreach ($structures->children as $child)
                            @include('structure.partials.node', ['node' => $child])
                        @endforeach
                    </li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    
</script>
@endpush

</x-layout>