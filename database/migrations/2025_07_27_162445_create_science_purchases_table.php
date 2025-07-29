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
            $table->id();
            $table->foreignId('irn_id')->constrained('science_purchases_irns')->onDelete('cascade');
            $table->string('name_kk');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('description_kk');
            $table->string('description_ru');
            $table->string('description_en');
            $table->string('justification_kk');
            $table->string('justification_ru');
            $table->string('justification_en');
            $table->string('deadlines_kk');
            $table->string('deadlines_ru');
            $table->string('deadlines_en');
            $table->string('price');
            $table->string('payment_terms');
            $table->string('contacts');
            $table->string('status');
            $table->timestamps();
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
