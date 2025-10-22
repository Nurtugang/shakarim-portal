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
        Schema::create('nirs_items', function (Blueprint $table) {
            $table->id();
            $table->integer('year'); 
            
            $table->string('title_ru');
            $table->string('title_kk')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_cn')->nullable();

            $table->string('file_path_kk')->nullable();
            $table->string('file_path_ru')->nullable();
            $table->string('file_path_en')->nullable();
            $table->string('file_path_cn')->nullable();

            $table->string('original_name_kk')->nullable();
            $table->string('original_name_ru')->nullable();
            $table->string('original_name_en')->nullable();
            $table->string('original_name_cn')->nullable();
            
            $table->timestamps();

            $table->index('year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nirs_items');
    }
};