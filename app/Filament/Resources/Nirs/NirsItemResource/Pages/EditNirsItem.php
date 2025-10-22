<?php

namespace App\Filament\Resources\Nirs\NirsItemResource\Pages;

use App\Filament\Resources\Nirs\NirsItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNirsItem extends EditRecord
{
    protected static string $resource = NirsItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
