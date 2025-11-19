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
        // Получаем все объявления из базы данных
        $announcements = DB::table('announcement')->get();
        
        foreach ($announcements as $announcement) {
            $content = $announcement->content;
            
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
                    
                    DB::table('announcement')
                        ->where('id', $announcement->id)
                        ->update(['content' => json_encode($tiptapJson, JSON_UNESCAPED_UNICODE)]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Обратная миграция: конвертируем JSON обратно в текст
        $announcements = DB::table('announcement')->get();
        
        foreach ($announcements as $announcement) {
            $content = $announcement->content;
            
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
                    
                    DB::table('announcement')
                        ->where('id', $announcement->id)
                        ->update(['content' => $text]);
                }
            }
        }
    }
};
