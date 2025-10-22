<?php

namespace App\Filament\Resources\Nirs\NirsConferenceResource\Pages;

use App\Filament\Resources\Nirs\NirsConferenceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNirsConference extends EditRecord
{
    protected static string $resource = NirsConferenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
