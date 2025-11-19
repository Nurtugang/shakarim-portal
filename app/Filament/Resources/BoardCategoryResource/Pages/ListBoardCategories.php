<?php

namespace App\Filament\Resources\BoardCategoryResource\Pages;

use App\Filament\Resources\BoardCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBoardCategories extends ListRecords
{
    protected static string $resource = BoardCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
