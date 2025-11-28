<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('award_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_kk')->nullable();
            $table->string('name_ru')->nullable(); // Будем считать основным для поиска дублей
            $table->string('name_en')->nullable();
            $table->string('name_cn')->nullable();
            // Можно использовать стандартные timestamp, это проще для новой таблицы
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('award_categories');
    }
};