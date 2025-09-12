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
        Schema::create('science_purchases', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedInteger('irn_id')->default(0);
            $table->string('name_kk');
            $table->string('name_ru');
            $table->string('name_en')->nullable();
            $table->string('name_cn')->nullable();
            $table->text('description_kk');
            $table->text('description_ru');
            $table->text('description_en')->nullable();
            $table->text('description_cn')->nullable();
            $table->text('justification_kk');
            $table->text('justification_ru');
            $table->text('justification_en')->nullable();
            $table->text('justification_cn')->nullable();
            $table->string('price', 20);
            $table->integer('quantity')->default(1);
            $table->string('deadlines_kk', 20)->nullable();
            $table->string('deadlines_ru', 20)->nullable();
            $table->string('deadlines_en', 20)->nullable();
            $table->string('deadlines_cn', 20)->nullable();
            $table->string('payment_terms', 20);
            $table->string('contacts');
            $table->tinyInteger('status');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('science_purchases');
    }
};
