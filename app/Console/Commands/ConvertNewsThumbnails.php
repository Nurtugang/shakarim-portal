<?php

namespace App\Console\Commands;

use App\Models\News;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ConvertNewsThumbnails extends Command
{
    protected $signature = 'news:convert-images
                            {--type=thumbnails : Что создавать: thumbnails, previews или both}
                            {--force : Пересоздать существующие файлы}
                            {--limit= : Ограничить количество обрабатываемых записей}';

    protected $description = 'Создать изображения (thumbnails или previews) для новостей из поля image_post';

    public function handle()
    {
        // СНАЧАЛА СКОПИРУЕМ СТАРЫЕ ЗНАЧЕНИЯ, ЕСЛИ image_post ПУСТОЙ
        $this->info('Шаг 1: Копируем имена файлов из `image` в `image_post` для старых записей...');
        $updatedCount = News::whereNotNull('image')->whereNull('image_post')->update(['image_post' => \DB::raw('image')]);
        $this->info("Скопировано {$updatedCount} записей.");
        
        $force = $this->option('force');
        $limit = $this->option('limit');
        $type  = $this->option('type');

        $this->info("Шаг 2: Начинаем создание {$type} из поля `image_post`...");

        // ИЗМЕНЕНО: Используем `image_post`
        $query = News::whereNotNull('image_post')->where('image_post', '!=', '');
        if ($limit) {
            $query->limit((int)$limit);
        }
        $news = $query->get();
        $total = $news->count();

        if ($total === 0) {
            $this->warn('Не найдено новостей с `image_post` для обработки.');
            return 0;
        }

        $this->info("Найдено {$total} новостей с `image_post`.");
        $progressBar = $this->output->createProgressBar($total);
        $progressBar->start();

        $processed = 0;
        $skipped = 0;
        $errors = 0;

        foreach ($news as $newsItem) {
            try {
                // ИЗМЕНЕНО: Используем `image_post`
                $originalPath = storage_path('app/public/news/' . $newsItem->image_post);
                if (!file_exists($originalPath)) {
                    $this->newLine();
                    $this->warn("Файл не найден: {$newsItem->image_post} (ID: {$newsItem->id})");
                    $skipped++;
                    $progressBar->advance();
                    continue;
                }

                // ИЗМЕНЕНО: Используем `image_post`
                $nameWithoutExtension = pathinfo($newsItem->image_post, PATHINFO_FILENAME);

                // ... остальная логика остается той же ...
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
                    } 
                    // Мы удалили createPreview, поэтому эту часть можно закомментировать или удалить
                    // elseif ($mode === 'previews') {
                    //     $newsItem->createPreview();
                    // }

                    if (!Storage::disk('public')->exists($path)) {
                        $this->newLine();
                        $this->error("Не удалось создать {$mode} для: {$newsItem->image_post} (ID: {$newsItem->id})");
                        $errors++;
                        $created = false;
                    }
                }

                if ($created) {
                    $processed++;
                }

            } catch (\Exception $e) {
                $this->newLine();
                $this->error("Ошибка при обработке {$newsItem->image_post} (ID: {$newsItem->id}): " . $e->getMessage());
                $errors++;
            }

            $progressBar->advance();
        }

        $progressBar->finish();
        $this->newLine(2);
        
        $this->info("Конвертация завершена!");
        $this->table(
            ['Статус', 'Количество'],
            [['Обработано', $processed], ['Пропущено', $skipped], ['Ошибок', $errors], ['Всего', $total]]
        );

        return $errors === 0 ? 0 : 1;
    }
}