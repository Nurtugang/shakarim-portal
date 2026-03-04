<?php

namespace App\Filament\Resources\DevelopmentWorkingGroupContentResource\Pages;

use App\Filament\Resources\DevelopmentWorkingGroupContentResource;
use App\Models\DevelopmentWorkingGroupContent;
use Filament\Resources\Pages\EditRecord;

class EditDevelopmentWorkingGroupContent extends EditRecord
{
    protected static string $resource = DevelopmentWorkingGroupContentResource::class;

    public function mount(int | string $record = null): void
    {
        $this->record = DevelopmentWorkingGroupContent::firstOrCreate([]);
        
        $this->authorizeAccess();

        $this->fillForm();

        $this->previousUrl = url()->previous();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

