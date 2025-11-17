<?php

namespace App\Filament\Resources\Student\StudentParlamentResource\Pages;

use App\Filament\Resources\Student\StudentParlamentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentParlament extends EditRecord
{
    protected static string $resource = StudentParlamentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
