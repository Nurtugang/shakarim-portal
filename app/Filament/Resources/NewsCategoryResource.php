<?php

namespace App\Filament\Resources;

use App\Models\NewsCategory;
use App\Filament\Resources\NewsCategoryResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NewsCategoryResource extends Resource
{
    protected static ?string $model = NewsCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationLabel = 'Категории';

    protected static ?string $navigationGroup = 'Новости';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('label_kz')
                    ->label('Название KZ')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('label_ru')
                    ->label('Название RU')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('label_en')
                    ->label('Название EN')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('title')
                    ->label('Заголовок')
                    ->maxLength(255),
                Forms\Components\TextInput::make('alias')
                    ->label('Алиас')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('label_ru')
                    ->label('Название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alias')
                    ->label('Алиас')
                    ->searchable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListNewsCategories::route('/'),
            'create' => Pages\CreateNewsCategory::route('/create'),
            'edit' => Pages\EditNewsCategory::route('/{record}/edit'),
        ];
    }
}