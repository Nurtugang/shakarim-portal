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
        Schema::table('page_files', function (Blueprint $table) {
            $table->text('description_kk')->nullable()->after('files_en');
            $table->text('description_ru')->nullable()->after('description_kk');
            $table->text('description_en')->nullable()->after('description_ru');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_files', function (Blueprint $table) {
            $table->dropColumn('description_kk');
            $table->dropColumn('description_ru');
            $table->dropColumn('description_en');
        });
    }
};
