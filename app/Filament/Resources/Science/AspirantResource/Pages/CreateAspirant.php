<?php

namespace App\Filament\Resources\Science\AspirantResource\Pages;

use App\Filament\Resources\Science\AspirantResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAspirant extends CreateRecord
{
    protected static string $resource = AspirantResource::class;

    /**
     * Изменяем данные формы перед созданием записи.
     *
     * @param array $data
     * @return array
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Устанавливаем created_at как timestamp
        $data['created_at'] = time();

        return $data;
    }
}

