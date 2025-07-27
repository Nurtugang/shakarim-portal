<?php

namespace App\Filament\TiptapBlock;

use Filament\Forms\Components\Fieldset;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use FilamentTiptapEditor\TiptapEditor;

class ListBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.list';

    public string $rendered = 'blocks.rendered.list';
    public string $width = '3xl';

    public ?string $label = 'Список';

    public function getFormSchema(): array
    {
        return [
            TextInput::make('title')
                ->label('Заголовок')
                ->required(),
            TextInput::make('subtitle')
                ->label('Подзаголовок'),
            Repeater::make('list')
                ->label('Список')
                ->schema([
                    Group::make([
                        TextInput::make('title')
                        ->label('Заголовок')
                        ->required()
                        ->columnSpan(8),
                    TextInput::make('icon')
                        ->label('Иконка(font-awesome)')
                        ->required()
                        ->placeholder('fa-tasks')
                        ->maxLength(20)
                        ->columnSpan(4),
                    ])->columns(12),
                    
                    TextInput::make('link')
                        ->label('Сслыка'),
                ])
                ->reorderable()
                ->collapsed(),
        ];
    }
}
