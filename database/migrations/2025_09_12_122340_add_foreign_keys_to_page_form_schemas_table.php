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
        Schema::table('page_form_schemas', function (Blueprint $table) {
            $table->foreign(['page_id'])->references(['id'])->on('pages')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_form_schemas', function (Blueprint $table) {
            $table->dropForeign('page_form_schemas_page_id_foreign');
        });
    }
};
