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
        Schema::create('structure_data', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('lang', 10)->nullable();
            $table->string('leader_name')->nullable();
            $table->string('image')->nullable();
            $table->string('leader_position')->nullable();
            $table->string('address')->nullable();
            $table->string('cabinet', 20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('phone_2', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->text('main_activities')->nullable();
            $table->text('target')->nullable();
            $table->text('additionally')->nullable();
            $table->integer('structure_id')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->json('data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structure_data');
    }
};
