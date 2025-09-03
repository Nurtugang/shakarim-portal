<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('science_purchases_offers', function (Blueprint $table) {
            $table->dropColumn(['bank_details', 'price_offer']);
        });
    }

    public function down()
    {
        Schema::table('science_purchases_offers', function (Blueprint $table) {
            $table->string('bank_details')->nullable();
            $table->decimal('price_offer', 15, 2)->nullable();
        });
    }
};

