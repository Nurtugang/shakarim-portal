<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Восстанавливаем таблицу категорий
        Schema::create('development_goal_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title_kk', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('title_ru', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('title_en', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->timestamps();
        });

        // Добавляем обратно поле category_id в таблицу development_goals (без внешнего ключа)
        Schema::table('development_goals', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->after('thumbnail');
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Удаляем только поле category_id (внешнего ключа нет)
        Schema::table('development_goals', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });

        // Удаляем таблицу категорий
        Schema::dropIfExists('development_goal_categories');
    }
};