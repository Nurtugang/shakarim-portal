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
        Schema::create('page_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->cascadeOnDelete();
            $table->string('title_kk')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->json('files_kk')->nullable();
            $table->json('files_ru')->nullable();
            $table->json('files_en')->nullable();
            $table->string('thumbnail')->nullable();
            $table->tinyInteger('position')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_files');
    }
};
