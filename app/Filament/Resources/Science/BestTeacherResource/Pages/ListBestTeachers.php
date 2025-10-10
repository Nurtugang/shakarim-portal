<?php

namespace App\Filament\Resources\Science\BestTeacherResource\Pages;

use App\Filament\Resources\Science\BestTeacherResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBestTeachers extends ListRecords
{
    protected static string $resource = BestTeacherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
