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
            
            $table->longText('content_text_kk')->nullable()->change();
            $table->longText('content_text_ru')->nullable()->change();
            $table->longText('content_text_en')->nullable()->change();
            $table->longText('content_text_cn')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->text('content_text_kk')->nullable()->change();
            $table->text('content_text_ru')->nullable()->change();
            $table->text('content_text_en')->nullable()->change();
            
            if (Schema::hasColumn('pages', 'content_text_cn')) {
                $table->text('content_text_cn')->nullable()->change();
            }
        });
    }
};