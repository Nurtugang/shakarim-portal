<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Получаем все новости из базы данных
        $news = DB::table('news')->get();
        
        foreach ($news as $newsItem) {
            $updates = [];
            
            // Обрабатываем каждое поле контента
            foreach (['kk', 'ru', 'en', 'cn'] as $locale) {
                $field = 'content_' . $locale;
                $content = $newsItem->$field;
                
                // Проверяем, не является ли контент уже JSON
                if (!empty($content)) {
                    // Пытаемся декодировать как JSON
                    $decoded = json_decode($content, true);
                    
                    // Если это не JSON или не имеет правильную структуру Tiptap
                    if ($decoded === null || !isset($decoded['type'])) {
                        // Это старый HTML-контент, конвертируем его
                        $tiptapJson = [
                            'type' => 'doc',
                            'content' => [
                                [
                                    'type' => 'paragraph',
                                    'content' => [
                                        [
                                            'type' => 'text',
                                            'text' => strip_tags($content) // Удаляем HTML-теги
                                        ]
                                    ]
                                ]
                            ]
                        ];
                        
                        $updates[$field] = json_encode($tiptapJson, JSON_UNESCAPED_UNICODE);
                    }
                }
            }
            
            // Если есть что обновить, обновляем запись
            if (!empty($updates)) {
                DB::table('news')->where('id', $newsItem->id)->update($updates);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Обратная миграция: конвертируем JSON обратно в текст/HTML
        $news = DB::table('news')->get();
        
        foreach ($news as $newsItem) {
            $updates = [];
            
            foreach (['kk', 'ru', 'en', 'cn'] as $locale) {
                $field = 'content_' . $locale;
                $content = $newsItem->$field;
                
                if (!empty($content)) {
                    $decoded = json_decode($content, true);
                    
                    // Если это JSON, извлекаем текст
                    if ($decoded !== null && isset($decoded['type'])) {
                        $text = '';
                        
                        if (isset($decoded['content'])) {
                            foreach ($decoded['content'] as $block) {
                                if (isset($block['content'])) {
                                    foreach ($block['content'] as $textBlock) {
                                        if (isset($textBlock['text'])) {
                                            $text .= $textBlock['text'];
                                        }
                                    }
                                }
                            }
                        }
                        
                        $updates[$field] = $text;
                    }
                }
            }
            
            if (!empty($updates)) {
                DB::table('news')->where('id', $newsItem->id)->update($updates);
            }
        }
    }
};
