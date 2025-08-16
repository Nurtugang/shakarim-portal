<?php
namespace App\Http\Controllers;

use App\Models\RectorPost;
use App\Models\RectorQuestion;
use Illuminate\Http\Request;

class RectorBlogController extends Controller
{
    public function index(string $locale)
    {
        $posts = RectorPost::where('active', true)
            ->latest()
            ->paginate(6);

        $questions = RectorQuestion::where('is_published', true)
            ->latest()
            ->take(5)
            ->get();

        return view('rector.blog', compact('posts', 'questions'));
    }

    public function show(string $locale, RectorPost $post)
    {
        if (!$post->active) {
            abort(404);
        }

        return view('rector.post', compact('post'));
    }

    public function storeQuestion(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'question' => 'required|string|max:1000',
            'g-recaptcha-response' => 'required|captcha'
        ], [
            'name.required' => 'Имя обязательно для заполнения',
            'email.required' => 'Email обязателен для заполнения',
            'email.email' => 'Некорректный email',
            'question.required' => 'Вопрос обязателен для заполнения',
            'question.max' => 'Вопрос не должен превышать 1000 символов',
            'g-recaptcha-response.required' => 'Пройдите проверку капчи'
        ]);

        RectorQuestion::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'question' => $request->question
        ]);

        return back()->with('success', 'Ваш вопрос успешно отправлен! Мы ответим в ближайшее время.');
    }
}