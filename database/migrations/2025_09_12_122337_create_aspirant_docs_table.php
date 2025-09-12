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
        Schema::create('aspirant_docs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name_kz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('name_cn')->nullable();
            $table->integer('aspirant_id');
            $table->string('filename')->nullable();
            $table->integer('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirant_docs');
    }
};
