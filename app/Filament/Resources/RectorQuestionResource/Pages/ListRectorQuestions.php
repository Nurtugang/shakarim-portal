<?php

namespace App\Filament\Resources\RectorQuestionResource\Pages;

use App\Filament\Resources\RectorQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRectorQuestions extends ListRecords
{
    protected static string $resource = RectorQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
