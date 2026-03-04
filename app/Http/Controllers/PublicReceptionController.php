<?php
namespace App\Http\Controllers;

use App\Models\PublicReception;
use Illuminate\Http\Request;

class PublicReceptionController extends Controller
{
    public function index(string $locale)
    {
        $receptions = PublicReception::where('is_published', true)
            ->latest()
            ->paginate(10);

        return view('public-reception.index', compact('receptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:2000',
            'g-recaptcha-response' => 'required|captcha'
        ], [
            'name.required' => __('Имя обязательно для заполнения'),
            'email.required' => __('Email обязателен для заполнения'),
            'email.email' => __('Некорректный email'),
            'message.required' => __('Сообщение обязательно для заполнения'),
            'message.max' => __('Сообщение не должно превышать 2000 символов'),
            'g-recaptcha-response.required' => __('Пройдите проверку капчи')
        ]);

        PublicReception::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ]);

        return back()->with('success', __('Ваше обращение успешно отправлено! Мы ответим в ближайшее время.'));
    }
}
