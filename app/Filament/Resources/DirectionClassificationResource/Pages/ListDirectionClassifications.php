<?php

namespace App\Filament\Resources\DirectionClassificationResource\Pages;

use App\Filament\Resources\DirectionClassificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDirectionClassifications extends ListRecords
{
    protected static string $resource = DirectionClassificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
