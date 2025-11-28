<?php

namespace App\Filament\Resources\DashboardInfoResource\Pages;

use App\Filament\Resources\DashboardInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDashboardInfo extends EditRecord
{
    protected static string $resource = DashboardInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
