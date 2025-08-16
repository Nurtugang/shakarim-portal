<?php

namespace App\Filament\Resources\RectorQuestionResource\Pages;

use App\Filament\Resources\RectorQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRectorQuestion extends EditRecord
{
    protected static string $resource = RectorQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
