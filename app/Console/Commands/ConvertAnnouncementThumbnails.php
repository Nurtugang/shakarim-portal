<?php

namespace App\Console\Commands;

use App\Models\Announcement;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ConvertAnnouncementThumbnails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'announcement:convert-images
                            {--type=thumbnails : Что создавать: thumbnails, previews или both}
                            {--force : Пересоздать существующие файлы}
                            {--limit= : Ограничить количество обрабатываемых записей}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создать изображения (thumbnails или previews) для объявлений';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $force = $this->option('force');
        $limit = $this->option('limit');
        $type  = $this->option('type'); // thumbnails | previews | both

        $this->info("Начинаем конвертацию изображений объявлений в {$type}...");

        // Получаем объявления с изображениями
        $query = Announcement::whereNotNull('image')->where('image', '!=', '');
        if ($limit) {
            $query->limit((int)$limit);
        }
        $announcements = $query->get();
        $total = $announcements->count();

        if ($total === 0) {
            $this->warn('Не найдено объявлений с изображениями для обработки.');
            return 0;
        }

        $this->info("Найдено {$total} объявлений с изображениями.");
        $progressBar = $this->output->createProgressBar($total);
        $progressBar->start();

        $processed = 0;
        $skipped = 0;
        $errors = 0;

        foreach ($announcements as $item) {
            try {
                $originalPath = storage_path('app/public/announcement/' . $item->image);
                if (!file_exists($originalPath)) {
                    $this->newLine();
                    $this->warn("Файл не найден: {$item->image} (ID: {$item->id})");
                    $skipped++;
                    $progressBar->advance();
                    continue;
                }

                $nameWithoutExtension = pathinfo($item->image, PATHINFO_FILENAME);

                $targets = [];
                if ($type === 'thumbnails' || $type === 'both') {
                    $targets['thumbnails'] = 'announcement/thumbnails/' . $nameWithoutExtension . '.webp';
                }
                if ($type === 'previews' || $type === 'both') {
                    $targets['previews'] = 'announcement/previews/' . $nameWithoutExtension . '.webp';
                }

                $created = true;

                foreach ($targets as $mode => $path) {
                    if (!$force && Storage::disk('public')->exists($path)) {
                        $skipped++;
                        continue;
                    }

                    if ($mode === 'thumbnails') {
                        $item->createThumbnail();
                    } elseif ($mode === 'previews') {
                        $item->createPreview();
                    }

                    if (!Storage::disk('public')->exists($path)) {
                        $this->newLine();
                        $this->error("Не удалось создать {$mode} для: {$item->image} (ID: {$item->id})");
                        $errors++;
                        $created = false;
                    }
                }

                if ($created) {
                    $processed++;
                }

            } catch (\Exception $e) {
                $this->newLine();
                $this->error("Ошибка при обработке {$item->image} (ID: {$item->id}): " . $e->getMessage());
                $errors++;
            }

            $progressBar->advance();
        }

        $progressBar->finish();
        $this->newLine(2);

        // Выводим статистику
        $this->info("Конвертация завершена!");
        $this->table(
            ['Статус', 'Количество'],
            [
                ['Обработано', $processed],
                ['Пропущено', $skipped],
                ['Ошибок', $errors],
                ['Всего', $total]
            ]
        );

        return $errors === 0 ? 0 : 1;
    }
}
