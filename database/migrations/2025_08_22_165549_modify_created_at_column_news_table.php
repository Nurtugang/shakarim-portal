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
            $table->dateTime('created_at_new')->nullable();
        });

        DB::table('news')->update([
            'created_at_new' => DB::raw('FROM_UNIXTIME(created_at)')
        ]);

        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->renameColumn('created_at_new', 'created_at');
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
