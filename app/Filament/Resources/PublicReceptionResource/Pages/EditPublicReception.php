<?php

namespace App\Filament\Resources\PublicReceptionResource\Pages;

use App\Filament\Resources\PublicReceptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPublicReception extends EditRecord
{
    protected static string $resource = PublicReceptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
