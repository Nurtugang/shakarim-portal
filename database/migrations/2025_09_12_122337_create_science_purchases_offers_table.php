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
            $table->integer('id', true);
            $table->integer('purchase_id')->index('fk_commercial_offer_science_purchases');
            $table->string('organization');
            $table->string('head');
            $table->string('contact');
            $table->string('filename', 100);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
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
