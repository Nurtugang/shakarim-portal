<?php

namespace App\Filament\TiptapBlock;

use FilamentTiptapEditor\TiptapBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use FilamentTiptapEditor\TiptapEditor;

class FullSliderBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.full-slider';

    public string $rendered = 'blocks.rendered.full-slider';
    public string $width = '2xl';

    public ?string $label = 'Слайдер';


    public function getFormSchema(): array
    {
        return [
            Repeater::make('slides')
                ->label('Галерея')
                ->schema([
                    TiptapEditor::make('text')
                        ->label('Текст')
                        ->columnSpan('full'),
                    FileUpload::make('banner')
                        ->label('Изображение')
                        ->image()
                        ->optimize('webp')
                        ->directory('gallery'),
                ])

        ];
    }
}
