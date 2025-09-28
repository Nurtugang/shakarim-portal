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
        // Сначала удаляем внешний ключ и поле category_id из таблицы development_goals
        Schema::table('development_goals', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });

        // Затем удаляем всю таблицу development_goal_categories
        Schema::dropIfExists('development_goal_categories');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Восстанавливаем таблицу категорий
        Schema::create('development_goal_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title_kk', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('title_ru', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('title_en', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->timestamps();
        });

        // Восстанавливаем поле category_id и внешний ключ в таблице development_goals
        Schema::table('development_goals', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->after('thumbnail');
            $table->foreign('category_id')->references('id')->on('development_goal_categories')->onDelete('cascade');
            $table->index('category_id');
        });
    }
};