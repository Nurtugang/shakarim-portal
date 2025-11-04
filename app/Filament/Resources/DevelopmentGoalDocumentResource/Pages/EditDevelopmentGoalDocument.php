<?php

namespace App\Filament\Resources\DevelopmentGoalDocumentResource\Pages;

use App\Filament\Resources\DevelopmentGoalDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDevelopmentGoalDocument extends EditRecord
{
    protected static string $resource = DevelopmentGoalDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Удалить'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Документ успешно обновлен';
    }
}