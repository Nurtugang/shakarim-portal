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
    protected $signature = 'news:convert-thumbnails 
                            {--force : Пересоздать существующие thumbnail\'ы}
                            {--limit= : Ограничить количество обрабатываемых записей}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создать thumbnail\'ы для существующих новостей';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $force = $this->option('force');
        $limit = $this->option('limit');
        
        $this->info('Начинаем конвертацию изображений новостей в thumbnail\'ы...');
        
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
                // Проверяем существует ли оригинальный файл
                $originalPath = storage_path('app/public/news/' . $newsItem->image);
                if (!file_exists($originalPath)) {
                    $this->newLine();
                    $this->warn("Файл не найден: {$newsItem->image} (ID: {$newsItem->id})");
                    $skipped++;
                    $progressBar->advance();
                    continue;
                }
                
                // Проверяем нужно ли создавать thumbnail
                $nameWithoutExtension = pathinfo($newsItem->image, PATHINFO_FILENAME);
                $thumbPath = 'news/thumbnails/' . $nameWithoutExtension . '.webp';
                
                if (!$force && Storage::disk('public')->exists($thumbPath)) {
                    $skipped++;
                    $progressBar->advance();
                    continue;
                }
                
                // Создаем thumbnail
                $newsItem->createThumbnail();
                
                // Проверяем что thumbnail создался
                if (Storage::disk('public')->exists($thumbPath)) {
                    $processed++;
                } else {
                    $this->newLine();
                    $this->error("Не удалось создать thumbnail для: {$newsItem->image} (ID: {$newsItem->id})");
                    $errors++;
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
        
        if ($errors === 0) {
            $this->info('Все файлы обработаны успешно!');
            return 0;
        } else {
            $this->warn("Обработка завершена с {$errors} ошибками.");
            return 1;
        }
    }
}