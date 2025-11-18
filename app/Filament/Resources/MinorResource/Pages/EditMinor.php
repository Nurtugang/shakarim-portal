<?php

namespace App\Filament\Resources\MinorResource\Pages;

use App\Filament\Resources\MinorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMinor extends EditRecord
{
    protected static string $resource = MinorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
