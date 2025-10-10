<?php

namespace App\Filament\Resources\SciencePurchasesIrnResource\Pages;

use App\Filament\Resources\SciencePurchasesIrnResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSciencePurchasesIrns extends ManageRecords
{
    protected static string $resource = SciencePurchasesIrnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
