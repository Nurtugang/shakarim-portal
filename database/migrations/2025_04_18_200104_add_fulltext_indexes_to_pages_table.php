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
            $table->text('content_text_kk')->nullable()->after('content_en');;
            $table->text('content_text_ru')->nullable()->after('content_text_kk');
            $table->text('content_text_en')->nullable()->after('content_text_ru');
        });

        DB::statement('ALTER TABLE pages ADD FULLTEXT search_kk(title_kk, content_text_kk)');
        DB::statement('ALTER TABLE pages ADD FULLTEXT search_ru(title_ru, content_text_ru)');
        DB::statement('ALTER TABLE pages ADD FULLTEXT search_en(title_en, content_text_en)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropIndex('search_kk');
            $table->dropIndex('search_ru');
            $table->dropIndex('search_en');
            $table->dropColumn(['content_text_kk', 'content_text_ru', 'content_text_en']);
        });
    }
};
