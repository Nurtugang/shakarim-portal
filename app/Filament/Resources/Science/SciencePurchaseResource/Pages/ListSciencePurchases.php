<?php

namespace App\Filament\Resources\Science\SciencePurchaseResource\Pages;

use App\Filament\Resources\Science\SciencePurchaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSciencePurchases extends ListRecords
{
    protected static string $resource = SciencePurchaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
