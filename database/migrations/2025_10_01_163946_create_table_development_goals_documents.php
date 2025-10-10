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
        Schema::create('development_goals_documents', function (Blueprint $table) {
            $table->id();
            $table->string('language', 2);
            $table->string('title');
            $table->string('path');
            $table->tinyInteger('type')->default(1)->comment('1 = document, 2 = report');
            $table->timestamps();
            
            $table->index('language');
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('development_goals_documents');
    }
};