<x-layout>
    {{-- Закрываем от индексации страницу входа тоже --}}
    @section('meta_robots', 'noindex, nofollow')
    @section('meta_title', __('Вход в систему') . ' - Shakarim University')

    <div class="min-h-[60vh] flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-md border border-gray-200">
            <div>
                <h2 class="mt-2 text-center text-2xl font-extrabold text-gray-900">
                    {{ __('Доступ ограничен') }}
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    {{ __('Для просмотра реестра дипломов, пожалуйста, авторизуйтесь.') }}
                </p>
            </div>
            
            <form class="mt-8 space-y-6" action="{{ route('diplomas.login') }}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="email" autocomplete="email" required 
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-shakarim-blue focus:border-shakarim-blue focus:z-10 sm:text-sm" 
                            placeholder="Email"
                            value="{{ old('email') }}">
                    </div>
                    <div>
                        <label for="password" class="sr-only">{{ __('Пароль') }}</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required 
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-shakarim-blue focus:border-shakarim-blue focus:z-10 sm:text-sm" 
                            placeholder="{{ __('Пароль') }}">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" 
                            class="h-4 w-4 text-shakarim-blue focus:ring-shakarim-blue border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">
                            {{ __('Запомнить меня') }}
                        </label>
                    </div>
                </div>

                {{-- Вывод ошибок --}}
                @if ($errors->any())
                    <div class="text-red-600 text-sm text-center bg-red-50 p-2 rounded">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-shakarim-blue hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-shakarim-blue transition-colors">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-lock text-blue-300 group-hover:text-blue-100"></i>
                        </span>
                        {{ __('Войти') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>