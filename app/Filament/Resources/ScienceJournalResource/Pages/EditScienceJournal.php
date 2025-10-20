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

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $directory = 'science-journals';
        $field = 'filename';

        if (!empty($data[$field]) && !str_starts_with($data[$field], $directory . '/')) {
            $data[$field] = $directory . '/' . $data[$field];
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $directory = 'science-journals';
        $field = 'filename';

        if (!empty($data[$field]) && str_starts_with($data[$field], $directory . '/')) {
            $data[$field] = substr($data[$field], strlen($directory) + 1);
        }
        
        return $data;
    }
}