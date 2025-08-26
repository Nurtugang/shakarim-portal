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
         Schema::table('pages', function (Blueprint $table) {
            DB::statement("ALTER TABLE `pages` 
                           MODIFY `content_kk` LONGTEXT 
                           CHARACTER SET utf8mb4
                           COLLATE utf8mb4_unicode_ci");
            DB::statement("ALTER TABLE `pages` 
                           MODIFY `content_ru` LONGTEXT 
                           CHARACTER SET utf8mb4
                           COLLATE utf8mb4_unicode_ci");
            DB::statement("ALTER TABLE `pages` 
                           MODIFY `content_en` LONGTEXT 
                           CHARACTER SET utf8mb4
                           COLLATE utf8mb4_unicode_ci");
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
