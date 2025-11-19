<?php

namespace App\Filament\Resources\DevelopmentGoalsEducationContentResource\Pages;

use App\Filament\Resources\DevelopmentGoalsEducationContentResource;
use Filament\Resources\Pages\ListRecords;

class ListDevelopmentGoalsEducationContents extends ListRecords
{
    protected static string $resource = DevelopmentGoalsEducationContentResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}