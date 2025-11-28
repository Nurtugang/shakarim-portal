<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AwardCategoryResource\Pages;
use App\Models\AwardCategory;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Enums\RolesEnum;
use Illuminate\Support\Facades\Auth;

class AwardCategoryResource extends Resource
{
    protected static ?string $model = AwardCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Справочники';
    protected static ?int $navigationSort = 1;

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::DEVELOPMENT]);
    }

    public static function getNavigationLabel(): string
    {
        return 'Категории наград';
    }

    public static function getPluralLabel(): ?string
    {
        return 'Категории наград';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Названия категории')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name_kk')->label('Казахский (KK)'),
                        TextInput::make('name_ru')->label('Русский (RU)')->required(),
                        TextInput::make('name_en')->label('Английский (EN)'),
                        TextInput::make('name_cn')->label('Китайский (CN)'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name_ru')->label('Название (RU)')->searchable()->sortable(),
                TextColumn::make('name_kk')->label('Название (KK)')->searchable(),
                TextColumn::make('created_at')->dateTime()->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAwardCategories::route('/'),
            'create' => Pages\CreateAwardCategory::route('/create'),
            'edit' => Pages\EditAwardCategory::route('/{record}/edit'),
        ];
    }
}