<?php

namespace App\Filament\Resources\ScientificProjectResource\Pages;

use App\Filament\Resources\ScientificProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListScientificProjects extends ListRecords
{
    protected static string $resource = ScientificProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
