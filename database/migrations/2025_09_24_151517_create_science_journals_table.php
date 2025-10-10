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
        Schema::create('science_journals', function (Blueprint $table) {
            $table->id();
            $table->string('name_kk');
            $table->string('name_ru');
            $table->string('name_en')->nullable();
            $table->string('name_cn')->nullable();
            $table->string('number', 20);
            $table->year('year');
            $table->string('filename')->nullable();
            $table->integer('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('science_journals');
    }
};