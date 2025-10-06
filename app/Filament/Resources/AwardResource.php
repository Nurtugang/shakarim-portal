<?php

namespace App\Filament\Resources;

use App\Enums\RolesEnum;
use App\Filament\Resources\AwardResource\Pages;
use App\Models\Award;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class AwardResource extends Resource
{
    protected static ?string $model = Award::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static ?int $navigationSort = 4;

    public static function getNavigationLabel(): string
    {
        return 'Награды';
    }

    public static function getPluralLabel(): ?string
    {
        return 'Награды';
    }

    public static function getModelLabel(): string
    {
        return 'награду';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Справочники';
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::SCIENCE]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Основная информация о награде')
                    ->schema([
                        Tabs::make('Languages')
                            ->tabs([
                                Tabs\Tab::make('Казахский (KK)')
                                    ->schema([
                                        TextInput::make('fullname_kk')->label('Полное имя (KK)')->required(),
                                        TextInput::make('category_kk')->label('Категория (KK)'),
                                        TextInput::make('reward_kk')->label('Награда (KK)'),
                                        Textarea::make('position_kk')->label('Должность (KK)'),
                                    ]),
                                Tabs\Tab::make('Русский (RU)')
                                    ->schema([
                                        TextInput::make('fullname_ru')->label('Полное имя (RU)')->required(),
                                        TextInput::make('category_ru')->label('Категория (RU)'),
                                        TextInput::make('reward_ru')->label('Награда (RU)'),
                                        Textarea::make('position_ru')->label('Должность (RU)'),
                                    ]),
                                Tabs\Tab::make('Английский (EN)')
                                    ->schema([
                                        TextInput::make('fullname_en')->label('Полное имя (EN)'),
                                        TextInput::make('category_en')->label('Категория (EN)'),
                                        TextInput::make('reward_en')->label('Награда (EN)'),
                                        Textarea::make('position_en')->label('Должность (EN)'),
                                    ]),
                                Tabs\Tab::make('Китайский (CN)')
                                    ->schema([
                                        TextInput::make('fullname_cn')->label('Полное имя (CN)'),
                                        TextInput::make('category_cn')->label('Категория (CN)'),
                                        TextInput::make('reward_cn')->label('Награда (CN)'),
                                        Textarea::make('position_cn')->label('Должность (CN)'),
                                    ]),
                            ])->columnSpanFull(),
                    ]),

                Section::make('Дополнительные данные')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('year')
                            ->label('Год получения')
                            ->numeric()
                            ->required()
                            ->minValue(1900)
                            ->maxValue(date('Y') + 1),

                        Forms\Components\TextInput::make('sort')
                            ->label('Сортировка')
                            ->numeric()
                            ->default(100)
                            ->required(),

                        FileUpload::make('image')
                            ->label('Изображение')
                            ->directory('awards')
                            ->image()
                            ->imageEditor()
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Изображение')
                    ->circular()
                    ->disk('public')
                    ->getStateUsing(function (Model $record): ?string {
                        if (! $record->image) {
                            return null;
                        }
                        
                        return 'awards/' . $record->image;
                    }),

                TextColumn::make('fullname_ru')
                    ->label('Полное имя')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                TextColumn::make('reward_ru')
                    ->label('Награда')
                    ->searchable()
                    ->limit(50),

                TextColumn::make('year')
                    ->label('Год')
                    ->sortable(),

                TextColumn::make('sort')
                    ->label('Сорт.')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAwards::route('/'),
            'create' => Pages\CreateAward::route('/create'),
            'edit' => Pages\EditAward::route('/{record}/edit'),
        ];
    }
}