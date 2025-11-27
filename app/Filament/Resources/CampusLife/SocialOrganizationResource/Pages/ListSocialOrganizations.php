<?php

namespace App\Filament\Resources\CampusLife\SocialOrganizationResource\Pages;

use App\Filament\Resources\CampusLife\SocialOrganizationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSocialOrganizations extends ListRecords
{
    protected static string $resource = SocialOrganizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
