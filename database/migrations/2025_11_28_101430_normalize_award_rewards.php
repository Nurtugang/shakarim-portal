<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Добавляем колонку (Таблица award_rewards УЖЕ СУЩЕСТВУЕТ благодаря предыдущей миграции)
        Schema::table('awards', function (Blueprint $table) {
            $table->foreignId('award_reward_id')
                  ->nullable()
                  ->after('award_category_id')
                  ->constrained('award_rewards') // Связь с таблицей выше
                  ->nullOnDelete();
        });

        // 2. Переносим данные
        $awards = DB::table('awards')->get();

        foreach ($awards as $award) {
            // Пропускаем, если названий нет
            if (!$award->reward_ru && !$award->reward_kk) {
                continue;
            }

            // Ищем дубликат в справочнике
            $rewardRef = DB::table('award_rewards')
                ->where('name_ru', $award->reward_ru)
                ->first();

            if (!$rewardRef) {
                // Создаем новую
                $rewardId = DB::table('award_rewards')->insertGetId([
                    'name_kk' => $award->reward_kk,
                    'name_ru' => $award->reward_ru,
                    'name_en' => $award->reward_en,
                    'name_cn' => $award->reward_cn,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                $rewardId = $rewardRef->id;
            }

            // Обновляем запись
            DB::table('awards')
                ->where('id', $award->id)
                ->update(['award_reward_id' => $rewardId]);
        }

        // 3. Удаляем старые колонки
        Schema::table('awards', function (Blueprint $table) {
            $table->dropColumn(['reward_kk', 'reward_ru', 'reward_en', 'reward_cn']);
        });
    }

    public function down(): void
    {
        Schema::table('awards', function (Blueprint $table) {
            $table->string('reward_kk')->nullable();
            $table->string('reward_ru')->nullable();
            $table->string('reward_en')->nullable();
            $table->string('reward_cn')->nullable();
            $table->dropForeign(['award_reward_id']);
            $table->dropColumn('award_reward_id');
        });
    }
};