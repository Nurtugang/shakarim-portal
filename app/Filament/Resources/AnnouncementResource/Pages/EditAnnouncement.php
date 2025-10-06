<?php

namespace App\Filament\Resources\AnnouncementResource\Pages;

use App\Filament\Resources\AnnouncementResource;
use Filament\Resources\Pages\EditRecord;

class EditAnnouncement extends EditRecord
{
    protected static string $resource = AnnouncementResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $directory = 'announcement';

        if (!empty($data['image']) && !str_starts_with($data['image'], $directory . '/')) {
            $data['image'] = $directory . '/' . $data['image'];
        }

        return $data;
    }
}