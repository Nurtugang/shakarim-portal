<?php

namespace App\Filament\Resources;

use App\Enums\RolesEnum;
use App\Filament\Resources\ScienceJournalResource\Pages;
use App\Models\Science\ScienceJournal;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile; // Импортируем класс

class ScienceJournalResource extends Resource
{
    protected static ?string $model = ScienceJournal::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?int $navigationSort = 5;

    public static function getNavigationLabel(): string
    {
        return 'Научные журналы';
    }

    public static function getPluralLabel(): ?string
    {
        return 'Научные журналы';
    }

    public static function getModelLabel(): string
    {
        return 'научный журнал';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Наука';
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::SCIENCE]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Названия журнала')
                    ->schema([
                        Tabs::make('Languages')
                            ->tabs([
                                Tabs\Tab::make('Русский')
                                    ->schema([
                                        TextInput::make('name_ru')
                                            ->label('Название (RU)')
                                            ->required(),
                                    ]),
                                Tabs\Tab::make('Казахский')
                                    ->schema([
                                        TextInput::make('name_kk')
                                            ->label('Название (KZ)')
                                            ->required(),
                                    ]),
                                Tabs\Tab::make('Английский')
                                    ->schema([
                                        TextInput::make('name_en')
                                            ->label('Название (EN)'),
                                    ]),
                            ])->columnSpanFull(),
                    ]),

                Section::make('Информация о выпуске')
                    ->columns(2)
                    ->schema([
                        TextInput::make('number')
                            ->label('Номер выпуска')
                            ->required()
                            ->maxLength(20),
                        TextInput::make('year')
                            ->label('Год')
                            ->required()
                            ->numeric()
                            ->minValue(1900)
                            ->maxValue(date('Y') + 5),
                        FileUpload::make('filename')
                            ->label('Файл журнала (.pdf)')
                            ->directory('science-journals')
                            ->acceptedFileTypes(['application/pdf'])
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file): string => 'document_' . time() . '.' . $file->getClientOriginalExtension()
                            )
                            ->nullable()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name_ru')
                    ->label('Название')
                    ->searchable()
                    ->limit(50)
                    ->sortable(),
                TextColumn::make('year')
                    ->label('Год')
                    ->sortable(),
                TextColumn::make('number')
                    ->label('Номер выпуска')
                    ->searchable(),
            TextColumn::make('filename')
                ->label('Файл')
                ->formatStateUsing(fn () => 'Скачать файл') 
                ->url(function (ScienceJournal $record): ?string {
                    if ($record->filename) {
                        return Storage::url($record->filename);
                    }
                    return null;
                }, true)
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListScienceJournals::route('/'),
            'create' => Pages\CreateScienceJournal::route('/create'),
            'edit' => Pages\EditScienceJournal::route('/{record}/edit'),
        ];
    }
}