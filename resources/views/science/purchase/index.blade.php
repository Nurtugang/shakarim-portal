<x-layout metaTitle="Закупки">

<div x-data="{ isModalOpen: false, selectedPurchaseId: null }">

  <!-- Breadcrumb Section -->
  <section class="bg-gray-100 py-3 border-b">
    <div class="max-w-7xl mx-auto px-4">
      <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
        <a href="{{ url('/') }}" class="hover:text-shakarim-blue transition-colors">{{ __('Главная страница') }}</a>
        <span>&#8250;</span>
        <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 28]) }}" class="hover:text-shakarim-blue transition-colors">{{ __('Science') }}</a>
        <span>&#8250;</span>
        <span class="text-shakarim-blue font-semibold">{{ __('Science Procurement') }}</span>
      </nav>
    </div>
  </section>

  <!-- Main Content Section -->
  <section class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-4">
      <!-- Page Header -->
      <div class="mb-8 mt-2">
        <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-2">
          {{ __('Science Procurement') }}
        </h1>
        <p class="text-gray-600 mt-2">{{ __('Ғылыми жабдықтар мен қызметтердің сатып алу жоспарлары')}}</p>
      </div>
      
      <!-- Main Content -->
      <div class="space-y-4 mb-12">
        @if($data->count() > 0)
          @foreach ($data as $item)
            <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm">
              <!-- Category Header -->
              <button 
                class="w-full px-6 py-4 bg-gray-50 hover:bg-gray-100 text-left font-medium text-shakarim-blue flex items-center justify-between transition-colors duration-200"
                type="button" 
                onclick="toggleCollapse('category-{{ $item->id }}')">
                <span class="text-lg font-semibold">{{ $item['name'] }}</span>
                <i class="fas fa-chevron-down transform transition-transform duration-200" id="icon-category-{{ $item->id }}"></i>
              </button>

              <!-- Category Content -->
              <div id="category-{{ $item->id }}" class="hidden">
                <div class="p-6">
                  @if($item->sciencePurchases->count() > 0)
                    <!-- Mobile Warning -->
                    <div class="md:hidden mb-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                      <p class="text-sm text-blue-800">
                        <i class="fas fa-info-circle mr-2"></i>
                        {{ __('Для удобного просмотра таблицы поверните устройство или прокрутите горизонтально')}}
                      </p>
                    </div>
                    
                    <!-- Table Container with Horizontal Scroll -->
                    <div class="overflow-x-auto shadow-sm border border-gray-200 rounded-lg">
                      <table class="w-full min-w-max bg-white border-collapse">
                        <thead class="bg-shakarim-blue text-white">
                          <tr>
                            <th class="px-4 py-4 text-left text-sm font-semibold uppercase tracking-wider border-r border-shakarim-light last:border-r-0 break-words max-w-[200px]">
                              {{ __('ЖСН')}}
                            </th>
                            <th class="px-4 py-4 text-left text-sm font-semibold uppercase tracking-wider border-r border-shakarim-light last:border-r-0 break-words max-w-[200px]">
                              {{ __('Атауы')}}
                            </th>
                            <th class="px-4 py-4 text-left text-sm font-semibold uppercase tracking-wider border-r border-shakarim-light last:border-r-0 break-words max-w-[200px]">
                              {{ __('Сипаттамалары')}}
                            </th>
                            <th class="px-4 py-4 text-left text-sm font-semibold uppercase tracking-wider border-r border-shakarim-light last:border-r-0 break-words max-w-[200px]">
                              {{ __('Жабдықты сатып алудың негіздемесі')}}
                            </th>
                            <th class="px-4 py-4 text-left text-sm font-semibold uppercase tracking-wider border-r border-shakarim-light last:border-r-0 break-words max-w-[200px]">
                              {{ __('Жоспарланған құны')}}
                            </th>
                            <th class="px-4 py-4 text-left text-sm font-semibold uppercase tracking-wider border-r border-shakarim-light last:border-r-0 break-words max-w-[200px]">
                              {{ __('Саны')}}
                            </th>
                            <th class="px-4 py-4 text-left text-sm font-semibold uppercase tracking-wider border-r border-shakarim-light last:border-r-0 break-words max-w-[200px]">
                              {{ __('Сомма')}}
                            </th>
                            <th class="px-4 py-4 text-left text-sm font-semibold uppercase tracking-wider border-r border-shakarim-light last:border-r-0 break-words max-w-[200px]">
                              {{ __('Сатып алу мерзімдер')}}
                            </th>
                            <th class="px-4 py-4 text-left text-sm font-semibold uppercase tracking-wider border-r border-shakarim-light last:border-r-0 break-words max-w-[200px]">
                              {{ __('Төлем шарттары')}}
                            </th>
                            <th class="px-4 py-4 text-left text-sm font-semibold uppercase tracking-wider border-r border-shakarim-light last:border-r-0 break-words max-w-[200px]">
                              {{ __('Мәртебесі')}}
                            </th>
                            <th class="px-4 py-4 text-left text-sm font-semibold uppercase tracking-wider break-words max-w-[200px]">
                              {{ __('Коммерциялық ұсыныс енгізу')}}
                            </th>
                          </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                          @foreach ($item->sciencePurchases as $index => $purchase)
                            <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-blue-50 transition-colors duration-200">
                              <td class="px-4 py-4 text-sm text-gray-900 font-medium border-r border-gray-200 last:border-r-0 break-words hyphens-auto max-w-[200px]">
                                {{ $item->name }}
                              </td>
                              <td class="px-4 py-4 text-sm text-gray-900 border-r border-gray-200 last:border-r-0 break-words hyphens-auto max-w-[200px]">
                                {{ $purchase->{'name_'.app()->getLocale()} }}
                              </td>
                              <td class="px-4 py-4 text-sm text-gray-700 border-r border-gray-200 last:border-r-0 break-words hyphens-auto max-w-[200px]">
                                {{ $purchase->{'description_'.app()->getLocale()} }}
                              </td>
                              <td class="px-4 py-4 text-sm text-gray-700 border-r border-gray-200 last:border-r-0 break-words hyphens-auto max-w-[200px]">
                                {{ $purchase->{'justification_'.app()->getLocale()} }}
                              </td>
                              <td class="px-4 py-4 text-sm font-semibold text-gray-900 border-r border-gray-200 last:border-r-0">
                                <span class="inline-flex items-center px-2 py-1 rounded-md bg-green-100 text-green-800 whitespace-nowrap">
                                  {{ $purchase->price }}
                                </span>
                              </td>
                              <td class="px-4 py-4 text-sm text-gray-700 border-r border-gray-200 last:border-r-0 break-words hyphens-auto max-w-[200px]">
                                <span class="inline-flex items-center px-2 py-1 rounded-md bg-green-100 text-green-800 whitespace-nowrap">
                                  {{ $purchase->quantity }}
                                </span>
                              </td>
                              <td class="px-4 py-4 text-sm text-gray-700 border-r border-gray-200 last:border-r-0 break-words hyphens-auto max-w-[200px]">
                                <span class="inline-flex items-center px-2 py-1 rounded-md bg-green-100 text-green-800 whitespace-nowrap">
                                  {{ $purchase->total_price }}
                                </span>
                              </td>
                              <td class="px-4 py-4 text-sm text-gray-700 border-r border-gray-200 last:border-r-0 break-words hyphens-auto max-w-[200px]">
                                {{ $purchase->{'deadlines_'.app()->getLocale()} }}
                              </td>
                              <td class="px-4 py-4 text-sm text-gray-700 border-r border-gray-200 last:border-r-0 break-words hyphens-auto max-w-[200px]">
                                {{ $purchase->payment_terms }}
                              </td>
                              <td class="px-4 py-4 text-sm border-r border-gray-200 last:border-r-0">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 whitespace-nowrap">
                                  {{ $purchase->status->label() }}
                                </span>
                              </td>
                              <td class="px-4 py-4 text-sm">
                                <button 
                                  @click="isModalOpen = true; selectedPurchaseId = {{ $purchase->id }}" 
                                  class="inline-flex items-center px-3 py-1 text-sm bg-shakarim-blue text-white rounded hover:bg-shakarim-dark transition-colors duration-200 whitespace-nowrap"
                                >
                                  <i class="fas fa-paper-plane mr-1"></i>
                                  {{ __('Жіберу')}}
                                </button>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    
                    @if($item->sciencePurchases->count() > 0)
                      <div class="mt-4 pt-4 border-t border-gray-200">
                        <span class="text-sm text-gray-500">
                          <i class="fas fa-info-circle mr-1"></i>
                          Барлығы: {{ $item->sciencePurchases->count() }} {{ __('жоспар')}}
                        </span>
                      </div>
                    @endif
                  @else
                    <!-- No Data Message -->
                    <div class="text-center py-12">
                      <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-inbox text-gray-400 text-3xl"></i>
                      </div>
                      <h3 class="text-lg font-medium text-gray-900 mb-2">{{ __('Мәліметтер жоқ')}}</h3>
                      <p class="text-gray-500">{{ __('Бұл санат үшін ешқандай сатып алу жоспарлары жоқ')}}</p>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        @else
          <!-- No Categories Message -->
          <div class="text-center py-12">
            <div class="max-w-md mx-auto">
              <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
              <h3 class="text-xl font-semibold text-gray-600 mb-2">
                {{ __('Санаттар табылмады') }}
              </h3>
              <p class="text-gray-500 mb-6">
                {{ __('Қазіргі уақытта ешқандай ғылыми сатып алу санаттары қол жетімді емес. Кейінірек қайта тексеріңіз.') }}
              </p>
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>

  <!-- Modal Component -->
 <x-modal x-show="isModalOpen" x-on:keydown.escape.window="isModalOpen = false" x-cloak style="display: none;">
  <form method="POST" action="{{ route('science.offers.store', ['locale' => app()->getLocale()]) }}" enctype="multipart/form-data" class="p-6">
    @csrf
    <input type="hidden" name="purchase_id" :value="selectedPurchaseId">

    <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700">{{ __('Организация') }}</label>
      <input type="text" name="organization" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700">{{ __('Руководитель') }}</label>
      <input type="text" name="head" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700">{{ __('Контакт') }}</label>
      <input type="text" name="contact" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700">{{ __('Файл') }} (pdf, doc, xls)</label>
      <input type="file" name="filename" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>
    <div class="mb-4">
        {!! NoCaptcha::renderJs() !!}
          <div class="block sm:hidden">
              {!! NoCaptcha::display(['data-size' => 'compact']) !!}
          </div>
          <div class="hidden sm:block">
              {!! NoCaptcha::display(['data-size' => 'normal']) !!}
          </div>
          @error('g-recaptcha-response')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
    </div>
    <div class="flex justify-end">
      <button type="submit" class="px-4 py-2 bg-shakarim-blue text-white rounded hover:bg-shakarim-dark">
        {{ __('Отправить') }}
      </button>
    </div>
  </form>
</x-modal>

  @push('scripts')
  <script>
    function toggleCollapse(elementId) {
      const element = document.getElementById(elementId);
      const icon = document.getElementById('icon-' + elementId);
      
      if (element.classList.contains('hidden')) {
        element.classList.remove('hidden');
        icon.classList.add('rotate-180');
      } else {
        element.classList.add('hidden');
        icon.classList.remove('rotate-180');
      }
    }
  </script>
  @endpush
</x-layout>