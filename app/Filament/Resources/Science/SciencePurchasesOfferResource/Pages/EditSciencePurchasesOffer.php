<?php

namespace App\Filament\Resources\Science\SciencePurchasesOfferResource\Pages;

use App\Filament\Resources\Science\SciencePurchasesOfferResource;
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
