<?php

namespace App\Filament\TiptapBlock;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\Fieldset;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use FilamentTiptapEditor\TiptapEditor;

class InfoBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.info';

    public string $rendered = 'blocks.rendered.info';
    public string $width = '2xl';

    public function getFormSchema(): array
    {
        return [
            TextInput::make('title')
                ->required(),
            TiptapEditor::make('text')
                ->required(),
            FileUpload::make('banner')
                ->label('Баннер')
                ->image()
                ->optimize('webp')
                ->directory('images'),
            Repeater::make('list')
                ->schema([
                    TextInput::make('text')
                        ->required(),
                    FileUpload::make('icon')
                        ->label('Иконка')
                        ->image()
                        ->optimize('webp')
                        ->directory('images'),
                ])  
        ];
    }
}
