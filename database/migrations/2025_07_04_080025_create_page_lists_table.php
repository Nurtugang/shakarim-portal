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
        Schema::create('page_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('page_id')->constrained('pages')->onDelete('cascade');
            $table->string('title_kk');
            $table->string('title_ru');
            $table->string('title_en')->nullable();
            $table->text('content_kk');
            $table->text('content_ru');
            $table->text('content_en')->nullable();
            $table->text('content_text_kk')->nullable();
            $table->text('content_text_ru')->nullable();
            $table->text('content_text_en')->nullable();
            $table->string('slug');
            $table->string('image')->nullable();
            $table->dateTime('date')->nullable();
            $table->boolean('active');
            $table->json('gallery')->nullable();

            $table->fullText(['title_en', 'content_text_en'], 'search_en');
            $table->fullText(['title_kk', 'content_text_kk'], 'search_kk');
            $table->fullText(['title_ru', 'content_text_ru'], 'search_ru');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_lists');
    }
};
