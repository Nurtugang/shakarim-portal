<?php

namespace App\Filament\Resources\PublicReceptionResource\Pages;

use App\Filament\Resources\PublicReceptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPublicReceptions extends ListRecords
{
    protected static string $resource = PublicReceptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
