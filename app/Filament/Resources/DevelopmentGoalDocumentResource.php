<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DevelopmentGoalDocumentResource\Pages;
use App\Models\DevelopmentGoalDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class DevelopmentGoalDocumentResource extends Resource
{
    protected static ?string $model = DevelopmentGoalDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Документы ЦУР';

    protected static ?string $modelLabel = 'Документ';

    protected static ?string $pluralModelLabel = 'Документы ЦУР';

    protected static ?string $navigationGroup = 'Справочники';

    protected static ?int $navigationSort = 2;

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::DEVELOPMENT]);
    }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Основная информация')
                    ->schema([
                        Forms\Components\Select::make('language')
                            ->label('Язык')
                            ->options([
                                'kk' => 'Казахский',
                                'ru' => 'Русский',
                                'en' => 'Английский',
                            ])
                            ->required()
                            ->native(false)
                            ->default('ru'),

                        Forms\Components\TextInput::make('title')
                            ->label('Название')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\Select::make('type')
                            ->label('Тип документа')
                            ->options([
                                DevelopmentGoalDocument::TYPE_DOCUMENT => 'Документ',
                                DevelopmentGoalDocument::TYPE_REPORT => 'Отчет',
                            ])
                            ->required()
                            ->native(false)
                            ->default(DevelopmentGoalDocument::TYPE_DOCUMENT),

                        Forms\Components\FileUpload::make('path')
                            ->label('Файл документа')
                            ->disk('public')
                            ->directory('dev_documents')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                            ->maxSize(10240) // 10MB
                            ->required()
                            ->downloadable()
                            ->openable()
                            ->previewable(false)
                            ->helperText('Загрузите PDF, DOC или DOCX файл (максимум 10 МБ)')
                            ->getUploadedFileNameForStorageUsing(
                                fn ($file): string => (string) str($file->getClientOriginalName())
                                    ->prepend(now()->timestamp . '_')
                            )
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->limit(50),

                Tables\Columns\BadgeColumn::make('language')
                    ->label('Язык')
                    ->colors([
                        'primary' => 'kk',
                        'success' => 'ru',
                        'warning' => 'en',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'kk' => 'KK',
                        'ru' => 'RU',
                        'en' => 'EN',
                        default => strtoupper($state),
                    })
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('type')
                    ->label('Тип')
                    ->colors([
                        'success' => DevelopmentGoalDocument::TYPE_DOCUMENT,
                        'info' => DevelopmentGoalDocument::TYPE_REPORT,
                    ])
                    ->formatStateUsing(fn (int $state): string => match ($state) {
                        DevelopmentGoalDocument::TYPE_DOCUMENT => 'Документ',
                        DevelopmentGoalDocument::TYPE_REPORT => 'Отчет',
                        default => 'Неизвестно',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('path')
                    ->label('Файл')
                    ->formatStateUsing(fn (string $state): string => basename($state))
                    ->limit(30)
                    ->tooltip(fn (string $state): string => basename($state))
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('language')
                    ->label('Язык')
                    ->options([
                        'kk' => 'Казахский',
                        'ru' => 'Русский',
                        'en' => 'Английский',
                    ])
                    ->native(false),

                Tables\Filters\SelectFilter::make('type')
                    ->label('Тип документа')
                    ->options([
                        DevelopmentGoalDocument::TYPE_DOCUMENT => 'Документ',
                        DevelopmentGoalDocument::TYPE_REPORT => 'Отчет',
                    ])
                    ->native(false),
            ])
            ->actions([
                Tables\Actions\Action::make('download')
                    ->label('Скачать')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (DevelopmentGoalDocument $record): string => $record->getFileUrl())
                    ->openUrlInNewTab(),
                    
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListDevelopmentGoalDocuments::route('/'),
            'create' => Pages\CreateDevelopmentGoalDocument::route('/create'),
            'edit' => Pages\EditDevelopmentGoalDocument::route('/{record}/edit'),
        ];
    }
}