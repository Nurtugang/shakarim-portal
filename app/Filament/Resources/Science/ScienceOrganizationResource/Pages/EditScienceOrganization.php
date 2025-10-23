<?php

namespace App\Filament\Resources\Science\ScienceOrganizationResource\Pages;

use App\Filament\Resources\Science\ScienceOrganizationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScienceOrganization extends EditRecord
{
    protected static string $resource = ScienceOrganizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * Подготавливаем данные перед заполнением формы.
     * Добавляем префикс к путям изображений, чтобы Filament мог их отобразить.
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Для логотипа кружка
        if (!empty($data['image']) && !str_starts_with($data['image'], 'organizations/')) {
            $data['image'] = 'organizations/' . $data['image'];
        }

        // Для фото руководителя
        if (!empty($data['dean_image']) && !str_starts_with($data['dean_image'], 'organizations/')) {
            $data['dean_image'] = 'organizations/' . $data['dean_image'];
        }

        return $data;
    }

    /**
     * Подготавливаем данные перед сохранением.
     * Убираем префикс из путей, чтобы в БД хранилось только имя файла.
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
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