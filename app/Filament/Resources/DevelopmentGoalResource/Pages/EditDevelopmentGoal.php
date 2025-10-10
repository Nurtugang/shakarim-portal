<?php

namespace App\Filament\Resources\DevelopmentGoalResource\Pages;

use App\Filament\Resources\DevelopmentGoalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDevelopmentGoal extends EditRecord
{
    protected static string $resource = DevelopmentGoalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * Мутируем данные перед заполнением формы
     * Добавляем путь к директории, если его нет
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Если thumbnail существует и не содержит полный путь
        if (!empty($data['thumbnail']) && !str_starts_with($data['thumbnail'], 'dev_goals/')) {
            $data['thumbnail'] = 'dev_goals/' . $data['thumbnail'];
        }

        return $data;
    }

    /**
     * Мутируем данные перед сохранением
     * Убираем путь к директории, сохраняем только имя файла
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!empty($data['thumbnail']) && str_starts_with($data['thumbnail'], 'dev_goals/')) {
            $data['thumbnail'] = str_replace('dev_goals/', '', $data['thumbnail']);
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}