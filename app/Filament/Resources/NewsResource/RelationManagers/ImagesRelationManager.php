<?php

namespace App\Filament\Resources\NewsResource\RelationManagers;

use App\Models\NewsImage;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class ImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'images';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Подпись')
                    ->maxLength(255),
                FileUpload::make('image')
                    ->label('Изображение')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('news/images')
                    ->visibility('public'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Фото')
                    ->getStateUsing(fn (?\App\Models\NewsImage $record) => $record && $record->image ? '/storage/news/images/' . basename($record->image) : null)
                    ->rounded()
                    ->height(50)
                    ->width(80),
                TextColumn::make('title')
                    ->label('Подпись')
                    ->limit(40),
                TextColumn::make('created_at')
                    ->label('Добавлено')
                    ->dateTime('d.m.Y H:i'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
