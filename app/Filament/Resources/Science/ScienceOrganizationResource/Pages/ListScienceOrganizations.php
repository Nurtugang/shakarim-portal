<?php

namespace App\Filament\Resources\Science\ScienceOrganizationResource\Pages;

use App\Filament\Resources\Science\ScienceOrganizationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListScienceOrganizations extends ListRecords
{
    protected static string $resource = ScienceOrganizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
