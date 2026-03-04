<?php

namespace App\Filament\Resources\Science\AspirantResource\RelationManagers;

use App\Models\Science\AspirantDoc;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class DocumentsRelationManager extends RelationManager
{
    protected static string $relationship = 'documents';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $title = 'Документы';

    protected static ?string $modelLabel = 'документ';

    protected static ?string $pluralLabel = 'документы';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('kk')
                            ->label('Казахский')
                            ->schema([
                                TextInput::make('name_kk')
                                    ->label('Название документа (KK)')
                                    ->maxLength(255),
                            ]),
                        Tabs\Tab::make('ru')
                            ->label('Русский')
                            ->schema([
                                TextInput::make('name_ru')
                                    ->label('Название документа (RU)')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                        Tabs\Tab::make('en')
                            ->label('Английский')
                            ->schema([
                                TextInput::make('name_en')
                                    ->label('Название документа (EN)')
                                    ->maxLength(255),
                            ]),
                        Tabs\Tab::make('cn')
                            ->label('Китайский')
                            ->schema([
                                TextInput::make('name_cn')
                                    ->label('Название документа (CN)')
                                    ->maxLength(255),
                            ]),
                    ])
                    ->columnSpanFull(),

                Section::make('Файл')
                    ->schema([
                        FileUpload::make('filename')
                            ->label('Файл документа')
                            ->disk('public')
                            ->directory('aspirant-docs')
                            ->acceptedFileTypes([
                                'application/pdf',
                                'application/msword',
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            ])
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
                            ->saveUploadedFileUsing(function ($file, $state, $set) {
                                $fileName = (string) str($file->getClientOriginalName())
                                    ->prepend(now()->timestamp . '_');
                                $file->storeAs('aspirant-docs', $fileName, 'public');
                                return $fileName;
                            })
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Название')
                    ->searchable(['name_kk', 'name_ru', 'name_en', 'name_cn'])
                    ->limit(50)
                    ->tooltip(fn (AspirantDoc $record): string => $record->name),

                IconColumn::make('is_pdf')
                    ->label('PDF')
                    ->boolean()
                    ->trueIcon('heroicon-o-document-text')
                    ->falseIcon('heroicon-o-document')
                    ->getStateUsing(fn (AspirantDoc $record): bool => $record->is_pdf),

                IconColumn::make('is_doc')
                    ->label('DOC')
                    ->boolean()
                    ->trueIcon('heroicon-o-document-text')
                    ->falseIcon('heroicon-o-document')
                    ->getStateUsing(fn (AspirantDoc $record): bool => $record->is_doc),

                TextColumn::make('filename')
                    ->label('Файл')
                    ->formatStateUsing(fn (string $state): string => basename($state))
                    ->limit(30)
                    ->tooltip(fn (string $state): string => basename($state))
                    ->searchable(),

                TextColumn::make('formatted_date')
                    ->label('Дата добавления')
                    ->sortable(query: function ($query, string $direction) {
                        return $query->orderBy('created_at', $direction);
                    }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        // Устанавливаем created_at как timestamp при создании
                        $data['created_at'] = time();
                        // Сохраняем только имя файла, без пути
                        if (isset($data['filename']) && is_string($data['filename'])) {
                            $data['filename'] = basename($data['filename']);
                        }
                        return $data;
                    }),
            ])
            ->actions([
                Tables\Actions\Action::make('download')
                    ->label('Скачать')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (AspirantDoc $record): string => $record->file_url)
                    ->openUrlInNewTab(),
                    
                Tables\Actions\EditAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        // Сохраняем только имя файла, без пути
                        if (isset($data['filename']) && is_string($data['filename'])) {
                            $data['filename'] = basename($data['filename']);
                        }
                        return $data;
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}

