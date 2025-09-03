<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('accreditation', function (Blueprint $table) {
            $table->string('certificate2')->nullable()->after('certificate');
        });
    }

    public function down()
    {
        Schema::table('accreditation', function (Blueprint $table) {
            $table->dropColumn('certificate2');
        });
    }
};