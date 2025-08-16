<?php
// database/migrations/xxxx_create_rector_posts_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rector_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title_kk');
            $table->string('title_ru');
            $table->string('title_en');
            $table->longText('content_kk');
            $table->longText('content_ru');
            $table->longText('content_en');
            $table->string('image')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rector_posts');
    }
};