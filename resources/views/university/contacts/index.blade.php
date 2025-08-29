<x-layout metaTitle="{{ __('Контакты') }}">
    <!-- Breadcrumbs and Section -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 1]) }}" class="hover:text-shakarim-blue">{{ __('Университет') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Контакты') }}</span>
            </nav>
        </div>
    </section>
    
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue mb-8 mt-2">{{ __('Контакты') }}</h1>
            <div class="main-content">
                <!-- Контент из админки -->
                <div class="tiptap-content">
                    <div class="content tiptap-content font-sf">
                        <h3>{{ __('Об университете') }}</h3>
                        <ul>
                            <li>
                                <p><strong>{{ __('Полное наименование:') }} </strong>{{ __('Некоммерческое акционерное общество «Шәкәрім Университет»') }}</p>
                            </li>
                            <li>
                                <p><strong>{{ __('Адрес:') }} </strong>{{ __('РК , 071412, область Абай, г.Семей, ул.Глинки 20 «А»') }}</p>
                            </li>
                            <li>
                                <p><strong>{{ __('БИН:') }} </strong>130840007973</p>
                            </li>
                            <li>
                                <p><strong>{{ __('КБЕ:') }} </strong>16</p>
                            </li>
                            <li>
                                <p><strong>{{ __('КОД ОКПО:') }} </strong>ОКПО 30958953</p>
                            </li>
                        </ul>
                        <p></p>
                        <hr>
                        <p></p>
                        <h3>{{ __('Банковские реквизиты') }}</h3>
                        <ul>
                            <li>
                                <p><strong>{{ __('в АО «Народный Банк Казахстана»') }}</strong></p>
                            </li>
                            <li>
                                <p><strong>{{ __('ИИК:') }} </strong>KZ 126010261000182423</p>
                            </li>
                            <li>
                                <p><strong>{{ __('БИК:') }} </strong>HSBKKZKX</p>
                            </li>
                        </ul>
                        <p></p>
                        <hr>
                        <p></p>
                        <h3>{{ __('Контактная информация') }}</h3>
                        <ul>
                            <li>
                                <p><strong>{{ __('Адрес:') }} </strong>071410, {{ __('РК, область Абай, г. Семей, ул. Глинки, 20А') }}</p>
                            </li>
                            <li>
                                <p><strong>{{ __('Приемная ректора:') }}  </strong><a href="tel:+77222316029"><strong>+7 (7222) 31-60-29</strong></a></p>
                            </li>
                            <li>
                                <p><strong>{{ __('Приемная комиссия:') }} </strong><a href="tel:+77713654625"><strong>+7 (771) 365-46-25</strong></a></p>
                            </li>
                            <li>
                                <p><strong>{{ __('Канцелярия:') }} </strong><a href="tel:+77222313175"><strong>+7 (7222) 31-31-75</strong></a><strong>, </strong><a href="mailto:kense@shakarim.kz"><strong>kense@shakarim.kz</strong></a></p>
                            </li>
                            <li>
                                <p><strong>Call centre: </strong><a href="tel:+77222313175"><strong>+7 (7222) 31-31-75</strong></a></p>
                            </li>
                            <li>
                                <p><strong>{{ __('Министерство науки и высшего образования РК:') }} </strong><a href="tel:+77172742361"><strong>+7 (7172) 74-23-61</strong></a><strong>, </strong><a href="https://www.instagram.com/gylym_jogarybilim/" data-as-button="false" data-as-button-theme=""><strong>@gylym.jogarybilim</strong></a></p>
                            </li>
                        </ul>
                        <p></p>
                        <hr>
                        <p></p>
                        <h3>{{ __('Мы на карте') }}</h3>
                    </div>
                    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A37f6c93f62a1deb7626961996f208ec5ae4711791b10783a525a379c3afe3f0d&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </section>
</x-layout>