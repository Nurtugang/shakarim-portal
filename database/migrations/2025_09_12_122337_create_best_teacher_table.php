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
        Schema::create('best_teacher', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('fullname_kk');
            $table->string('fullname_ru');
            $table->string('fullname_en');
            $table->string('fullname_cn')->nullable();
            $table->string('position_kk');
            $table->string('position_ru');
            $table->string('position_en')->nullable();
            $table->string('position_cn')->nullable();
            $table->year('year');
            $table->integer('faculty_id');
            $table->integer('department_id');
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('best_teacher');
    }
};
