<?php

namespace App\Filament\Resources\DevelopmentGoalResource\Pages;

use App\Filament\Resources\DevelopmentGoalResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDevelopmentGoal extends CreateRecord
{
    protected static string $resource = DevelopmentGoalResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}