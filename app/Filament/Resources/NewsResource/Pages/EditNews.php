<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNews extends EditRecord
{
    protected static string $resource = NewsResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $directory = 'news';

        if (!empty($data['image']) && !str_starts_with($data['image'], $directory . '/')) {
            $data['image'] = $directory . '/' . $data['image'];
        }

        return $data;
    }
}
