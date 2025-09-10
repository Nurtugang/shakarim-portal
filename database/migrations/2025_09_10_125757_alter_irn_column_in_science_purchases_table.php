<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('science_purchases', function (Blueprint $table) {
            if (Schema::hasColumn('science_purchases', 'irn')) {
                $table->dropColumn('irn');
            }
        });
    }

    public function down(): void
    {
        Schema::table('science_purchases', function (Blueprint $table) {
            if (!Schema::hasColumn('science_purchases', 'irn')) {
                $table->string('irn')->nullable();
            }
        });
    }
};
