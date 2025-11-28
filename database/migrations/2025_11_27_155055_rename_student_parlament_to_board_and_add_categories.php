<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Переименование таблиц
        Schema::rename('student_parlament', 'student_board');
        Schema::rename('student_parlament_main_content', 'student_board_main_content');

        // 2. Создание таблицы категорий
        Schema::create('student_board_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_kk');
            $table->string('name_ru');
            $table->string('name_en');
            $table->timestamps();
        });

        // 3. Добавление данных (Seeding)
        DB::table('student_board_categories')->insert([
            [
                'id' => 1, 
                'name_ru' => 'Студенческий Парламент', 
                'name_kk' => 'Студенттік Парламент', 
                'name_en' => 'Student Parliament',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 2, 
                'name_ru' => 'Студенческий Мажилис', 
                'name_kk' => 'Студенттік Мәжіліс', 
                'name_en' => 'Student Majilis',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id' => 3, 
                'name_ru' => 'Студенческий Сенат', 
                'name_kk' => 'Студенттік Сенат', 
                'name_en' => 'Student Senate',
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);

        // 4. Добавление category_id в главную таблицу
        Schema::table('student_board', function (Blueprint $table) {
            $table->foreignId('category_id')
                  ->default(1) // По умолчанию Парламент
                  ->after('id')
                  ->constrained('student_board_categories')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('student_board', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });

        Schema::dropIfExists('student_board_categories');

        Schema::rename('student_board', 'student_parlament');
        Schema::rename('student_board_main_content', 'student_parlament_main_content');
    }
};