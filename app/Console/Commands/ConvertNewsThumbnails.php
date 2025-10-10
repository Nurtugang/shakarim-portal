<?php

namespace App\Console\Commands;

use App\Models\News;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ConvertNewsThumbnails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:convert-images
                            {--type=thumbnails : Что создавать: thumbnails, previews или both}
                            {--force : Пересоздать существующие файлы}
                            {--limit= : Ограничить количество обрабатываемых записей}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создать изображения (thumbnails или previews) для новостей';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $force = $this->option('force');
        $limit = $this->option('limit');
        $type  = $this->option('type'); // thumbnails | previews | both

        $this->info("Начинаем конвертацию изображений новостей в {$type}...");

        // Получаем новости с изображениями
        $query = News::whereNotNull('image')->where('image', '!=', '');
        if ($limit) {
            $query->limit((int)$limit);
        }
        $news = $query->get();
        $total = $news->count();

        if ($total === 0) {
            $this->warn('Не найдено новостей с изображениями для обработки.');
            return 0;
        }

        $this->info("Найдено {$total} новостей с изображениями.");
        $progressBar = $this->output->createProgressBar($total);
        $progressBar->start();

        $processed = 0;
        $skipped = 0;
        $errors = 0;

        foreach ($news as $newsItem) {
            try {
                $originalPath = storage_path('app/public/news/' . $newsItem->image);
                if (!file_exists($originalPath)) {
                    $this->newLine();
                    $this->warn("Файл не найден: {$newsItem->image} (ID: {$newsItem->id})");
                    $skipped++;
                    $progressBar->advance();
                    continue;
                }

                $nameWithoutExtension = pathinfo($newsItem->image, PATHINFO_FILENAME);

                $targets = [];
                if ($type === 'thumbnails' || $type === 'both') {
                    $targets['thumbnails'] = 'news/thumbnails/' . $nameWithoutExtension . '.webp';
                }
                if ($type === 'previews' || $type === 'both') {
                    $targets['previews'] = 'news/previews/' . $nameWithoutExtension . '.webp';
                }

                $created = true;

                foreach ($targets as $mode => $path) {
                    if (!$force && Storage::disk('public')->exists($path)) {
                        $skipped++;
                        continue;
                    }

                    if ($mode === 'thumbnails') {
                        $newsItem->createThumbnail();
                    } elseif ($mode === 'previews') {
                        $newsItem->createPreview();
                    }

                    if (!Storage::disk('public')->exists($path)) {
                        $this->newLine();
                        $this->error("Не удалось создать {$mode} для: {$newsItem->image} (ID: {$newsItem->id})");
                        $errors++;
                        $created = false;
                    }
                }

                if ($created) {
                    $processed++;
                }

            } catch (\Exception $e) {
                $this->newLine();
                $this->error("Ошибка при обработке {$newsItem->image} (ID: {$newsItem->id}): " . $e->getMessage());
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
