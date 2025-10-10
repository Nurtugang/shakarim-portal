<?php

namespace App\Filament\Resources\NewsTagResource\Pages;

use App\Filament\Resources\NewsTagResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsTag extends CreateRecord
{
    protected static string $resource = NewsTagResource::class;
}
