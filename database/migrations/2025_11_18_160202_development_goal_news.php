<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('development_goal_news', function (Blueprint $table) {
            // development_goals.id = bigint unsigned
            $table->unsignedBigInteger('development_goal_id');
            
            // news.id = bigint (БЕЗ unsigned)
            $table->bigInteger('news_id');

            $table->foreign('development_goal_id')
                ->references('id')
                ->on('development_goals')
                ->onDelete('cascade');

            $table->foreign('news_id')
                ->references('id')
                ->on('news')
                ->onDelete('cascade');

            $table->primary(['development_goal_id', 'news_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('development_goal_news');
    }
};