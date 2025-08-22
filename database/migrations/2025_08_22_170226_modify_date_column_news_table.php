<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dateTime('date_new')->nullable()->after('date');
        });

        DB::table('news')->update([
            'date_new' => DB::raw('FROM_UNIXTIME(date)')
        ]);

        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->renameColumn('date_new', 'date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
