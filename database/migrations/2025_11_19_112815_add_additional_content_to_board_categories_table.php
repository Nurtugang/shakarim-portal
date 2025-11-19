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
        Schema::table('board_categories', function (Blueprint $table) {
            $table->text('additional_content_kk')->nullable();
            $table->text('additional_content_ru')->nullable();
            $table->text('additional_content_en')->nullable();
            $table->text('additional_content_cn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('board_categories', function (Blueprint $table) {
            $table->dropColumn([
                'additional_content_kk',
                'additional_content_ru',
                'additional_content_en',
                'additional_content_cn',
            ]);
        });
    }
};
