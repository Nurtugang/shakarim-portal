<?php

namespace App\Filament\Resources\Nirs;

use App\Filament\Resources\Nirs\NirsConferenceResource\Pages;
use App\Models\Nirs\NirsConference;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

use Illuminate\Support\Facades\Auth;
use App\Enums\RolesEnum;

class NirsConferenceResource extends Resource
{
    protected static ?string $model = NirsConference::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';
    
    protected static ?string $navigationGroup = 'НИРС';

    protected static ?int $navigationSort = 2;

    public static function getNavigationLabel(): string
    {
        return 'Научные конференции (PDF)';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Научные конференции';
    }

    public static function getModelLabel(): string
    {
        return 'документ конференции';
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::SCIENCE]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Название документа')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title_ru')->label('Название (RU)')->required(),
                        TextInput::make('title_kk')->label('Название (KK)'),
                        TextInput::make('title_en')->label('Название (EN)'),
                        TextInput::make('title_cn')->label('Название (CN)'),
                    ]),
                Section::make('PDF Файлы для каждого языка')
                    ->schema([
                        Tabs::make('Files')
                            ->tabs([
                                Tabs\Tab::make('Казахский (KK)')->schema([
                                    FileUpload::make('file_path_kk')
                                        ->label('PDF Документ (KK)')
                                        ->directory('nirs/conferences')
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->afterStateUpdated(fn ($state, callable $set) => $state ? $set('original_name_kk', $state->getClientOriginalName()) : null),
                                ]),
                                Tabs\Tab::make('Русский (RU)')->schema([
                                    FileUpload::make('file_path_ru')
                                        ->label('PDF Документ (RU)')
                                        ->directory('nirs/conferences')
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->afterStateUpdated(fn ($state, callable $set) => $state ? $set('original_name_ru', $state->getClientOriginalName()) : null),
                                ]),
                                Tabs\Tab::make('Английский (EN)')->schema([
                                    FileUpload::make('file_path_en')
                                        ->label('PDF Документ (EN)')
                                        ->directory('nirs/conferences')
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->afterStateUpdated(fn ($state, callable $set) => $state ? $set('original_name_en', $state->getClientOriginalName()) : null),
                                ]),
                                Tabs\Tab::make('Китайский (CN)')->schema([
                                    FileUpload::make('file_path_cn')
                                        ->label('PDF Документ (CN)')
                                        ->directory('nirs/conferences')
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
                TextColumn::make('title_ru')
                    ->label('Название')
                    ->searchable()
                    ->limit(50),
                
                TextColumn::make('file_url')
                    ->label('Файл')
                    ->formatStateUsing(fn (NirsConference $record) => $record->file_url ? 'Скачать' : 'Нет файла')
                    ->url(fn (NirsConference $record): ?string => $record->file_url, true),

                TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('id', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNirsConferences::route('/'),
            'create' => Pages\CreateNirsConference::route('/create'),
            'edit' => Pages\EditNirsConference::route('/{record}/edit'),
        ];
    }
}