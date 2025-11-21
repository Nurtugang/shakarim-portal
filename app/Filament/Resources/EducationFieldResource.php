<?php

namespace App\Filament\Resources;

use App\Enums\RolesEnum;
use App\Filament\Resources\EducationFieldResource\Pages;
use App\Filament\Resources\EducationFieldResource\RelationManagers;
use App\Models\EducationField;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class EducationFieldResource extends Resource
{
    protected static ?string $model = EducationField::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Образование';
    protected static ?int $navigationSort = 1;
    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::EDUCATION]);
    }
    
    public static function getModelLabel(): string
    {
        return 'Область образования';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Области образования';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Основная информация')
                    ->schema([
                        Tabs::make('Название')
                            ->tabs([
                                Tabs\Tab::make('Русский')
                                    ->schema([
                                        TextInput::make('name_ru')->label('Название (RU)')->required()->maxLength(255),
                                    ]),
                                Tabs\Tab::make('Казахский')
                                    ->schema([
                                        TextInput::make('name_kk')->label('Атауы (KK)')->required()->maxLength(255),
                                    ]),
                                Tabs\Tab::make('Английский')
                                    ->schema([
                                        TextInput::make('name_en')->label('Name (EN)')->required()->maxLength(255),
                                    ]),
                            ])->columnSpanFull(),
                        Toggle::make('is_active')->label('Активна')->default(true),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('ID'),
                TextColumn::make('name_ru')->label('Название (RU)')->searchable()->sortable(),
                TextColumn::make('name_kk')->label('Атауы (KK)')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('name_en')->label('Name (EN)')->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_active')->boolean()->label('Активна'),
            ])
            ->filters([
                TernaryFilter::make('is_active')->label('Активность')->trueLabel('Активные')->falseLabel('Неактивные')->placeholder('Все'),
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make()->label('Редактировать'),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\BulkActionGroup::make([
                    \Filament\Tables\Actions\DeleteBulkAction::make()->label('Удалить'),
                ]),
            ]);
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
            'index' => Pages\ListEducationFields::route('/'),
            'create' => Pages\CreateEducationField::route('/create'),
            'edit' => Pages\EditEducationField::route('/{record}/edit'),
        ];
    }
}
