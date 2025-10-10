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
        Schema::create('news_tag_assn', function (Blueprint $table) {
            $table->integer('news_id');
            $table->integer('tag_id');
            $table->integer('ord')->default(0);

            $table->primary(['news_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_tag_assn');
    }
};
