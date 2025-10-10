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
        Schema::create('structures', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('title_kk');
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('title_cn')->nullable();
            $table->string('slug')->nullable();
            $table->string('link')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('sort_order')->default(0);
            $table->string('position', 10)->nullable()->default('0');
            $table->string('layout_type', 50)->default('0');
            $table->integer('active')->default(1)->index('idx_status');
            $table->boolean('is_structure')->default(false);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structures');
    }
};
