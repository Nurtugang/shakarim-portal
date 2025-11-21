<?php

namespace App\Filament\Resources;

use App\Enums\RolesEnum;
use App\Filament\Resources\DirectionClassificationResource\Pages;
use App\Filament\Resources\DirectionClassificationResource\RelationManagers;
use App\Models\DirectionClassification;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Enums\EducationLevelEnum;
use App\Models\EducationField;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class DirectionClassificationResource extends Resource
{
    protected static ?string $model = DirectionClassification::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Образование';
    protected static ?int $navigationSort = 2;
    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::EDUCATION]);
    }

    public static function getModelLabel(): string
    {
        return 'Классификация направлений';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Классификации направлений';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Основная информация')
                ->schema([
                    Select::make('education_field_id')
                        ->label('Область образования')
                        ->options(EducationField::query()->pluck('name_ru','id'))
                        ->searchable()
                        ->nullable(),
                    TextInput::make('code')->label('Код')->required()->maxLength(50),
                    Select::make('education_level')
                        ->label('Уровень обучения')
                        ->options([
                            EducationLevelEnum::BACHELOR->value => 'Бакалавриат',
                            EducationLevelEnum::MASTER->value => 'Магистратура',
                            EducationLevelEnum::DOCTORATE->value => 'Докторантура',
                        ])->required(),
                    Tabs::make('Название')
                        ->tabs([
                            Tabs\Tab::make('Русский')->schema([
                                TextInput::make('name_ru')->label('Название (RU)')->required()->maxLength(255),
                            ]),
                            Tabs\Tab::make('Казахский')->schema([
                                TextInput::make('name_kk')->label('Атауы (KK)')->required()->maxLength(255),
                            ]),
                            Tabs\Tab::make('Английский')->schema([
                                TextInput::make('name_en')->label('Name (EN)')->required()->maxLength(255),
                            ]),
                        ])->columnSpanFull(),
                    Toggle::make('is_active')->label('Активна')->default(true),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('ID'),
                TextColumn::make('code')->label('Код')->searchable()->sortable(),
                TextColumn::make('name_ru')->label('Название (RU)')->searchable()->sortable(),
                TextColumn::make('educationField.name_ru')->label('Область')->sortable()->toggleable(),
                TextColumn::make('education_level')->label('Уровень')->formatStateUsing(fn($state) => match($state){
                    EducationLevelEnum::BACHELOR->value => 'Бакалавриат',
                    EducationLevelEnum::MASTER->value => 'Магистратура',
                    EducationLevelEnum::DOCTORATE->value => 'Докторантура',
                    default => $state,
                })->sortable(),
                IconColumn::make('is_active')->boolean()->label('Активна'),
            ])
            ->filters([
                SelectFilter::make('education_level')->label('Уровень')
                    ->options([
                        EducationLevelEnum::BACHELOR->value => 'Бакалавриат',
                        EducationLevelEnum::MASTER->value => 'Магистратура',
                        EducationLevelEnum::DOCTORATE->value => 'Докторантура',
                    ]),
                SelectFilter::make('education_field_id')->label('Область')->options(EducationField::query()->pluck('name_ru','id')),
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
            'index' => Pages\ListDirectionClassifications::route('/'),
            'create' => Pages\CreateDirectionClassification::route('/create'),
            'edit' => Pages\EditDirectionClassification::route('/{record}/edit'),
        ];
    }
}
