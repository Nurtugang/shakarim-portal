<x-layout>
    @php
        $appScreens = [
            'Announcements.jpg',
            'Document_flow.jpg',
            'News.jpg',
            'Profile.jpg',
        ];
    @endphp
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ route('site.index', app()->getLocale()) }}" class="hover:text-shakarim-blue">{{ __('Главная страница')}}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Mobile App')}}</span>
            </nav>
        </div>
    </section>
    <section class="bg-gray-50 py-12">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <h2 class="font-heading font-bold text-2xl md:text-3xl text-shakarim-blue mb-4">{{ __('Download the App') }}</h2>
            <p class="font-body text-gray-600 mb-6">{{ __('Mobile App') }} Shakarim University — {{ __('Fast access to university services') }}.</p>
            <div class="flex flex-wrap justify-center gap-6">
                <a href="https://play.google.com/store/apps/details?id=com.nureek2001.ShakarimApp" target="_blank" class="px-4 py-2 md:px-6 md:py-3 bg-shakarim-blue text-white rounded-xl flex items-center gap-2 md:gap-3 hover:bg-blue-800 transition">
                    <i class="fa-brands fa-google-play text-lg md:text-xl"></i>
                    <span class="font-heading font-semibold text-sm md:text-base">Google Play</span>
                </a>
                <a href="https://apps.apple.com/kz/app/shakarim-university/id6753332756" target="_blank" class="px-4 py-2 md:px-6 md:py-3 bg-black text-white rounded-xl flex items-center gap-2 md:gap-3 hover:bg-gray-800 transition">
                    <i class="fa-brands fa-apple text-lg md:text-xl"></i>
                    <span class="font-heading font-semibold text-sm md:text-base">App Store</span>
                </a>
            </div>
        </div>
    </section>
    {{-- Screenshots Carousel (basic) --}}
    <section class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4">
                @foreach($appScreens as $img)
                    <div class="aspect-[9/19] bg-gray-100 rounded-xl shadow relative overflow-hidden">
                        <img src="/storage/app/{{ $img }}" alt="{{ $img }}" class="h-full w-full object-cover" onerror="this.src='/img/app/placeholder-vertical.png'">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Features Section --}}
    <section class="py-10 md:py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">{{ __('Features') }}</h2>
                <p class="text-gray-600 font-body mt-2">{{ __('App Showcase') }}</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-2xl p-6 shadow hover:shadow-lg transition border border-gray-100">
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-shakarim-blue text-white flex items-center justify-center mb-4"><i class="fas fa-bolt text-sm md:text-base"></i></div>
                    <h3 class="font-heading font-semibold mb-2">{{ __('Fast access to university services') }}</h3>
                    <p class="text-sm text-gray-600 font-body">{{ __('Hub, news, events in one place') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow hover:shadow-lg transition border border-gray-100">
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-shakarim-blue text-white flex items-center justify-center mb-4"><i class="fas fa-calendar-alt text-sm md:text-base"></i></div>
                    <h3 class="font-heading font-semibold mb-2">{{ __('Track events and news') }}</h3>
                    <p class="text-sm text-gray-600 font-body">{{ __('Stay informed about university events and announcements') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow hover:shadow-lg transition border border-gray-100">
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-shakarim-blue text-white flex items-center justify-center mb-4"><i class="fas fa-file-signature text-sm md:text-base"></i></div>
                    <h3 class="font-heading font-semibold mb-2">{{ __('Manage documents and profile') }}</h3>
                    <p class="text-sm text-gray-600 font-body">{{ __('Convenient work with documents and personal data') }}</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow hover:shadow-lg transition border border-gray-100">
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-shakarim-blue text-white flex items-center justify-center mb-4"><i class="fas fa-language text-sm md:text-base"></i></div>
                    <h3 class="font-heading font-semibold mb-2">{{ __('Multilingual interface') }}</h3>
                    <p class="text-sm text-gray-600 font-body">{{ __('Russian Kazakh English easily switch') }}</p>
                </div>
            </div>
        </div>
    </section>
</x-layout>
