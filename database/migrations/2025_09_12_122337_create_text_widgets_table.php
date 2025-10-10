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
        Schema::create('text_widgets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key')->unique();
            $table->string('title_kk');
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('title_cn')->nullable();
            $table->json('content_kk');
            $table->json('content_ru');
            $table->json('content_en');
            $table->longText('content_cn')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('text_widgets');
    }
};
