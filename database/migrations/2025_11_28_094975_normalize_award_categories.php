<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Добавляем внешний ключ
        Schema::table('awards', function (Blueprint $table) {
            $table->foreignId('award_category_id')
                  ->nullable() // Пока nullable, так как данные еще не перенесены
                  ->after('id')
                  ->constrained('award_categories')
                  ->nullOnDelete();
        });

        // 2. Скрипт переноса данных
        $awards = DB::table('awards')->get();

        foreach ($awards as $award) {
            // Проверяем, есть ли названия. Если все пустые - пропускаем
            if (!$award->category_ru && !$award->category_kk) {
                continue;
            }

            // Ищем такую категорию или создаем новую
            // Используем category_ru как основной идентификатор уникальности
            $category = DB::table('award_categories')
                ->where('name_ru', $award->category_ru)
                ->first();

            if (!$category) {
                $categoryId = DB::table('award_categories')->insertGetId([
                    'name_kk' => $award->category_kk,
                    'name_ru' => $award->category_ru,
                    'name_en' => $award->category_en,
                    'name_cn' => $award->category_cn,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                $categoryId = $category->id;
            }

            // Обновляем запись награды, привязывая ID
            DB::table('awards')
                ->where('id', $award->id)
                ->update(['award_category_id' => $categoryId]);
        }

        // 3. Удаляем старые текстовые колонки
        Schema::table('awards', function (Blueprint $table) {
            $table->dropColumn(['category_kk', 'category_ru', 'category_en', 'category_cn']);
        });
    }

    public function down(): void
    {
        // Обратный процесс (если вдруг нужно откатить)
        Schema::table('awards', function (Blueprint $table) {
            $table->string('category_kk')->nullable();
            $table->string('category_ru')->nullable();
            $table->string('category_en')->nullable();
            $table->string('category_cn')->nullable();
        });

        // Пытаемся вернуть данные назад (примерно)
        $awards = DB::table('awards')->get();
        foreach ($awards as $award) {
            if ($award->award_category_id) {
                $cat = DB::table('award_categories')->find($award->award_category_id);
                if ($cat) {
                    DB::table('awards')->where('id', $award->id)->update([
                        'category_kk' => $cat->name_kk,
                        'category_ru' => $cat->name_ru,
                        'category_en' => $cat->name_en,
                        'category_cn' => $cat->name_cn,
                    ]);
                }
            }
        }

        Schema::table('awards', function (Blueprint $table) {
            $table->dropForeign(['award_category_id']);
            $table->dropColumn('award_category_id');
        });
    }
};