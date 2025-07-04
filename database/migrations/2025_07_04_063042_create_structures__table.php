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
        Schema::create('structures_', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title_kk');
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('slug')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('active')->default(1)->index('idx_status');
            $table->string('position', 10)->nullable();
            $table->string('layout_type', 50)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structures_');
    }
};
