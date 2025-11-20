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
        Schema::create('graduates', function (Blueprint $table) {
            $table->id();
            $table->string('academic_year', 20)->index(); // e.g. 2023-2024
            $table->string('title_kk')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->string('document_kk')->nullable(); // path to PDF
            $table->string('document_ru')->nullable();
            $table->string('document_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graduates');
    }
};
