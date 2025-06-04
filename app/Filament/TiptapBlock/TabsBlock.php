<?php
namespace App\Filament\TiptapBlock;

use Filament\Forms\Components\Fieldset;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use FilamentTiptapEditor\TiptapEditor;

class TabsBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.tabs';

    public string $rendered = 'blocks.rendered.tabs';
    public ?string $label = 'Вкладки';
    public string $width = '2xl';

    public function getFormSchema(): array
    {
        return [
            Repeater::make('tabs')
                ->schema([
                TextInput::make('title')
                    ->label('Заголовок')
                    ->required(),
                TiptapEditor::make('text')
                    ->label('Текст')
                    ->columnSpanFull(),
                ])->columns(2)
                ->columnSpanFull()
        ];
    }
    
}