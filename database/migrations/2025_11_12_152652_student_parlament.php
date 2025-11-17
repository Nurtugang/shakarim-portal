<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_parlament', function (Blueprint $table) {
            $table->id();
            $table->string('fullname_kk', 255);
            $table->string('fullname_ru', 255);
            $table->string('fullname_en', 255);
            $table->string('faculty_kk', 255);
            $table->string('faculty_ru', 255);
            $table->string('faculty_en', 255);
            $table->string('position_kk', 255);
            $table->string('position_ru', 255);
            $table->string('position_en', 255);
            $table->string('phone', 50);
            $table->string('image', 255)->nullable();
            $table->integer('status');
            $table->integer('sort')->default(0);
            $table->boolean('in_dean')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_parlament');
    }
};
