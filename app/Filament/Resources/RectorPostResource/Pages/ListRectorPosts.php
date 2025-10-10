<?php

namespace App\Filament\Resources\RectorPostResource\Pages;

use App\Filament\Resources\RectorPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRectorPosts extends ListRecords
{
    protected static string $resource = RectorPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
