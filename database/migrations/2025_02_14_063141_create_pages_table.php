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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');
            $table->string('title_kk');
            $table->string('title_ru');
            $table->string('title_en')->nullable();
            $table->json('content_kk');
            $table->json('content_ru');
            $table->json('content_en')->nullable();
            $table->string('slug',255);
            $table->boolean('active')->default(true);
            $table->string('lists_view_type',10)->nullable();
            $table->boolean('is_news_page')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
