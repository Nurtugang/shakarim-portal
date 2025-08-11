<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn([
                'source_id',
                'name', 
                'excerpt',
                'description',
                'link',
                'language'
            ]);
        });
    }

    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->bigInteger('source_id')->nullable();
            $table->string('name')->nullable();
            $table->string('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->string('language', 10)->nullable();
        });
    }
};