<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AwardRewardResource\Pages;
use App\Models\AwardReward;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Enums\RolesEnum;
use Illuminate\Support\Facades\Auth;

class AwardRewardResource extends Resource
{
    protected static ?string $model = AwardReward::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'Справочники';
    protected static ?int $navigationSort = 2;

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::DEVELOPMENT]);
    }

    public static function getNavigationLabel(): string
    {
        return 'Виды наград';
    }

    public static function getPluralLabel(): ?string
    {
        return 'Виды наград (Справочник)';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Информация о награде')
                    ->schema([
                        // Привязка к родительской категории
                        Select::make('award_category_id')
                            ->label('Категория')
                            ->relationship('category', 'name_ru')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Section::make('Названия')
                            ->columns(2)
                            ->schema([
                                TextInput::make('name_kk')->label('Казахский (KK)'),
                                TextInput::make('name_ru')->label('Русский (RU)')->required(),
                                TextInput::make('name_en')->label('Английский (EN)'),
                                TextInput::make('name_cn')->label('Китайский (CN)'),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                // Показываем к какой категории относится
                TextColumn::make('category.name_ru')
                    ->label('Категория')
                    ->sortable()
                    ->badge()
                    ->color('info'),
                
                TextColumn::make('name_ru')->label('Название (RU)')->searchable()->sortable(),
                TextColumn::make('name_kk')->label('Название (KK)')->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('award_category_id')
                    ->label('Категория')
                    ->relationship('category', 'name_ru'),
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
            'index' => Pages\ListAwardRewards::route('/'),
            'create' => Pages\CreateAwardReward::route('/create'),
            'edit' => Pages\EditAwardReward::route('/{record}/edit'),
        ];
    }
}