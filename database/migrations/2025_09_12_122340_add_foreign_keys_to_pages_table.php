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
        Schema::table('pages', function (Blueprint $table) {
            $table->foreign(['menu_id'])->references(['id'])->on('menus')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['parent_id'])->references(['id'])->on('pages')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropForeign('pages_menu_id_foreign');
            $table->dropForeign('pages_parent_id_foreign');
        });
    }
};
