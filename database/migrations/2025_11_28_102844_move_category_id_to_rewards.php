<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Добавляем колонку категории в справочник наград
        Schema::table('award_rewards', function (Blueprint $table) {
            $table->foreignId('award_category_id')
                  ->nullable()
                  ->after('id')
                  ->constrained('award_categories')
                  ->nullOnDelete();
        });

        // 2. Переносим связи. 
        // Смотрим в таблицу awards, находим связку "награда -> категория" и обновляем справочник
        $links = DB::table('awards')
            ->select('award_reward_id', 'award_category_id')
            ->whereNotNull('award_reward_id')
            ->whereNotNull('award_category_id')
            ->distinct()
            ->get();

        foreach ($links as $link) {
            DB::table('award_rewards')
                ->where('id', $link->award_reward_id)
                ->update(['award_category_id' => $link->award_category_id]);
        }

        // 3. (Опционально) Удаляем лишнюю колонку из главной таблицы, 
        // но можно пока оставить, чтобы не ломать старый код резко.
        // Я рекомендую пока оставить, но сделать nullable, а потом удалить.
        Schema::table('awards', function (Blueprint $table) {
             // Просто снимаем обязательность, если она была
             $table->unsignedBigInteger('award_category_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('award_rewards', function (Blueprint $table) {
            $table->dropForeign(['award_category_id']);
            $table->dropColumn('award_category_id');
        });
    }
};