<?php

namespace App\Filament\Resources\DevelopmentGoalResource\Pages;

use App\Filament\Resources\DevelopmentGoalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDevelopmentGoals extends ListRecords
{
    protected static string $resource = DevelopmentGoalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Создать цель развития'),
        ];
    }
}