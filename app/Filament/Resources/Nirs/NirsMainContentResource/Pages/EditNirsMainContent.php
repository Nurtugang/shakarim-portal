<?php

namespace App\Filament\Resources\Nirs\NirsMainContentResource\Pages;

use App\Filament\Resources\Nirs\NirsMainContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNirsMainContent extends EditRecord
{
    protected static string $resource = NirsMainContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
