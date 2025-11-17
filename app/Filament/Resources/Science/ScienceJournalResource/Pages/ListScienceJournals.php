<?php

namespace App\Filament\Resources\Science\ScienceJournalResource\Pages;

use App\Filament\Resources\Science\ScienceJournalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListScienceJournals extends ListRecords
{
    protected static string $resource = ScienceJournalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}