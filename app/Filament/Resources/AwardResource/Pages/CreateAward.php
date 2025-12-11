<?php

namespace App\Filament\Resources\AwardResource\Pages;

use App\Filament\Resources\AwardResource;
use App\Models\Award;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateAward extends CreateRecord
{
    protected static string $resource = AwardResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function mount(): void
    {
        parent::mount();
        
        $replicateId = request()->query('replicate');
        
        if ($replicateId) {
            $original = Award::find($replicateId);
            
            if ($original) {
                $data = $original->toArray();
                
                // Убираем поля, которые не должны дублироваться
                unset($data['id'], $data['created_at'], $data['updated_at']);
                
                // Заполняем форму данными
                $this->form->fill($data);
            }
        }
    }
}
