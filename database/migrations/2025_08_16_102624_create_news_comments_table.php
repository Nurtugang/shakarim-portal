<?php
// database/migrations/xxxx_create_news_comments_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_id'); // Меняем на unsignedBigInteger
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
            
            // Добавляем индекс без foreign key constraint
            $table->index('news_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_comments');
    }
};