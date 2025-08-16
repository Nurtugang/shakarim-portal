<?php
// app/Filament/Resources/RectorPostResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\RectorPostResource\Pages;
use App\Models\RectorPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;

class RectorPostResource extends Resource
{
    protected static ?string $model = RectorPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationLabel = 'Посты ректора';
    
    protected static ?string $modelLabel = 'Пост ректора';
    
    protected static ?string $pluralModelLabel = 'Посты ректора';

    protected static ?string $navigationGroup = 'Блог ректора';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Основная информация')
                    ->schema([
                        Forms\Components\TextInput::make('title_kk')
                            ->label('Заголовок (КАЗ)')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title_ru')
                            ->label('Заголовок (РУС)')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title_en')
                            ->label('Заголовок (ENG)')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('image')
                            ->label('Изображение')
                            ->image()
                            ->directory('rector-posts')
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('active')
                            ->label('Активен')
                            ->default(true),
                    ])->columns(2),

                Forms\Components\Section::make('Контент')
                    ->schema([
                        TiptapEditor::make('content_kk')
                            ->label('Контент (КАЗ)')
                            ->required(),
                        TiptapEditor::make('content_ru')
                            ->label('Контент (РУС)')
                            ->required(),
                        TiptapEditor::make('content_en')
                            ->label('Контент (ENG)')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Изображение')
                    ->circular(),
                Tables\Columns\TextColumn::make('title_ru')
                    ->label('Заголовок')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->label('Активен')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создан')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('active')
                    ->label('Активность'),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRectorPosts::route('/'),
            'create' => Pages\CreateRectorPost::route('/create'),
            // 'view' => Pages\ViewRectorPost::route('/{record}'),
            'edit' => Pages\EditRectorPost::route('/{record}/edit'),
        ];
    }
}