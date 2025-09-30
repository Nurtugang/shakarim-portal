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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name_kk');
            $table->string('name_ru')->nullable();
            $table->string('name_en')->nullable();
            $table->string('dean_kk');
            $table->string('dean_ru');
            $table->string('dean_en')->nullable();
            $table->text('target_kk');
            $table->text('target_ru')->nullable();
            $table->text('target_en')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('dean_image')->nullable();
            $table->string('insta', 50)->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};