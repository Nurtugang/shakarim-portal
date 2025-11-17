<?php

namespace App\Filament\Resources\Science\ScienceDissertationResource\Pages;

use App\Filament\Resources\Science\ScienceDissertationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListScienceDissertations extends ListRecords
{
    protected static string $resource = ScienceDissertationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
