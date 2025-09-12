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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('page_id')->index('page_files_page_id_foreign');
            $table->string('title_kk')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_cn')->nullable();
            $table->json('files_kk')->nullable();
            $table->json('files_ru')->nullable();
            $table->json('files_en')->nullable();
            $table->text('description_kk')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->longText('files_cn')->nullable();
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
