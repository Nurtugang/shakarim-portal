<?php

namespace App\Filament\Resources\DevelopmentGoalDocumentResource\Pages;

use App\Filament\Resources\DevelopmentGoalDocumentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDevelopmentGoalDocument extends CreateRecord
{
    protected static string $resource = DevelopmentGoalDocumentResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Документ успешно создан';
    }
}