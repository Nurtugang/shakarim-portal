<?php
namespace App\Filament\TiptapBlock;

use Filament\Forms\Components\Fieldset;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use FilamentTiptapEditor\TiptapEditor;

class AccordionBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.accordion';

    public string $rendered = 'blocks.rendered.accordion';
    public string $width = '2xl';
    public ?string $label = 'Спойлер';

    public function getFormSchema(): array
    {
        return [
            TextInput::make('title')
            ->label('Заголовок'),
            Repeater::make('list')
                ->label('Список')
                ->schema([
                TextInput::make('title')
                    ->label('Заголовок')
                    ->required(),
                TiptapEditor::make('text')
                    ->label('Текст')
                    ->columnSpanFull(),
            ])
            
        ];
    }
    
}