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
        // Создаем таблицу категорий целей развития
        Schema::create('development_goal_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title_kk', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('title_ru', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('title_en', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->timestamps();
        });

        // Создаем таблицу целей развития
        Schema::create('development_goals', function (Blueprint $table) {
            $table->id();
            $table->string('language', 10)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('title', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->mediumText('content')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('thumbnail', 50)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->tinyInteger('position')->unsigned()->default(0);
            $table->timestamps();

            // Внешний ключ
            $table->foreign('category_id')->references('id')->on('development_goal_categories')->onDelete('cascade');
            
            // Индексы
            $table->index('language');
            $table->index('category_id');
            $table->index('position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('development_goals');
        Schema::dropIfExists('development_goal_categories');
    }
};