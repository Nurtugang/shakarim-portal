<?php

namespace App\Filament\Resources\Nirs;

use App\Filament\Resources\Nirs\NirsMainContentResource\Pages;
use App\Models\Nirs\NirsMainContent;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;

class NirsMainContentResource extends Resource
{
    protected static ?string $model = NirsMainContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'НИРС';
    
    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return 'Основная информация';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Основная информация';
    }
    
    public static function getModelLabel(): string
    {
        return 'Основная информация';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Содержимое страницы "Основные направления деятельности"')
                    ->description('Здесь редактируется текст для первой вкладки страницы НИРС.')
                    ->schema([
                        Tabs::make('Content')
                            ->tabs([
                                Tabs\Tab::make('Русский')
                                    ->schema([
                                        TiptapEditor::make('content_ru')
                                            ->label('')
                                            ->profile('default')
                                            ->required(),
                                    ]),
                                Tabs\Tab::make('Казахский')
                                    ->schema([
                                        TiptapEditor::make('content_kz')
                                            ->label('')
                                            ->profile('default'),
                                    ]),
                                Tabs\Tab::make('Английский')
                                    ->schema([
                                        TiptapEditor::make('content_en')
                                            ->label('')
                                            ->profile('default'),
                                    ]),
                                Tabs\Tab::make('Китайский')
                                    ->schema([
                                        TiptapEditor::make('content_cn')
                                            ->label('')
                                            ->profile('default'),
                                    ]),
                            ])->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNirsMainContents::route('/'),
            'edit' => Pages\EditNirsMainContent::route('/{record}/edit'),
        ];
    }
    
    public static function canCreate(): bool
    {
        return false;
    }
}

// В файле Pages/EditNirsMainContent.php нужно убедиться, что запись всегда ID=1
// Но Filament по умолчанию должен это сделать сам, если мы перейдем по адресу /nirs/nirs-main-contents/1/edit
// Для простоты можно создать кастомную страницу, но этот вариант тоже должен работать.
// Чтобы сделать его пуленепробиваемым, можно переопределить метод resolveRecord:
// public function resolveRecord(int | string $key): \Illuminate\Database\Eloquent\Model
// {
//    return static::getResource()::getModel()::findOrFail(1);
// }