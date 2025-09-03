<?php

namespace App\Filament\Resources\SciencePurchasesOfferResource\Pages;

use App\Filament\Resources\SciencePurchasesOfferResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSciencePurchasesOffer extends EditRecord
{
    protected static string $resource = SciencePurchasesOfferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
