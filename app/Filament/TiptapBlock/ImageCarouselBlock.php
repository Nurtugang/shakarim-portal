<?php

namespace App\Filament\TiptapBlock;

use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;

class ImageCarouselBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.image-carousel';
    public string $rendered = 'blocks.rendered.image-carousel';
    public ?string $label = 'Карусель изображений';
    public string $width = '2xl';

    public function getFormSchema(): array
    {
        return [
            Repeater::make('images')
                ->label('Изображения')
                ->schema([
                    FileUpload::make('image')
                        ->label('Изображение')
                        ->image()
                        ->optimize('webp')
                        ->directory('carousel')
                        ->required(),
                    TextInput::make('caption')
                        ->label('Подпись')
                        ->maxLength(255),
                ])
                ->minItems(1)
                ->defaultItems(1)
                ->collapsible()
        ];
    }
}
