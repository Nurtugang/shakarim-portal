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
        Schema::create('scientific_projects', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('category_id')->default(1);
            $table->string('supervisor_kk');
            $table->string('supervisor_ru');
            $table->string('supervisor_en')->nullable();
            $table->string('supervisor_cn')->nullable();
            $table->string('name_kk');
            $table->mediumText('relevance_kk');
            $table->mediumText('target_kk');
            $table->mediumText('expectation_kk');
            $table->string('years', 10);
            $table->string('month', 5);
            $table->string('name_ru');
            $table->string('name_en')->nullable();
            $table->string('name_cn')->nullable();
            $table->mediumText('relevance_ru');
            $table->mediumText('relevance_en')->nullable();
            $table->mediumText('relevance_cn')->nullable();
            $table->mediumText('target_ru');
            $table->mediumText('target_en')->nullable();
            $table->mediumText('target_cn')->nullable();
            $table->mediumText('expectation_ru');
            $table->mediumText('expectation_en');
            $table->mediumText('expectation_cn')->nullable();
            $table->mediumText('result_kk');
            $table->mediumText('result_ru');
            $table->mediumText('result_en')->nullable();
            $table->mediumText('result_cn')->nullable();
            $table->integer('updated_at')->nullable();
            $table->integer('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scientific_projects');
    }
};
