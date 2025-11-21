<?php

namespace App\Filament\Resources\EducationalProgramGroupResource\Pages;

use App\Filament\Resources\EducationalProgramGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducationalProgramGroups extends ListRecords
{
    protected static string $resource = EducationalProgramGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
