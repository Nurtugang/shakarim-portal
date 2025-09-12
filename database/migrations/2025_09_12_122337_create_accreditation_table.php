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
        Schema::create('accreditation', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('organ')->nullable();
            $table->boolean('accredited')->nullable();
            $table->string('type', 50);
            $table->string('certificate', 50)->nullable();
            $table->string('certificate2')->nullable();
            $table->string('language', 10);
            $table->integer('start')->nullable();
            $table->integer('end')->nullable();
            $table->string('filename')->nullable();
            $table->integer('created_at')->nullable();
            $table->integer('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accreditation');
    }
};
