<?php

namespace App\Filament\Resources\Science\AspirantResource\Pages;

use App\Filament\Resources\Science\AspirantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAspirant extends EditRecord
{
    protected static string $resource = AspirantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

