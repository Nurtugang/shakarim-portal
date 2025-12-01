<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use App\Enums\RolesEnum; // <-- Импортируем Enum

class DiplomasController extends Controller
{
    /**
     * Список ролей, которым разрешен доступ
     */
    private function getAllowedRoles(): array
    {
        return [
            RolesEnum::DIPLOMA_ACCESS,
        ];
    }

    /**
     * Проверка доступа (возвращает true, если доступ есть)
     */
    private function hasAccess($user): bool
    {
        // Получаем массив строковых значений ролей (например ['admin', 'science'])
        $allowedRoles = array_map(fn($role) => $role->value, $this->getAllowedRoles());

        // Проверяем через Spatie (если есть трейт HasRoles)
        if (method_exists($user, 'hasRole')) {
            return $user->hasRole($allowedRoles);
        }

        // РЕЗЕРВНЫЙ ВАРИАНТ (если Spatie нет, но есть связь roles)
        // Проверяем, есть ли у пользователя хоть одна роль из списка
        return $user->roles()->whereIn('name', $allowedRoles)->exists();
    }

    public function index(Request $request)
    {
        // 1. Если не вошел - форма входа
        if (!Auth::check()) {
            return view('academy.diplomas.login');
        }

        $user = Auth::user();

        // 2. Если вошел, но РОЛЬ не подходит - ошибка 403
        if (!$this->hasAccess($user)) {
            abort(403, 'Доступ запрещен. У вашего аккаунта недостаточно прав.');
        }

        // --- ДАЛЕЕ СТАНДАРТНАЯ ЛОГИКА ---
        $baseUrl = env('HUBM_API_URL');
        $token   = env('HUBM_API_TOKEN_2');
        
        $page  = $request->get('page', 1);
        $limit = $request->get('limit', 15);

        $response = Http::get(rtrim($baseUrl, '/') . '/diploma-data.php', [
            'token' => $token,
            'page'  => $page,
            'limit' => $limit,
        ]);

        $students = [];
        $total = 0;

        if ($response->successful()) {
            $json = $response->json();
            $students = $json['data'] ?? [];
            $total = $json['meta']['total'] ?? 0;
        }

        $perPage = ($limit == -1) ? ($total > 0 ? $total : 1) : $limit;

        $paginator = new LengthAwarePaginator(
            $students, 
            $total, 
            $perPage, 
            $page, 
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('academy.diplomas.index', [
            'students' => $paginator,
            'current_limit' => $limit
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Сразу после входа проверяем роль
            if (!$this->hasAccess(Auth::user())) {
                Auth::logout(); // Если роль не та, сразу выкидываем
                return back()->withErrors([
                    'email' => 'У вас нет прав доступа к этому разделу.',
                ]);
            }
            
            return redirect()->route('academy.diplomas.index');
        }

        return back()->withErrors([
            'email' => __('Неверный логин или пароль.'),
        ])->onlyInput('email');
    }

    public function download($id)
    {
        // Защита от скачивания по прямой ссылке
        if (!Auth::check() || !$this->hasAccess(Auth::user())) {
            abort(403);
        }

        $scriptUrl = 'https://hubm.shakarim.kz/api/etc/download_diploma.php'; 
        $token     = env('HUBM_API_TOKEN_2');

        $response = Http::withoutVerifying()->get($scriptUrl, ['id' => $id, 'token' => $token]);

        if (!$response->successful()) abort(404);

        return response($response->body())
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="diploma_'.$id.'.pdf"');
    }
}