<?php

namespace App\Filament\Resources\SciencePurchaseResource\Pages;

use App\Filament\Resources\SciencePurchaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSciencePurchase extends EditRecord
{
    protected static string $resource = SciencePurchaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
