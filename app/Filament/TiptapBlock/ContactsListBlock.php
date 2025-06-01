<?php
namespace App\Filament\TiptapBlock;

use Filament\Forms\Components\Fieldset;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use FilamentTiptapEditor\TiptapEditor;

class ContactsListBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.contacts-list';

    public string $rendered = 'blocks.rendered.contacts-list';
    public string $width = '2xl';

    public ?string $label = 'Список контактов';

    public function getFormSchema(): array
    {
        return [
            Repeater::make('list')
                ->label('Список')
                ->schema([
                TextInput::make('title')
                    ->label('Заголовок')
                    ->required(),
                TextInput::make('value')
                    ->label('Значение')
                    ->required(),
                FileUpload::make('icon')
                    ->label('Иконка')
                    ->image()
                    ->optimize('webp')
                    ->directory('contacts'),
            ])
            
        ];
    }
    
}