<?php


// Migration: create_board_categories_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('board_categories', function (Blueprint $table) {
$table->id();
$table->string('title_kk');
$table->string('title_ru');
$table->string('title_en');
$table->string('title_cn');
$table->timestamps();
});


Schema::table('boards', function (Blueprint $table) {
$table->foreignId('category_id')->nullable()->constrained('board_categories')->nullOnDelete();
});
}


public function down(): void
{
Schema::table('boards', function (Blueprint $table) {
$table->dropConstrainedForeignId('category_id');
});


Schema::dropIfExists('board_categories');
}
};