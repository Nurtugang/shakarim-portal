<?php

namespace App\Filament\Resources\Nirs;

use App\Filament\Resources\Nirs\NirsItemResource\Pages;
use App\Models\Nirs\NirsItem;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;

class NirsItemResource extends Resource
{
    protected static ?string $model = NirsItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    
    protected static ?string $navigationGroup = 'НИРС';

    protected static ?int $navigationSort = 3;

    public static function getNavigationLabel(): string
    {
        return 'Записи НИРС (по годам)';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Записи НИРС';
    }

    public static function getModelLabel(): string
    {
        return 'запись НИРС';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Год и Название')
                    ->schema([
                        TextInput::make('year')->label('Год')->required()->numeric()->minValue(2000)->maxValue(date('Y') + 5),
                        Tabs::make('Title')
                            ->tabs([
                                Tabs\Tab::make('Русский')->schema([
                                    TextInput::make('title_ru')->label('Название (RU)')->required(),
                                ]),
                                Tabs\Tab::make('Казахский (KK)')->schema([
                                    TextInput::make('title_kk')->label('Название (KK)'),
                                ]),
                                Tabs\Tab::make('Английский')->schema([
                                    TextInput::make('title_en')->label('Название (EN)'),
                                ]),
                                Tabs\Tab::make('Китайский')->schema([
                                    TextInput::make('title_cn')->label('Название (CN)'),
                                ]),
                            ])->columnSpanFull(),
                    ]),
                
                Section::make('PDF Файлы для каждого языка')
                    ->schema([
                        Tabs::make('Files')
                            ->tabs([
                                Tabs\Tab::make('Казахский (KK)')->schema([
                                    FileUpload::make('file_path_kk')
                                        ->label('PDF Документ (KK)')
                                        ->directory('nirs/items')
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->afterStateUpdated(fn ($state, callable $set) => $state ? $set('original_name_kk', $state->getClientOriginalName()) : null),
                                ]),
                                Tabs\Tab::make('Русский (RU)')->schema([
                                    FileUpload::make('file_path_ru')
                                        ->label('PDF Документ (RU)')
                                        ->directory('nirs/items')
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->afterStateUpdated(fn ($state, callable $set) => $state ? $set('original_name_ru', $state->getClientOriginalName()) : null),
                                ]),
                                Tabs\Tab::make('Английский (EN)')->schema([
                                    FileUpload::make('file_path_en')
                                        ->label('PDF Документ (EN)')
                                        ->directory('nirs/items')
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->afterStateUpdated(fn ($state, callable $set) => $state ? $set('original_name_en', $state->getClientOriginalName()) : null),
                                ]),
                                Tabs\Tab::make('Китайский (CN)')->schema([
                                    FileUpload::make('file_path_cn')
                                        ->label('PDF Документ (CN)')
                                        ->directory('nirs/items')
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->afterStateUpdated(fn ($state, callable $set) => $state ? $set('original_name_cn', $state->getClientOriginalName()) : null),
                                ]),
                            ])->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('year')
                    ->label('Год')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('title_ru')
                    ->label('Название')
                    ->searchable()
                    ->limit(70),
                
                TextColumn::make('file_url')
                    ->label('Файл')
                    ->formatStateUsing(fn (NirsItem $record) => $record->file_url ? 'Скачать' : 'Нет файла')
                    ->url(fn (NirsItem $record): ?string => $record->file_url, true),

                TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('year', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNirsItems::route('/'),
            'create' => Pages\CreateNirsItem::route('/create'),
            'edit' => Pages\EditNirsItem::route('/{record}/edit'),
        ];
    }
}