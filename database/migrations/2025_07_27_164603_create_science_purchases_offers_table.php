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
        Schema::create('science_purchases_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained('science_purchases')->onDelete('cascade');
            $table->string('organization');
            $table->string('head');
            $table->string('contact');
            $table->string('bank_details');
            $table->string('price_offer');
            $table->string('filename');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('science_purchases_offers');
    }
};
