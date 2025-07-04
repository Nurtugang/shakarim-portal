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
        Schema::create('structure_employees', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('structure_id')->nullable();
            $table->string('fullname_kk');
            $table->string('fullname_ru');
            $table->string('fullname_en')->nullable();
            $table->string('position_kz')->nullable();
            $table->string('position_ru')->nullable();
            $table->string('position_en')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('sort')->default(0);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structure_employees');
    }
};
