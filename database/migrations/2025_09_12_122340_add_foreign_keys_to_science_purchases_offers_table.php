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
        Schema::table('science_purchases_offers', function (Blueprint $table) {
            $table->foreign(['purchase_id'], 'FK_commercial_offer_science_purchases')->references(['id'])->on('science_purchases')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('science_purchases_offers', function (Blueprint $table) {
            $table->dropForeign('FK_commercial_offer_science_purchases');
        });
    }
};
