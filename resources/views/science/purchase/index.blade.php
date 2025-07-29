<x-layout metaTitle="Закупки">
  @push('styles')
  <link rel="stylesheet" href="{{ asset("css/content.css") }}">
  <link rel="stylesheet" href="{{ asset("css/staff.css") }}">
  @endpush
<div class="breadcrumb-container">
    <div class="breadcrumb">
        <a href="/" title="{{ __("Home page") }}"><i class="fas fa-home"></i></a>
        <span class="breadcrumb-separator">〉</span>
        <span class="current">Ғылыми сатып алулар</span>
    </div>
</div>
  <div class="content-container" x-data="{ isModalOpen: false, selectedPurchaseId: null }">
    @if (session('success'))
    <div class="p-4 my-4 text-sm text-green-700 bg-green-100 border border-green-400 rounded-lg" role="alert">
        {{ session('success') }}
    </div>
@endif
    <div>
      <div class="main-content">
        <div class="tiptap-content">
          <div class="w-full divide-y divide-outline overflow-hidden rounded border border-primary border-outline bg-surface-alt/40 text-on-surface dark:divide-outline-dark dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:text-on-surface-dark mb-2">
            @foreach ($data as $item)
            <div x-data="{ isExpanded: false }">
              <button id="controlsAccordionItemOne" type="button" class="flex w-full items-center cursor-pointer justify-between gap-4 bg-surface-alt p-4 text-left underline-offset-2 hover:bg-surface-alt/75 focus-visible:bg-surface-alt/75 focus-visible:underline focus-visible:outline-hidden dark:bg-surface-dark-alt dark:hover:bg-surface-dark-alt/75 dark:focus-visible:bg-surface-dark-alt/75" aria-controls="accordionItemOne" x-on:click="isExpanded = ! isExpanded" x-bind:class="isExpanded ? 'text-on-surface-strong dark:text-on-surface-dark-strong font-bold'  : 'text-on-surface dark:text-on-surface-dark font-medium'" x-bind:aria-expanded="isExpanded ? 'true' : 'false'">
                {{ $item['name'] }}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" class="size-5 shrink-0 transition" aria-hidden="true" x-bind:class="isExpanded  ?  'rotate-180'  :  ''">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
              </button>
              <div x-cloak x-show="isExpanded" id="accordionItemOne" role="region" aria-labelledby="controlsAccordionItemOne" x-collapse>
                <div class="p-4 text-sm sm:text-base text-pretty">
                  <div
                    class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md bg-clip-border">
                    <table class="w-full text-left table-auto min-w-max">
                      <thead>
                        <tr>
                          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                              ЖСН
                            </p>
                          </th>
                          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                              Атауы
                            </p>
                          </th>
                          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                              Сипаттамалары
                            </p>
                          </th>
                          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                              Жабдықты сатып алудың негіздемесі
                            </p>
                          </th>
                          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                              Жоспарланған құны
                            </p>
                          </th>
                          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                              Сатып алу мерзімдер
                            </p>
                          </th>
                          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                              Төлем шарттары
                            </p>
                          </th>
                          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                              Мәртебесі
                            </p>
                          </th>
                          <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                              Коммерциялық ұсыныс енгізу
                            </p>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($item->sciencePurchases as $purchase)
                        <tr>
                          <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                              {{ $item->name }}
                            </p>
                          </td>
                          <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                              {{ $purchase->{'name_'.app()->getLocale()} }}
                            </p>
                          </td>
                          <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                              {{ $purchase->{'description_'.app()->getLocale()} }}
                            </p>
                          </td>
                          <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                              {{ $purchase->{'justification_'.app()->getLocale()} }}
</p>
                          </td>
                          <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                              {{ $purchase->price }}
</p>
                          </td>
                          <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                              {{ $purchase->{'deadlines_'.app()->getLocale()} }}
</p>
                          </td>
                          <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                              {{ $purchase->payment_terms }}
                            </p>
                          </td>
                          <td class="p-4 border-b border-blue-gray-50">
                           {{ $purchase->status->label() }}
                          </td>
                          <td class="p-4 border-b border-blue-gray-50">
                            <button @click="isModalOpen = true; selectedPurchaseId = {{ $purchase->id }}" class="bg-gray-500 text-white rounded-md p-2">Жіберу</button>
                          </td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
          
    </div>
<x-modal
        x-show="isModalOpen"
        x-on:keydown.escape.window="isModalOpen = false"
        x-cloak
        style="display: none;"
    ></x-modal>


  </div>

  @push('scripts')
  <script src="/js/content.js"></script>
  @endpush
</x-layout>