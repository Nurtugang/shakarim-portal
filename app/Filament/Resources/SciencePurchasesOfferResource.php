<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SciencePurchasesOfferResource\Pages;
use App\Models\Science\SciencePurchasesOffer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SciencePurchasesOfferResource extends Resource
{
    protected static ?string $model = SciencePurchasesOffer::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?int $navigationSort = 3;

    public static function getNavigationLabel(): string
    {
        return 'Коммерческие предложения';
    }

    public static function getPluralLabel(): ?string
    {
        return 'Коммерческие предложения';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Наука';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('purchase_id')
                    ->label('Закупка')
                    ->relationship('purchase', 'name_ru') // или name_kk/en, выбери что удобнее
                    ->required(),
                Forms\Components\TextInput::make('organization')
                    ->label('Организация')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('head')
                    ->label('Руководитель')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact')
                    ->label('Контактные данные')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('filename')
                    ->label('Файл КП')
                    ->directory('purchase_offers')
                    ->downloadable()
                    ->preserveFilenames()
                    ->acceptedFileTypes(['application/pdf','application/msword','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('purchase.name_ru')
                    ->label('Закупка')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization')
                    ->label('Организация')
                    ->searchable(),
                Tables\Columns\TextColumn::make('head')
                    ->label('Руководитель'),
                Tables\Columns\TextColumn::make('contact')
                    ->label('Контакт'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('filename')
                    ->label('Файл')
                    ->url(fn ($record) => $record->getFile(), true)
                    ->openUrlInNewTab(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSciencePurchasesOffers::route('/'),
            'create' => Pages\CreateSciencePurchasesOffer::route('/create'),
            'edit' => Pages\EditSciencePurchasesOffer::route('/{record}/edit'),
        ];
    }
}
