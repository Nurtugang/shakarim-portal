<?php
namespace App\Filament\TiptapBlock;

use Filament\Forms\Components\Fieldset;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;

class GalleryBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.gallery';

    public string $rendered = 'blocks.rendered.gallery';
    public ?string $label = 'Галерея';
    public string $width = '2xl';


    public function getFormSchema(): array
    {
        return [
            TextInput::make('title')
            ->label('Заголовок'),
            Repeater::make('images')
            ->label('Галерея')
                ->schema([
                FileUpload::make('image')
                ->label('Изображение')
                ->image()
                ->optimize('webp')
                ->directory('gallery'),
            ])
            
        ];
    }
    
}