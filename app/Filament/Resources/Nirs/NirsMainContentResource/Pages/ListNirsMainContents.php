<?php

namespace App\Filament\Resources\Nirs\NirsMainContentResource\Pages;

use App\Filament\Resources\Nirs\NirsMainContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNirsMainContents extends ListRecords
{
    protected static string $resource = NirsMainContentResource::class;

    public function mount(): void
    {
        redirect($this->getResource()::getUrl('edit', ['record' => 1]));
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
