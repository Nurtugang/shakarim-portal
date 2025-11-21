<?php

namespace App\Filament\Resources\EducationalProgramGroupResource\Pages;

use App\Filament\Resources\EducationalProgramGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducationalProgramGroup extends EditRecord
{
    protected static string $resource = EducationalProgramGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
