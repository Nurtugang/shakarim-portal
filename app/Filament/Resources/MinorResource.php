<?php

namespace App\Filament\Resources;

use App\Enums\RolesEnum;
use App\Filament\Resources\MinorResource\Pages;
use App\Models\Minor;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Facades\Auth;

class MinorResource extends Resource
{
    protected static ?string $model = Minor::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Minor программы';

    protected static ?string $modelLabel = 'Minor программа';

    protected static ?string $pluralModelLabel = 'Minor программы';

    protected static ?string $navigationGroup = 'Образование';

    protected static ?int $navigationSort = 10;

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::EDUCATION]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Информация о Minor программе')
                    ->schema([
                        Select::make('language')
                            ->label('Язык')
                            ->options([
                                'kk' => 'Казахский',
                                'ru' => 'Русский',
                                'en' => 'Английский',
                            ])
                            ->required()
                            ->helperText('Выберите язык для этой Minor программы. У каждого Minor может быть только один язык.'),
                        
                        Forms\Components\TextInput::make('title')
                            ->label('Название')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Введите название Minor программы на выбранном языке'),
                        
                        TiptapEditor::make('content')
                            ->label('Содержание')
                            ->required()
                            ->directory('/minors')
                            ->columnSpanFull()
                            ->helperText('Подробное описание Minor программы'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->limit(50)
                    ->wrap(),
                
                Tables\Columns\BadgeColumn::make('language')
                    ->label('Язык')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'kk' => 'Казахский',
                        'ru' => 'Русский',
                        'en' => 'Английский',
                        default => strtoupper($state),
                    })
                    ->colors([
                        'success' => 'kk',
                        'primary' => 'ru',
                        'warning' => 'en',
                    ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('language')
                    ->label('Язык')
                    ->options([
                        'kk' => 'Казахский',
                        'ru' => 'Русский',
                        'en' => 'Английский',
                    ]),
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
            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMinors::route('/'),
            'create' => Pages\CreateMinor::route('/create'),
            'edit' => Pages\EditMinor::route('/{record}/edit'),
        ];
    }
}
