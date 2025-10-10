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
        Schema::create('news', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('alias');
            $table->string('image')->nullable();
            $table->text('content_kk')->nullable();
            $table->text('content_ru')->nullable();
            $table->text('content_en')->nullable();
            $table->text('content_cn')->nullable();
            $table->string('title_kk')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_cn')->nullable();
            $table->integer('category_id');
            $table->dateTime('date')->nullable();
            $table->boolean('status')->nullable()->default(false);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
