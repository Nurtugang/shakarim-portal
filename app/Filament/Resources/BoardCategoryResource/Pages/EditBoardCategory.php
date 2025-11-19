<?php

namespace App\Filament\Resources\BoardCategoryResource\Pages;

use App\Filament\Resources\BoardCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBoardCategory extends EditRecord
{
    protected static string $resource = BoardCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
