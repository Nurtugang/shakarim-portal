<?php

namespace App\Filament\Resources\Science;

use App\Enums\RolesEnum;
use App\Filament\Resources\Science\BestTeacherResource\Pages;
use App\Models\Science\BestTeacher;
use App\Models\Science\ScienceDirection;
use App\Models\Faculty;
use App\Models\Department;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class BestTeacherResource extends Resource
{
    protected static ?string $model = BestTeacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    
    protected static ?int $navigationSort = 5;

    public static function getNavigationLabel(): string
    {
        return 'Лучшие преподаватели';
    }

    public static function getPluralLabel(): ?string
    {
        return 'Лучшие преподаватели';
    }

    public static function getModelLabel(): string
    {
        return 'преподаватель';
    }
    
    public static function getNavigationGroup(): ?string
    {
        return 'Наука';
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::SCIENCE]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Общая информация')
                    ->columns(2)
                    ->schema([
                        TextInput::make('fullname_ru')
                            ->label('ФИО (RU)')
                            ->required(),
                        TextInput::make('fullname_kk')
                            ->label('ФИО (KK)'),
                        TextInput::make('fullname_en')
                            ->label('ФИО (EN)'),
                        TextInput::make('fullname_cn')
                            ->label('ФИО (CN)'),
                    ]),

                Section::make('Должность')
                    ->columns(2)
                    ->schema([
                        TextInput::make('position_ru')
                            ->label('Должность (RU)')
                            ->required(),
                        TextInput::make('position_kk')
                            ->label('Должность (KK)'),
                        TextInput::make('position_en')
                            ->label('Должность (EN)'),
                        TextInput::make('position_cn')
                            ->label('Должность (CN)'),
                    ]),

                Section::make('Организационная структура')
                    ->columns(2)
                    ->schema([
                        TextInput::make('year')
                            ->label('Год')
                            ->numeric()
                            ->required(),
                        
                        Select::make('science_direction_id')
                            ->label('Научное направление')
                            ->options(ScienceDirection::all()->pluck('name_ru', 'id'))
                            ->default(1)
                            ->required(),
                    ]),

                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                
                ImageColumn::make('image')
                    ->label('Фото')
                    ->circular()
                    ->disk('public')
                    ->getStateUsing(function ($record) {
                        return $record->image ? 'best-teachers/' . $record->image : null;
                    }),

                TextColumn::make('fullname_ru')
                    ->label('ФИО')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('position_ru')
                    ->label('Должность')
                    ->limit(40)
                    ->searchable(),

                TextColumn::make('scienceDirection.name_ru')
                    ->label('Научное направление')
                    ->sortable(),

                TextColumn::make('year')
                    ->label('Год')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('science_direction_id')
                    ->label('Научное направление')
                    ->options(ScienceDirection::all()->pluck('name_ru', 'id')),

                Tables\Filters\SelectFilter::make('year')
                    ->label('Год')
                    ->options(function () {
                        $years = BestTeacher::distinct('year')->pluck('year')->sort()->reverse();
                        return $years->mapWithKeys(fn($year) => [$year => $year]);
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('year', 'desc');
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
            'index' => Pages\ListBestTeachers::route('/'),
            'create' => Pages\CreateBestTeacher::route('/create'),
            'edit' => Pages\EditBestTeacher::route('/{record}/edit'),
        ];
    }
}