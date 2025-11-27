<?php

namespace App\Filament\Resources\CampusLife\StudentParlamentResource\Pages;

use App\Filament\Resources\CampusLife\StudentParlamentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudentParlaments extends ListRecords
{
    protected static string $resource = StudentParlamentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
