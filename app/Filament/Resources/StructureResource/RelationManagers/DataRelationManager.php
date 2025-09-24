<?php

namespace App\Filament\Resources\StructureResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;

class DataRelationManager extends RelationManager
{
    protected static string $relationship = 'data';
    protected static ?string $title = 'Данные';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('lang')
                    ->label('Язык')
                    ->options([
                        'kk' => 'Казахский',
                        'ru' => 'Русский',
                        'en' => 'English',
                    ]),
                Grid::make(['default' => 1, 'md' => 3])
                    ->schema([
                        Forms\Components\TextInput::make('leader_name')
                            ->label('Руководитель')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('leader_position')
                            ->label('Должность руководителя')
                            ->maxLength(255),
                        FileUpload::make('image')
                            ->label('Изображение')
                            ->image()
                            ->optimize('webp')
                            ->directory('structure'),
                    ]),
                Grid::make(['default' => 1, 'md' => 3])
                    ->schema([
                        Forms\Components\TextInput::make('address')
                            ->label('Адрес')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('cabinet')
                            ->label('Кабинет')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label('Электронная почта')
                            ->required()
                            ->maxLength(255),
                    ]),
                Forms\Components\Hidden::make('phone'),
                Forms\Components\Hidden::make('phone_2'),
                Repeater::make('data')
                    ->label('Данные')
                    ->schema([
                        Forms\Components\TextInput::make('icon')
                            ->label('Иконка(font-awesome)')
                            ->required()
                            ->maxLength(10)
                            ->hidden()
                            ->default('fa-tasks'),
                        Forms\Components\TextInput::make('title')
                            ->label('Заголовок')
                            ->required()
                            ->placeholder('Основные виды деятельности')
                            ->maxLength(255),
                        TiptapEditor::make('text')
                            ->label('Текст')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('lang')
            ->columns([
                Tables\Columns\TextColumn::make('lang')
                    ->label('Язык'),
            ])
            ->filters([])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['phone'] = null;
        $data['phone_2'] = null;
 
        return $data;
    }
}