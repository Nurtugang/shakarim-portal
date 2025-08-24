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
        DB::table('structures')
            ->where('created_at', '0000-00-00 00:00:00')
            ->update(['created_at' => null]);

        DB::table('structures')
            ->where('updated_at', '0000-00-00 00:00:00')
            ->update(['updated_at' => null]);

        Schema::table('structures', function (Blueprint $table) {
            $table->unsignedInteger('id')->change();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('structure_id')->nullable()->after('id');
            $table->foreign('structure_id')->references('id')->on('structures')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['structure_id']);
            $table->dropColumn('structure_id');
        });
    }
};
