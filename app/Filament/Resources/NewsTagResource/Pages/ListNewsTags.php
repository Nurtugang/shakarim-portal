<?php

namespace App\Filament\Resources\NewsTagResource\Pages;

use App\Filament\Resources\NewsTagResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewsTags extends ListRecords
{
    protected static string $resource = NewsTagResource::class;
}
