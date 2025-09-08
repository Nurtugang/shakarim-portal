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

class SliderBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.slider';

    public string $rendered = 'blocks.rendered.slider';
    public ?string $label = 'Слайдер';
    public string $width = '3xl';


    public function getFormSchema(): array
    {
        return [
            Repeater::make('items')
                ->label('Слайдер')
                ->schema([
                    Group::make([
                        TiptapEditor::make('left_content')->columnSpan(9)
                            ->profile('simple')
                            ->label('Контент'),
                        TextInput::make('left_bg_color')
                        ->label('Цвет фона')
                        ->columnSpan(3),
                    ])->columns(12),
                    FileUpload::make('left_image')
                        ->label('Изображение')
                        ->image()
                        ->optimize('webp')
                        ->directory('gallery'),
                    Group::make([
                        TiptapEditor::make('right_content')
                            ->columnSpan(9)
                            ->profile('simple')
                            ->label('Контент'),
                        TextInput::make('right_bg_color')
                            ->label('Цвет фона')
                            ->columnSpan(3),
                    ])->columns(12),
                    FileUpload::make('right_image')
                        ->label('Изображение')
                        ->image()
                        ->optimize('webp')
                        ->directory('gallery'),

                ])
        ];
    }
}
