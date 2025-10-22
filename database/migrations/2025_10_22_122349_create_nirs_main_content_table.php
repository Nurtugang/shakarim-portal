<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nirs_main_content', function (Blueprint $table) {
            $table->id();
            $table->text('content_ru')->nullable();
            $table->text('content_kz')->nullable();
            $table->text('content_en')->nullable();
            $table->text('content_cn')->nullable();
            $table->timestamps();
        });

        DB::table('nirs_main_content')->insert([
            'id' => 1,
            'content_ru' => 'Это основной текст для первой вкладки НИРС (RU). Отредактируйте его в админ-панели.',
            'content_kz' => 'Бұл ҒЗЖ бірінші бетіне арналған негізгі мәтін (KZ). Оны әкімші панелінде өңдеңіз.',
            'content_en' => 'This is the main text for the first NIRS tab (EN). Edit it in the admin panel.',
            'content_cn' => '这是 NIRS 第一个选项卡的主文本 (CN)。请在管理面板中编辑它。',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nirs_main_content');
    }
};
