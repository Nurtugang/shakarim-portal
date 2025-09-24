<?php

namespace App\Filament\Resources\ScienceDissertationResource\Pages;

use App\Filament\Resources\ScienceDissertationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScienceDissertation extends EditRecord
{
    protected static string $resource = ScienceDissertationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
