<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            
            $table->string('name_kk');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('name_cn')->nullable();
            
            $table->text('text_kk');
            $table->text('text_ru');
            $table->text('text_en');
            $table->text('text_cn')->nullable();
            
            $table->string('hours', 50);
            $table->text('form')->nullable();
            
            $table->string('filename', 255)->nullable();
            
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};