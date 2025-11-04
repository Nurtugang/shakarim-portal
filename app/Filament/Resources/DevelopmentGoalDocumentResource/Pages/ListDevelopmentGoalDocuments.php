<?php

namespace App\Filament\Resources\DevelopmentGoalDocumentResource\Pages;

use App\Filament\Resources\DevelopmentGoalDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDevelopmentGoalDocuments extends ListRecords
{
    protected static string $resource = DevelopmentGoalDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Создать документ'),
        ];
    }
}