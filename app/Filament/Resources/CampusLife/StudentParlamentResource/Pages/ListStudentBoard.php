<?php

namespace App\Filament\Resources\CampusLife\StudentBoardResource\Pages;

use App\Filament\Resources\CampusLife\StudentBoardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudentBoard extends ListRecords
{
    protected static string $resource = StudentBoardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
