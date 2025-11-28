<?php

namespace App\Filament\Resources\CampusLife\StudentBoardResource\Pages;

use App\Filament\Resources\CampusLife\StudentBoardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentBoard extends EditRecord
{
    protected static string $resource = StudentBoardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
