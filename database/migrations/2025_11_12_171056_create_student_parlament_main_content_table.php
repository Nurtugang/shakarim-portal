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
        Schema::create('student_parlament_main_content', function (Blueprint $table) {
            $table->id();
            $table->text('content_ru')->nullable();
            $table->text('content_kk')->nullable();
            $table->text('content_en')->nullable();
            $table->text('content_cn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_parlament_main_content');
    }
};
