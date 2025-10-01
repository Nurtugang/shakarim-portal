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
        Schema::dropIfExists('development_goal_categories');
        Schema::table('development_goals', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('development_goal_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title_kk', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('title_ru', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('title_en', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->timestamps();
        });
        Schema::table('development_goals', function (Blueprint $table) {
            $table->boolean('category_id')->default(false)->after('thumbnail');
        });
    }
};