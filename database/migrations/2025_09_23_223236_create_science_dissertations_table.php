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
        Schema::create('science_dissertations', function (Blueprint $table) {
            // ID
            $table->id();

            // ФИО на 4 языках
            $table->string('fio_kk')->nullable();
            $table->string('fio_ru')->nullable();
            $table->string('fio_en')->nullable();
            $table->string('fio_cn')->nullable();

            // Содержимое (контент) на 4 языках. Используем longText, так как JSON может быть большим.
            $table->longText('content_kk')->nullable();
            $table->longText('content_ru')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_cn')->nullable();

            // Полные названия категорий на 4 языках. Используем text для длинных строк.
            $table->text('category_kk')->nullable();
            $table->text('category_ru')->nullable();
            $table->text('category_en')->nullable();
            $table->text('category_cn')->nullable();
            
            // Стандартные временные метки created_at и updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('science_dissertations');
    }
};