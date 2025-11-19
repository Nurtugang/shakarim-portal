<?php


// Migration: create_boards_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('boards', function (Blueprint $table) {
$table->id();
$table->string('fullname_kk')->nullable();
$table->string('fullname_ru')->nullable();
$table->string('fullname_en')->nullable();
$table->string('fullname_cn')->nullable();
$table->string('position_kk')->nullable();
$table->string('position_ru')->nullable();
$table->string('position_en')->nullable();
$table->string('position_cn')->nullable();
$table->text('content_kk')->nullable();
$table->text('content_ru')->nullable();
$table->text('content_en')->nullable();
$table->text('content_cn')->nullable();
$table->string('photo')->nullable();
$table->timestamps();
});
}


public function down(): void
{
Schema::dropIfExists('boards');
}
};