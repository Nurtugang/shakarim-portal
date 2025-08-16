<x-layout :metaTitle="__('Аккредитация')">

    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 1]) }}" class="hover:text-shakarim-blue">{{ __('Академия') }}</a>
                
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Аккредитация') }}</span>
            </nav>
        </div>
    </section>

    <!-- Accreditation Section -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-4">
                            {{ __('Аккредитация') }}
                        </h1>
                        
                        <!-- Introduction -->
                        <div class="bg-blue-50 border-l-4 border-shakarim-blue p-6 rounded-r-lg mb-6">
                            <h2 class="text-lg font-semibold text-shakarim-blue mb-3">
                                {{ __('Специализированная аккредитация') }}
                            </h2>
                            <p class="text-gray-700 leading-relaxed mb-3">
                                {{ __('Аккредитация отдельных образовательных программ вуза.') }}
                            </p>
                            <p class="text-gray-700 leading-relaxed">
                                {{ __('Наличие свидетельств специализированной аккредитации подтверждает то, что разработка образовательных программ в университете отвечает требованиями времени, что они совершенствуются в соответствии с потребностями современной экономики и рынка труда, нацелены на интеграцию в мировое образовательное пространство.') }}
                            </p>
                        </div>

                        
                    </div>

                    @if($accreditationsByOrgan->count() > 0)
                        <!-- Accreditation Organizations -->
                        <div class="space-y-6">
                            @foreach($accreditationsByOrgan as $organ => $accreditations)
                                <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm bg-white">
                                    <!-- Organization Header -->
                                    <button class="w-full px-6 py-4 bg-shakarim-blue hover:from-shakarim-dark hover:to-blue-800 text-white text-left font-medium flex items-center justify-between transition-all duration-200"
                                            type="button" 
                                            onclick="toggleCollapse('organ-{{ $loop->index }}')">
                                        <div class="flex items-center">
                                            <i class="fas fa-university mr-3"></i>
                                            <span class="text-lg font-semibold">{{ $organ }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm mr-3">
                                                {{ $accreditations->count() }} {{ __('программ') }}
                                            </span>
                                            <i class="fas fa-chevron-down transform transition-transform duration-200" id="icon-organ-{{ $loop->index }}"></i>
                                        </div>
                                    </button>

                                    <!-- Accreditations Table -->
                                    <div id="organ-{{ $loop->index }}" class="hidden">
                                        <div class="overflow-x-auto">
                                            <table class="w-full">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            {{ __('Образовательные программы') }}
                                                        </th>
                                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            {{ __('Тип') }}
                                                        </th>
                                                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            {{ __('Сертификат') }}
                                                        </th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    @foreach($accreditations as $accreditation)
                                                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                                                            <td class="px-6 py-4">
                                                                <div class="flex items-start">
                                                                    <div class="flex-shrink-0 mr-3">
                                                                        @if($accreditation->accredited)
                                                                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                                                        @else
                                                                            <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                                                        @endif
                                                                    </div>
                                                                    <div>
                                                                        <div class="text-sm font-medium text-gray-900">
                                                                            {{ $accreditation->name }}
                                                                        </div>
                                                                        @if($accreditation->validity_period)
                                                                            <div class="text-xs text-gray-500">
                                                                                {{ $accreditation->validity_period }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                                    @if($accreditation->type === 'Бакалавриат') bg-blue-100 text-blue-800
                                                                    @elseif($accreditation->type === 'Магистратура') bg-purple-100 text-purple-800
                                                                    @elseif($accreditation->type === 'Докторантура') bg-red-100 text-red-800
                                                                    @else bg-gray-100 text-gray-800 @endif">
                                                                    {{ $accreditation->type_display }}
                                                                </span>
                                                            </td>
                                                            <td class="px-6 py-4 text-center">
                                                                @if($accreditation->certificate_url)
                                                                    <button onclick="openCertificateModal('{{ $accreditation->certificate_url }}', '{{ $accreditation->name }}')"
                                                                            class="inline-flex items-center px-3 py-2 bg-shakarim-blue hover:bg-shakarim-dark text-white rounded-lg transition-colors duration-200">
                                                                        <i class="fas fa-eye"></i>
                                                                    </button>
                                                                @else
                                                                    <span class="text-gray-400">—</span>
                                                                @endif
                                                            </td>
                                                            
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- No Accreditations Message -->
                        <div class="text-center py-16">
                            <div class="max-w-md mx-auto">
                                <i class="fas fa-certificate text-6xl text-gray-300 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-600 mb-2">
                                    {{ __('Аккредитации не найдены') }}
                                </h3>
                                <p class="text-gray-500">
                                    {{ __('В настоящее время нет данных об аккредитации') }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="space-y-6">
                        <!-- Statistics Card -->
                        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-shakarim-blue">
                            <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                <i class="fas fa-chart-bar mr-2"></i>
                                {{ __('Статистика') }}
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">{{ __('Всего программ:') }}</span>
                                    <span class="font-semibold text-shakarim-blue text-lg">{{ $statistics['total'] }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">{{ __('Аккредитованных:') }}</span>
                                    <span class="font-semibold text-green-600">{{ $statistics['accredited'] }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">{{ __('Агентств:') }}</span>
                                    <span class="font-semibold text-shakarim-blue">{{ $statistics['organs'] }}</span>
                                </div>
                                
                                <hr class="my-3">
                                
                                <div class="space-y-2">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">{{ __('Бакалавриат:') }}</span>
                                        <span class="font-semibold text-blue-600">{{ $statistics['bachelor'] }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">{{ __('Магистратура:') }}</span>
                                        <span class="font-semibold text-purple-600">{{ $statistics['master'] }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600">{{ __('Докторантура:') }}</span>
                                        <span class="font-semibold text-red-600">{{ $statistics['doctorate'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Filters -->
                        @if(count($organs) > 0)
                            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
                                <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                    <i class="fas fa-filter mr-2"></i>
                                    {{ __('Агентства') }}
                                </h3>
                                <div class="space-y-2">
                                    @foreach($organs as $organ)
                                        @php
                                            $count = $accreditationsByOrgan[$organ]->count() ?? 0;
                                        @endphp
                                        <button onclick="scrollToOrgan('organ-{{ $loop->index }}')"
                                               class="flex items-center justify-between w-full p-3 text-left rounded-lg hover:bg-gray-50 transition duration-200 group">
                                            <span class="text-sm font-medium text-gray-700 group-hover:text-shakarim-blue line-clamp-2">
                                                {{ Str::limit($organ, 40) }}
                                            </span>
                                            <span class="text-xs text-white bg-shakarim-blue px-2 py-1 rounded-full ml-2 flex-shrink-0">
                                                {{ $count }}
                                            </span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif


                        <!-- Quick Links -->
                        <!-- <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-orange-500">
                            <h3 class="text-lg font-bold text-shakarim-blue mb-4 flex items-center">
                                <i class="fas fa-external-link-alt mr-2"></i>
                                {{ __('Связанные разделы') }}
                            </h3>
                            <div class="space-y-2">
                                <a href="/{{ app()->getLocale() }}/education/programs" 
                                   class="block p-2 text-sm text-gray-600 hover:text-shakarim-blue hover:bg-gray-50 rounded transition duration-200">
                                    {{ __('Образовательные программы') }}
                                </a>
                                <a href="/{{ app()->getLocale() }}/education/quality" 
                                   class="block p-2 text-sm text-gray-600 hover:text-shakarim-blue hover:bg-gray-50 rounded transition duration-200">
                                    {{ __('Система качества') }}
                                </a>
                                <a href="/{{ app()->getLocale() }}/education/ratings" 
                                   class="block p-2 text-sm text-gray-600 hover:text-shakarim-blue hover:bg-gray-50 rounded transition duration-200">
                                    {{ __('Рейтинги') }}
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Certificate Modal -->
    <div id="certificateModal" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 flex items-center justify-center p-2 md:p-6">
    <div class="bg-white rounded-lg w-full h-full max-w-7xl max-h-screen flex flex-col overflow-hidden">
        <div class="flex justify-between items-center p-4 border-b flex-shrink-0">
            <h3 id="modalTitle" class="text-sm md:text-lg font-semibold text-gray-900 pr-4 flex-1 truncate"></h3>
            <button onclick="closeCertificateModal()" class="text-gray-400 hover:text-gray-600 flex-shrink-0 p-2">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div class="flex-1 flex items-center justify-center p-4 overflow-hidden">
            <img id="modalImage" src="" alt="" class="max-w-full max-h-full object-contain">
        </div>
        <div class="p-4 border-t bg-gray-50 flex justify-between items-center flex-shrink-0">
            <button onclick="downloadImage()" 
                    class="px-4 py-2 bg-shakarim-blue hover:bg-shakarim-dark text-white rounded-lg transition-colors duration-200 text-sm">
                <i class="fas fa-download mr-2"></i>
                {{ __('Скачать') }}
            </button>
            <button onclick="closeCertificateModal()" 
                    class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition-colors duration-200">
                {{ __('Закрыть') }}
            </button>
        </div>
    </div>
</div>

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

function scrollToOrgan(organId) {
    const element = document.getElementById(organId);
    if (element) {
        if (element.classList.contains('hidden')) {
            toggleCollapse(organId);
        }
        setTimeout(() => {
            element.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start',
                inline: 'nearest'
            });
        }, 100);
    }
}

function openCertificateModal(imageUrl, title) {
    const modal = document.getElementById('certificateModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    
    modalImage.src = imageUrl;
    modalTitle.textContent = title;
    modal.classList.remove('hidden');
    
    document.body.style.overflow = 'hidden';
}

function closeCertificateModal() {
    const modal = document.getElementById('certificateModal');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeCertificateModal();
    }
});

document.getElementById('certificateModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeCertificateModal();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const firstOrgan = document.querySelector('[id^="organ-"]');
    if (firstOrgan && firstOrgan.classList.contains('hidden')) {
        const organId = firstOrgan.id;
        toggleCollapse(organId);
    }
});

function downloadImage() {
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    
    if (modalImage.src) {
        const link = document.createElement('a');
        link.href = modalImage.src;
        link.download = modalTitle.textContent + '.jpg';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
}
</script>
@endpush

</x-layout>