<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScienceDissertationResource\Pages;
use App\Models\Science\ScienceDissertation;
use FilamentTiptapEditor\TiptapEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ScienceDissertationResource extends Resource
{
    protected static ?string $model = ScienceDissertation::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Общая информация')
                    ->columns(2)
                    ->schema([
                        TextInput::make('fio_ru')
                            ->label('ФИО (RU)')
                            ->required(),
                        TextInput::make('fio_kk')
                            ->label('ФИО (KK)'),
                        TextInput::make('fio_en')
                            ->label('ФИО (EN)'),
                        TextInput::make('fio_cn')
                            ->label('ФИО (CN)'),
                    ]),

                Section::make('Категория диссертационного совета')
                    ->schema([
                        TextInput::make('category_ru')->label('Название категории (RU)')->columnSpanFull(),
                        TextInput::make('category_kk')->label('Название категории (KK)')->columnSpanFull(),
                        TextInput::make('category_en')->label('Название категории (EN)')->columnSpanFull(),
                        TextInput::make('category_cn')->label('Название категории (CN)')->columnSpanFull(),
                    ]),

                Section::make('Содержимое диссертации')
                    ->schema([
                        // Используем табы для удобного переключения языков
                        Tabs::make('Content')
                            ->tabs([
                                Tabs\Tab::make('Русский')
                                    ->schema([
                                        TiptapEditor::make('content_ru')
                                            ->label('') // Убираем лишний лейбл
                                            ->profile('default') // 'default' или ваш кастомный профиль
                                            ->required(),
                                    ]),
                                Tabs\Tab::make('Казахский')
                                    ->schema([
                                        TiptapEditor::make('content_kk')
                                            ->label('')
                                            ->profile('default'),
                                    ]),
                                Tabs\Tab::make('Английский')
                                    ->schema([
                                        TiptapEditor::make('content_en')
                                            ->label('')
                                            ->profile('default'),
                                    ]),
                                Tabs\Tab::make('Китайский')
                                    ->schema([
                                        TiptapEditor::make('content_cn')
                                            ->label('')
                                            ->profile('default'),
                                    ]),
                            ])->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('fio_ru')
                    ->label('ФИО')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category_ru')
                    ->label('Категория')
                    ->limit(50) // Ограничиваем длину для отображения
                    ->searchable(),
                TextColumn::make('updated_at')
                    ->label('Последнее обновление')
                    ->dateTime()
                    ->sortable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListScienceDissertations::route('/'),
            'create' => Pages\CreateScienceDissertation::route('/create'),
            'edit' => Pages\EditScienceDissertation::route('/{record}/edit'),
        ];
    }
}