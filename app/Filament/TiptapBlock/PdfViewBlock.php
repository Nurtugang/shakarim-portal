<?php
namespace App\Filament\TiptapBlock;

use Filament\Forms\Components\Fieldset;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use FilamentTiptapEditor\TiptapEditor;

class PdfViewBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.pdfview';

    public string $rendered = 'blocks.rendered.pdfview';
    public ?string $label = 'Pdfview';
    public string $width = '2xl';

    public function getFormSchema(): array
    {
        return [
            FileUpload::make('file')
                    ->label('Файл')
                    ->directory('pdfs')
                    ->required()
        ];
    }
    
}