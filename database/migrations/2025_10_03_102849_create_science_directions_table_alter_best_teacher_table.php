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
        Schema::create('science_directions', function (Blueprint $table) {
            $table->id();
            $table->string('name_kk');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('name_cn');
            $table->timestamps();
        });

        // Insert initial data
        DB::table('science_directions')->insert([
            [
                'id' => 1,
                'name_kk' => 'Техникалық ғылымдара',
                'name_ru' => 'Технические науки',
                'name_en' => 'Technical Sciences',
                'name_cn' => '技术科学',
            ],
            [
                'id' => 2,
                'name_kk' => 'Әлеуметтік-гуманитарлық ғылымдара',
                'name_ru' => 'Социальные и гуманитарные науки',
                'name_en' => 'Social and Humanitarian Sciences',
                'name_cn' => '社会与人文科学',
            ],
            [
                'id' => 3,
                'name_kk' => 'Жаратылыстану ғылымдары',
                'name_ru' => 'Естественные науки',
                'name_en' => 'Natural Sciences',
                'name_cn' => '自然科学',
            ],
            [
                'id' => 4,
                'name_kk' => 'Ветеринариялық ғылымдара',
                'name_ru' => 'Ветеринарные науки',
                'name_en' => 'Veterinary Sciences',
                'name_cn' => '兽医学',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('science_directions');
    }
};