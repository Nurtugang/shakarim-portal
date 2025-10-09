<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('structures', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement()->change();
        });
    }

    public function down()
    {
        Schema::table('structures', function (Blueprint $table) {
            $table->integer('id')->unsigned()->change();
        });
    }
};
