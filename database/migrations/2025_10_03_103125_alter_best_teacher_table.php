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
        Schema::table('best_teacher', function (Blueprint $table) {
            $table->unsignedBigInteger('science_direction_id')->default(1)->after('department_id');
            $table->foreign('science_direction_id')->references('id')->on('science_directions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('best_teacher', function (Blueprint $table) {
            $table->dropForeign(['science_direction_id']);
            $table->dropColumn('science_direction_id');
        });
    }
};