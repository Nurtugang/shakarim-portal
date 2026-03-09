<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function ask(Request $request)
    {
        $request->validate(['question' => 'required|string|max:1000']);

        Log::info('Чат-бот: получен вопрос от пользователя', ['question' => $request->question]);

        try {
            $response = Http::withoutVerifying()->timeout(30)->get('https://admissionbot.shakarim.kz/api/smart_ask_gemini/', [
                'question' => $request->question
            ]);

            if ($response->successful()) {
                Log::info('Чат-бот: получен успешный ответ от API');
                $botAnswer = $response->json('answer'); 
                
                return response()->json(['answer' => $botAnswer]); 
            }

            Log::error('Чат-бот: ошибка API', [
                'status' => $response->status(), 
                'response' => $response->body()
            ]);
            
            return response()->json(['error' => 'Ошибка сервиса'], 500);

        } catch (\Exception $e) {
            Log::error('Чат-бот: системная ошибка при запросе', [
                'message' => $e->getMessage()
            ]);
            
            return response()->json(['error' => 'Внутренняя ошибка'], 500);
        }
    }
}