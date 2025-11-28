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
        Schema::create('dashboard_infos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Информация'); // Заголовок блока
            $table->longText('content')->nullable(); // Сам текст с HTML
            $table->boolean('is_active')->default(false); // Чтобы можно было включать/выключать
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_infos');
    }
};
