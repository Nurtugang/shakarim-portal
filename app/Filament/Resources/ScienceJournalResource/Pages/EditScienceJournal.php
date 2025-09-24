<?php

namespace App\Filament\Resources\ScienceJournalResource\Pages;

use App\Filament\Resources\ScienceJournalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScienceJournal extends EditRecord
{
    protected static string $resource = ScienceJournalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}