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
        Schema::create('development_goals_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('development_goal_id')
                  ->constrained('development_goals')
                  ->onDelete('cascade');
            $table->string('language', 2);
            $table->string('op');
            $table->string('link')->nullable();
            $table->timestamps();
            
            $table->index(['development_goal_id', 'language']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('development_goals_education');
    }
};