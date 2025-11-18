<?php

namespace App\Filament\Resources\MinorResource\Pages;

use App\Filament\Resources\MinorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMinor extends CreateRecord
{
    protected static string $resource = MinorResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
