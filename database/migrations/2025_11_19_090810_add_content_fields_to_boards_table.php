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
        Schema::table('boards', function (Blueprint $table) {
            // Add the new "content2" fields
            $table->text('content2_kk')->nullable()->after('content_cn');
            $table->text('content2_ru')->nullable()->after('content2_kk');
            $table->text('content2_en')->nullable()->after('content2_ru');
            $table->text('content2_cn')->nullable()->after('content2_en');
            
            // Add the new "content3" fields
            $table->text('content3_kk')->nullable()->after('content2_cn');
            $table->text('content3_ru')->nullable()->after('content3_kk');
            $table->text('content3_en')->nullable()->after('content3_ru');
            $table->text('content3_cn')->nullable()->after('content3_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boards', function (Blueprint $table) {
            $table->dropColumn([
                'content2_kk', 'content2_ru', 'content2_en', 'content2_cn',
                'content3_kk', 'content3_ru', 'content3_en', 'content3_cn',
            ]);
        });
    }
};