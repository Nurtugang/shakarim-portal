<?php

namespace App\Filament\Resources\StructureResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Grid::make([
    'default' => 1,
    'md' => 3,
])
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
    Grid::make([
    'default' => 1,
    'md' => 2,
])
    ->schema([
        Forms\Components\TextInput::make('address')
        ->label('Адрес')
                    ->required()
                    ->maxLength(255),
        Forms\Components\TextInput::make('cabinet')
        ->label('Кабинет')
                    ->required()
                    ->maxLength(255),
    ]),
    Grid::make([
    'default' => 1,
    'md' => 3,
])
    ->schema([
        Forms\Components\TextInput::make('phone')
        ->label('Телефон')
                    ->required()
                    ->maxLength(255),
        Forms\Components\TextInput::make('phone_2')
        ->label('Телефон 2')
                    ->required()
                    ->maxLength(255),
        Forms\Components\TextInput::make('email')
        ->label('Электронная почта')
                    ->required()
                    ->maxLength(255),
        Repeater::make('data')
        ->label('Данные')
        ->schema([
            Forms\Components\TextInput::make('icon')
            ->label('Иконка(font-awesome)')
                        ->required()
                        ->placeholder('fa-tasks')
                        ->maxLength(10),
            Forms\Components\TextInput::make('title')
            ->label('Заголовок')
                        ->required()
                        ->placeholder('Основные виды деятельности')
                        ->maxLength(255),
            TiptapEditor::make('text') 
        ->label('Текст')
        ->required()
        ->columnSpanFull(),
        ])->columnSpanFull()         
    ]),
    

                
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
            ->filters([
                //
            ])
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
}
