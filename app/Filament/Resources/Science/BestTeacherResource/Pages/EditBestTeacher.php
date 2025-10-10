<?php

namespace App\Filament\Resources\Science\BestTeacherResource\Pages;

use App\Filament\Resources\Science\BestTeacherResource;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBestTeacher extends EditRecord
{
    protected static string $resource = BestTeacherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    
    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (!empty($data['image']) && !str_starts_with($data['image'], 'best-teachers/')) {
            $data['image'] = 'best-teachers/' . $data['image'];
        }

        return $data;
    }
}
