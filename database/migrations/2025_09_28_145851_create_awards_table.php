<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards', function (Blueprint $table) {
            $table->id();

            $table->string('category_kk')->nullable();
            $table->string('category_ru')->nullable();
            $table->string('category_en')->nullable();
            $table->string('category_cn')->nullable();

            $table->string('reward_kk')->nullable();
            $table->string('reward_ru')->nullable();
            $table->string('reward_en')->nullable();
            $table->string('reward_cn')->nullable();

            $table->text('position_kk')->nullable();
            $table->text('position_ru')->nullable();
            $table->text('position_en')->nullable();
            $table->text('position_cn')->nullable();

            $table->string('fullname_kk');
            $table->string('fullname_ru')->nullable();
            $table->string('fullname_en')->nullable();
            $table->string('fullname_cn')->nullable();

            $table->year('year');
            $table->string('image')->nullable();
            $table->integer('sort')->default(100);

            // Используем integer для created_at и updated_at, как в вашем старом дампе
            $table->integer('created_at')->nullable();
            $table->integer('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('awards');
    }
}