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
        Schema::create('educational_program_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('direction_classification_id')->nullable()->constrained('direction_classifications')->nullOnDelete();
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
        Schema::dropIfExists('educational_program_groups');
    }
};
