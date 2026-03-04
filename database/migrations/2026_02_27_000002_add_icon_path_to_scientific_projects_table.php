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
        Schema::table('scientific_projects', function (Blueprint $table) {
            $table->string('icon_path', 255)
                ->nullable()
                ->after('years');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scientific_projects', function (Blueprint $table) {
            $table->dropColumn('icon_path');
        });
    }
};

