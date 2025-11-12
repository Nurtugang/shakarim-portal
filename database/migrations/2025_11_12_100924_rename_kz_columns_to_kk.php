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
        Schema::table('science_members', function (Blueprint $table) {
                $table->renameColumn('additionally_kz', 'additionally_kk');
            });

        Schema::table('nirs_main_content', function (Blueprint $table) {
            $table->renameColumn('content_kz', 'content_kk');
        });
        Schema::table('aspirant_docs', function (Blueprint $table) {
            $table->renameColumn('name_kz', 'name_kk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('science_members', function (Blueprint $table) {
            $table->renameColumn('additionally_kk', 'additionally_kz');
        });

        Schema::table('nirs_main_content', function (Blueprint $table) {
            $table->renameColumn('content_kk', 'content_kz');
        });
        Schema::table('aspirant_docs', function (Blueprint $table) {
            $table->renameColumn('name_kk', 'name_kz');
        });
    }
};
