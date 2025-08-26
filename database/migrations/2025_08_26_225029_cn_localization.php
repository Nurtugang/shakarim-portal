<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $columns = DB::select("
            SELECT 
                TABLE_NAME   AS table_name,
                COLUMN_NAME  AS column_name,
                DATA_TYPE    AS data_type,
                CHARACTER_MAXIMUM_LENGTH AS char_len
            FROM information_schema.columns
            WHERE table_schema = DATABASE()
              AND COLUMN_NAME LIKE '%\\_en'
        ");

        foreach ($columns as $col) {
            $table    = $col->table_name;
            $enColumn = $col->column_name;
            $cnColumn = preg_replace('/_en$/', '_cn', $enColumn);
            $type     = strtolower($col->data_type ?? '');
            $len      = $col->char_len ?? null;

            if (Schema::hasColumn($table, $cnColumn)) {
                continue;
            }

            // Создание колонку нужного типа
            Schema::table($table, function (Blueprint $blueprint) use ($type, $len, $cnColumn, $enColumn) {
                switch ($type) {
                    case 'varchar':
                        $def = $blueprint->string($cnColumn, $len ?: 191);
                        break;
                    case 'char':
                        $def = $blueprint->char($cnColumn, $len ?: 1);
                        break;
                    case 'text':
                        $def = $blueprint->text($cnColumn);
                        break;
                    case 'mediumtext':
                        $def = $blueprint->mediumText($cnColumn);
                        break;
                    case 'longtext':
                        $def = $blueprint->longText($cnColumn);
                        break;
                    case 'json':
                        $def = $blueprint->json($cnColumn);
                        break;    
                    default:
                        $def = $blueprint->longText($cnColumn);
                        break;
                }

                $def->nullable()->after($enColumn);
            });

            // Копируем данные
            DB::table($table)->update([
                $cnColumn => DB::raw($enColumn),
            ]);
        }
    }

    public function down(): void
    {
        $columns = DB::select("
            SELECT 
                TABLE_NAME  AS table_name,
                COLUMN_NAME AS column_name
            FROM information_schema.columns
            WHERE table_schema = DATABASE()
              AND COLUMN_NAME LIKE '%\\_cn'
        ");

        foreach ($columns as $col) {
            if (Schema::hasColumn($col->table_name, $col->column_name)) {
                Schema::table($col->table_name, function (Blueprint $blueprint) use ($col) {
                    $blueprint->dropColumn($col->column_name);
                });
            }
        }
    }
};
