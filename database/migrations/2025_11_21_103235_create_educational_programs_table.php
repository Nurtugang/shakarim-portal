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
        Schema::create('educational_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_group_id')->nullable()->constrained('educational_program_groups')->nullOnDelete();
            $table->string('code');
            $table->string('name_kk');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('accreditation_status_kk')->nullable();
            $table->string('accreditation_status_ru')->nullable();
            $table->string('accreditation_status_en')->nullable();
            $table->string('epvo_url')->nullable(); // Ссылка на EPVO
            $table->string('accreditation_file_kk')->nullable(); // Файл аккредитации KK
            $table->string('accreditation_file_ru')->nullable(); // Файл аккредитации RU
            $table->string('accreditation_file_en')->nullable(); // Файл аккредитации EN
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
        Schema::dropIfExists('educational_programs');
    }
};
