<?php
namespace App\Filament\TiptapBlock;

use Filament\Forms\Components\Fieldset;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use FilamentTiptapEditor\TiptapEditor;

class CardBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.card';

    public string $rendered = 'blocks.rendered.card';
    public ?string $label = 'Hero card';
    public string $width = '2xl';

    public function getFormSchema(): array
    {
        return [
            TextInput::make('title')
                    ->label('Заголовок')
                    ->required(),
            TiptapEditor::make('text')
                    ->label('Текст')
                    ->columnSpanFull(),
            Fieldset::make('Кнопка 1')
    ->schema([
        TextInput::make('first_button_label')
            ->label('Label '),
        TextInput::make('first_button_link')
            ->label('Ссылка'),
        TextInput::make('first_button_icon')
            ->label('Иконка'),
        Radio::make('first_button_class')
            ->options([
        'btn-primary' => 'Primary',
        'btn-secondary' => 'Secondary',
    ])->label('Стиль')

    ])
    ->columns(2),    
        ];
    }
    
}