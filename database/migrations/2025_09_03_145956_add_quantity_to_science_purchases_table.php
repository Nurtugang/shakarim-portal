<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::table('science_purchases', function (Blueprint $table) {
            $table->integer('quantity')->default(1)->after('price');
        });
    }

    public function down()
    {
        Schema::table('science_purchases', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }

};
