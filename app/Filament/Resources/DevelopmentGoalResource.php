<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DevelopmentGoalResource\Pages;
use App\Models\DevelopmentGoal;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Enums\RolesEnum;

class DevelopmentGoalResource extends Resource
{
    protected static ?string $model = DevelopmentGoal::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Цели развития';

    protected static ?string $modelLabel = 'Цель развития';

    protected static ?string $pluralModelLabel = 'Цели развития';

    public static function getNavigationGroup(): ?string
    {
        return 'Справочники';
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::DEVELOPMENT]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Основная информация')
                    ->schema([
                        Forms\Components\Select::make('language')
                            ->label('Язык')
                            ->options([
                                'kk' => 'Казахский',
                                'ru' => 'Русский',
                                'en' => 'Английский',
                                'cn' => 'Китайский',
                            ])
                            ->required()
                            ->native(false)
                            ->default('ru')
                            ->disabled(),

                        Forms\Components\TextInput::make('title')
                            ->label('Заголовок')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        TiptapEditor::make('content')
                            ->output(TiptapOutput::Html)
                            ->label('Контент')
                            ->required()
                            ->directory('dev_goals')
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('thumbnail')
                            ->label('Миниатюра')
                            ->image()
                            ->directory('dev_goals')
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('position')
                            ->label('Позиция')
                            ->numeric()
                            ->default(0)
                            ->required()
                            ->helperText('Порядок отображения (меньшее число - выше)'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('thumbnail')
                    ->label('Фото')
                    ->formatStateUsing(function ($state, $record) {
                        if ($state) {
                            $imageUrl = $record->getThumbnailUrl();
                            return '<img src="' . $imageUrl . '" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">';
                        }
                        return 'Нет фото';
                    })
                    ->html(),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('Заголовок')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->wrap(),
                
                Tables\Columns\TextColumn::make('language')
                    ->label('Язык')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'kk' => 'kk',
                        'ru' => 'RU',
                        'en' => 'EN',
                        'cn' => 'CN',
                        default => strtoupper($state),
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'kk' => 'success',
                        'ru' => 'warning',
                        'en' => 'info',
                        'cn' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('position')
                    ->label('Позиция')
                    ->sortable()
                    ->badge()
                    ->color('info'),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('position', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('language')
                    ->label('Язык')
                    ->options([
                        'kk' => 'Казахский',
                        'ru' => 'Русский',
                        'en' => 'Английский',
                        'cn' => 'Китайский',
                    ])
                    ->multiple(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            
            ->reorderable('position')
            ->defaultGroup('language');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDevelopmentGoals::route('/'),
            'create' => Pages\CreateDevelopmentGoal::route('/create'),
            'edit' => Pages\EditDevelopmentGoal::route('/{record}/edit'),
        ];
    }
}