<?php

namespace App\Filament\Resources\Science\BestTeacherResource\Pages;

use App\Filament\Resources\Science\BestTeacherResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBestTeacher extends CreateRecord
{
    protected static string $resource = BestTeacherResource::class;

    /**
     * Изменяем данные формы перед созданием записи.
     *
     * @param array $data
     * @return array
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (!empty($data['image'])) {
            $data['image'] = basename($data['image']);
        }

        return $data;
    }
}