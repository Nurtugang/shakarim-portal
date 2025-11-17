<?php

namespace App\Filament\Resources\Science\SciencePurchasesOfferResource\Pages;

use App\Filament\Resources\Science\SciencePurchasesOfferResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSciencePurchasesOffers extends ListRecords
{
    protected static string $resource = SciencePurchasesOfferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
