<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\Finder;

class TranslationsCleanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translations:clean {--delete : Удалить неиспользуемые ключи из файлов.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Находит и опционально удаляет неиспользуемые ключи из JSON-файлов переводов.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔍 Поиск неиспользуемых ключей переводов...');

        // 1. Получаем ВСЕ ключи из всех JSON-файлов в lang/
        $allKeys = $this->getAllJsonKeys();
        if (empty($allKeys)) {
            $this->info('Не найдено ни одного ключа в JSON-файлах переводов.');
            return self::SUCCESS;
        }

        // 2. Получаем ИСПОЛЬЗУЕМЫЕ ключи, сканируя все view-файлы
        $usedKeys = $this->getUsedKeysInViews();

        // 3. Находим разницу - это и есть неиспользуемые ключи
        $unusedKeys = array_diff($allKeys, $usedKeys);

        if (empty($unusedKeys)) {
            $this->info('✅ Все ключи переводов используются. Отличная работа!');
            return self::SUCCESS;
        }

        $this->warn('Найдены неиспользуемые ключи (' . count($unusedKeys) . '):');
        foreach ($unusedKeys as $key) {
            $this->line('  - ' . $key);
        }

        // 4. Если передан флаг --delete, предлагаем удалить ключи
        if ($this->option('delete')) {
            if ($this->confirm('Вы уверены, что хотите удалить эти ключи? Это действие необратимо.')) {
                $this->deleteUnusedKeys($unusedKeys);
                $this->info('✅ Неиспользуемые ключи были удалены.');
            } else {
                $this->info('Удаление отменено.');
            }
        } else {
            $this->info("\n💡 Чтобы удалить эти ключи, выполните команду с опцией: php artisan translations:clean --delete");
        }

        return self::SUCCESS;
    }

    /**
     * Собирает все ключи из JSON-файлов в директории lang/.
     */
    private function getAllJsonKeys(): array
    {
        $allKeys = [];
        $langPath = lang_path();
        
        if (!File::isDirectory($langPath)) {
            return [];
        }

        $jsonFiles = Finder::create()->in($langPath)->name('*.json')->files();

        foreach ($jsonFiles as $file) {
            $data = json_decode($file->getContents(), true);
            if (is_array($data)) {
                $allKeys = array_merge($allKeys, array_keys($data));
            }
        }

        return array_unique($allKeys);
    }

    /**
     * Ищет все использования функций __(), @lang(), trans() в Blade-файлах.
     */
    private function getUsedKeysInViews(): array
    {
        $usedKeys = [];
        $viewPath = resource_path('views');
        
        // Регулярное выражение для поиска ключей в функциях __(), @lang(), trans()
        // Оно находит ключи в одинарных и двойных кавычках.
        $regex = "/(?:__|@lang|trans)\\(\\s*['\"]([^'\"]+)['\"]\\s*[,)]/";

        $bladeFiles = Finder::create()->in($viewPath)->name('*.blade.php')->files();

        foreach ($bladeFiles as $file) {
            if (preg_match_all($regex, $file->getContents(), $matches)) {
                // $matches[1] будет содержать все захваченные группы (наши ключи)
                $usedKeys = array_merge($usedKeys, $matches[1]);
            }
        }

        return array_unique($usedKeys);
    }

    /**
     * Удаляет указанные ключи из всех JSON-файлов переводов.
     */
    private function deleteUnusedKeys(array $unusedKeys): void
    {
        $langPath = lang_path();
        $jsonFiles = Finder::create()->in($langPath)->name('*.json')->files();

        foreach ($jsonFiles as $file) {
            $path = $file->getRealPath();
            $data = json_decode(file_get_contents($path), true);
            $wasModified = false;

            if (!is_array($data)) continue;

            foreach ($unusedKeys as $keyToDelete) {
                if (array_key_exists($keyToDelete, $data)) {
                    unset($data[$keyToDelete]);
                    $wasModified = true;
                }
            }

            if ($wasModified) {
                // Пересохраняем файл с красивым форматированием
                $newJson = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                file_put_contents($path, $newJson);
                $this->line('Обновлен файл: ' . $file->getFilename());
            }
        }
    }
}