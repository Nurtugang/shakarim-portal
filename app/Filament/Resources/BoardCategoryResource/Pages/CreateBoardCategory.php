<?php

namespace App\Filament\Resources\BoardCategoryResource\Pages;

use App\Filament\Resources\BoardCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBoardCategory extends CreateRecord
{
    protected static string $resource = BoardCategoryResource::class;
}
