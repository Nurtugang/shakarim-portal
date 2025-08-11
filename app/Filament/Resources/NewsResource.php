<?php

namespace App\Filament\Resources;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsTag;
use App\Filament\Resources\NewsResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Новости';

    protected static ?string $navigationGroup = 'Новости';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('alias')
                    ->label('Алиас')
                    ->maxLength(255),
                Forms\Components\Select::make('category_id')
                    ->label('Категория')
                    ->relationship('category', 'label_ru')
                    ->searchable(),
                Forms\Components\Select::make('tags')
                    ->label('Теги')
                    ->multiple()
                    ->relationship('tags', 'name')
                    ->searchable(),
                Forms\Components\TextInput::make('title_kz')
                    ->label('Заголовок KZ')
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_ru')
                    ->label('Заголовок RU')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_en')
                    ->label('Заголовок EN')
                    ->maxLength(255),
                TiptapEditor::make('content_kz')
                    ->label('Контент KZ'),
                TiptapEditor::make('content_ru')
                    ->label('Контент RU')
                    ->required(),
                TiptapEditor::make('content_en')
                    ->label('Контент EN'),
                Forms\Components\FileUpload::make('image')
                    ->label('Изображение')
                    ->image()
                    ->disk('public')
                    ->directory('news')
                    ->visibility('public')
                    ->storeFileNamesIn('image'),
                Forms\Components\Toggle::make('status')
                    ->label('Активна')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('image')
                    ->label('Фото')
                    ->formatStateUsing(function ($state) {
                        if ($state) {
                            return '<img src="/storage/news/' . $state . '" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">';
                        }
                        return 'Нет фото';
                    })
                    ->html(),
                Tables\Columns\TextColumn::make('title_ru')
                    ->label('Заголовок')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('category.label_ru')
                    ->label('Категория'),
                Tables\Columns\IconColumn::make('status')
                    ->label('Статус')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->relationship('category', 'label_ru'),
                Tables\Filters\TernaryFilter::make('status'),
            ])
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}