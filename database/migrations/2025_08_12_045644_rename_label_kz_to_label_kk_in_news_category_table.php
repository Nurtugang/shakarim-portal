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
        Schema::table('news_category', function (Blueprint $table) {
            $table->renameColumn('label_kz', 'label_kk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news_category', function (Blueprint $table) {
            $table->renameColumn('label_kk', 'label_kz');
        });
    }
};