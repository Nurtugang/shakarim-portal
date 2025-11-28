<?php

namespace App\Filament\Resources\AwardRewardResource\Pages;

use App\Filament\Resources\AwardRewardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAwardReward extends EditRecord
{
    protected static string $resource = AwardRewardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
