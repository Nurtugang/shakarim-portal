<?php

namespace App\Filament\Resources\Science\ScientificProjectResource\Pages;

use App\Filament\Resources\Science\ScientificProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScientificProject extends EditRecord
{
    protected static string $resource = ScientificProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
