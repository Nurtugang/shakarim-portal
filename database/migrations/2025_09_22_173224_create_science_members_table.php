<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScienceMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('science_members', function (Blueprint $table) {
            $table->id(); // Эквивалент INT NOT NULL AUTO_INCREMENT PRIMARY KEY
            $table->string('fullname'); // Эквивалент varchar(255) NOT NULL
            $table->string('scopusid', 30)->nullable();
            $table->string('researcherid', 30)->nullable();
            $table->string('orcid', 20)->nullable();
            $table->text('additionally_kz')->nullable();
            $table->text('additionally_ru')->nullable();
            $table->text('additionally_en')->nullable();
            $table->unsignedBigInteger('project_id'); // Эквивалент int NOT NULL. Используем unsignedBigInteger как лучшую практику для внешних ключей.

            // В вашем SQL-дампе created_at и updated_at имеют тип INT,
            // что не является стандартом для Laravel (стандарт - TIMESTAMP).
            // Чтобы точно соответствовать вашей схеме, мы используем integer().
            $table->integer('updated_at')->nullable();
            $table->integer('created_at')->nullable();

            // Если бы вы хотели использовать стандартный подход Laravel,
            // вы бы использовали $table->timestamps(); вместо двух строк выше.
            // Но это создало бы столбцы типа TIMESTAMP, а не INT.

            // Рекомендуется также добавить внешний ключ, если у вас есть таблица 'projects'
            // $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('science_members');
    }
}