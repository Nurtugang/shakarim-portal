<?php

namespace App\Filament\Resources\Science\ScienceOrganizationResource\Pages;

use App\Filament\Resources\Science\ScienceOrganizationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateScienceOrganization extends CreateRecord
{
    protected static string $resource = ScienceOrganizationResource::class;

    /**
     * Изменяем данные формы перед созданием записи.
     * Убираем префикс из путей, чтобы в БД хранилось только имя файла.
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Автоматически устанавливаем ID категории для научных кружков
        $data['category_id'] = 1;

        // Преобразуем null в пустые строки для языковых полей
        $data['name_kk'] = $data['name_kk'] ?? '';
        $data['dean_kk'] = $data['dean_kk'] ?? '';
        $data['target_kk'] = $data['target_kk'] ?? '';
        $data['name_en'] = $data['name_en'] ?? '';
        $data['dean_en'] = $data['dean_en'] ?? '';
        $data['target_en'] = $data['target_en'] ?? '';
        
        // Для логотипа кружка
        if (!empty($data['image'])) {
            $data['image'] = basename($data['image']);
        }

        // Для фото руководителя
        if (!empty($data['dean_image'])) {
            $data['dean_image'] = basename($data['dean_image']);
        }

        return $data;
    }
}