<?php

namespace App\Filament\Resources;

use App\Enums\SciencePurchasesEnum;
use App\Filament\Resources\SciencePurchaseResource\Pages;
use App\Filament\Resources\SciencePurchaseResource\RelationManagers;
use App\Filament\Resources\SciencePurchaseResource\RelationManagers\OffersRelationManager;
use App\Models\Science\SciencePurchase;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SciencePurchaseResource extends Resource
{
    protected static ?string $model = SciencePurchase::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;

    public static function getNavigationLabel(): string
    {
        return 'Закупки';
    }

    public static function getPluralLabel(): ?string
    {
        return static::getNavigationLabel();
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Наука';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                ->schema([
                    Forms\Components\Select::make('irn_id')
                    ->label('ИРН проекта')
                    ->relationship('irn', 'name')
                    ->required(),
                    Tabs::make('')
                ->tabs([
                    Tabs\Tab::make('kz')
                    ->schema([
                        Forms\Components\TextInput::make('name_kk')
                        ->label('Наименование(kz)')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Textarea::make('description_kk')
                    ->label('Характеристики(kz)')
                    ->required()
                    ->columnSpanFull(),
                    Forms\Components\Textarea::make('justification_kk')
                    ->label('Обоснование закупок оборудования(kz)')
                    ->required()
                    ->columnSpanFull(),
                    Forms\Components\TextInput::make('deadlines_kk')
                    ->label('Сроки закупок(kz)')
                    ->maxLength(20),
                    ]),
                        Tabs\Tab::make('ru')
                          ->schema([
                            Forms\Components\TextInput::make('name_ru')
                            ->label('Наименование(ru)')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Textarea::make('description_ru')
                    ->label('Характеристики(ru)')
                    ->required()
                    ->columnSpanFull(),
                    Forms\Components\Textarea::make('justification_ru')
                    ->label('Обоснование закупок оборудования(ru)')
                    ->required()
                    ->columnSpanFull(),
                    Forms\Components\TextInput::make('deadlines_ru')
                    ->label('Сроки закупок(ru)')
                    ->maxLength(20),

                    ]),
                    Tabs\Tab::make('en')
                    ->schema([
                        Forms\Components\TextInput::make('name_en')
                        ->label('Наименование(en)')
                    ->maxLength(255),
                    Forms\Components\Textarea::make('description_en')
                    ->label('Характеристики(en)')
                    ->columnSpanFull(),
                    Forms\Components\Textarea::make('justification_en')
                    ->label('Обоснование закупок оборудования(en)')
                    ->columnSpanFull(),
                    Forms\Components\TextInput::make('deadlines_en')
                    ->label('Сроки закупок(ru)')
                    ->maxLength(20),

                    ])
                    ]),
                
                Forms\Components\TextInput::make('price')
                    ->label('Планируемая стоимость')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('payment_terms')
                ->label('Условия оплаты')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('contacts')
                    ->required()
                    ->maxLength(255),
                Select::make('status')
                ->options(SciencePurchasesEnum::class)
                    ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('irn.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_kk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deadlines_kk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contacts')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            ]);
    }

    public static function getRelations(): array
    {
        return [
            OffersRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSciencePurchases::route('/'),
            'create' => Pages\CreateSciencePurchase::route('/create'),
            'edit' => Pages\EditSciencePurchase::route('/{record}/edit'),
        ];
    }
}
