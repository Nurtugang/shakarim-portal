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
        Schema::create('direction_classifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('education_field_id')->nullable()->constrained('education_fields')->nullOnDelete();
            $table->string('code');
            $table->string('name_kk');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('education_level'); // bachelor, master, doctorate
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direction_classifications');
    }
};
