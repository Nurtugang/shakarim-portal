<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('development_goals_education_content', function (Blueprint $table) {
            $table->id();
            $table->text('content_ru')->nullable();
            $table->text('content_kk')->nullable();
            $table->text('content_en')->nullable();
            $table->text('content_cn')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('development_goals_education_content');
    }
};