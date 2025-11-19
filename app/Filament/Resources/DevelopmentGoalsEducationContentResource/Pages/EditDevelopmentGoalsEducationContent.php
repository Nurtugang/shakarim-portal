<?php

namespace App\Filament\Resources\DevelopmentGoalsEducationContentResource\Pages;

use App\Filament\Resources\DevelopmentGoalsEducationContentResource;
use App\Models\DevelopmentGoalsEducationContent;
use Filament\Resources\Pages\EditRecord;

class EditDevelopmentGoalsEducationContent extends EditRecord
{
    protected static string $resource = DevelopmentGoalsEducationContentResource::class;

    public function mount(int | string $record = null): void
    {
        $this->record = DevelopmentGoalsEducationContent::firstOrFail();
        
        $this->authorizeAccess();

        $this->fillForm();

        $this->previousUrl = url()->previous();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}