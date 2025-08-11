<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->renameColumn('title_kz', 'title_kk');
            $table->renameColumn('content_kz', 'content_kk');
        });
    }

    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->renameColumn('title_kk', 'title_kz');
            $table->renameColumn('content_kk', 'content_kz');
        });
    }
};