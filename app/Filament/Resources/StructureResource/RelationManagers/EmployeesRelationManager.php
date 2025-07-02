<?php

namespace App\Filament\Resources\StructureResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeesRelationManager extends RelationManager
{
    protected static string $relationship = 'employees';
    protected static ?string $title = 'Сотрудники';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                ->schema([
Tabs::make('')
                ->tabs([
                    Tabs\Tab::make('kz')
                    ->schema([
                        Forms\Components\TextInput::make('fullname_kk')
                          ->label('ФИО(kz)')
                          ->required()
                          ->maxLength(255),
                        Forms\Components\TextInput::make('position_kk')
                          ->label('Должность(kz)')
                          ->required()
                          ->maxLength(255),
                    ]),
                    Tabs\Tab::make('ru')
                    ->schema([
                        Forms\Components\TextInput::make('fullname_ru')
                          ->label('ФИО(ru)')
                          ->required()
                          ->maxLength(255),
                        Forms\Components\TextInput::make('position_ru')
                          ->label('Должность(ru)')
                          ->required()
                          ->maxLength(255),
                    ]),
                    Tabs\Tab::make('en')
                    ->schema([
                        Forms\Components\TextInput::make('fullname_en')
                          ->label('ФИО(en)')
                          ->required()
                          ->maxLength(255),
                        Forms\Components\TextInput::make('position_en')
                          ->label('Должность(en)')
                          ->required()
                          ->maxLength(255),
                    ])  
                    ]),
                Forms\Components\TextInput::make('sort')
                    ->label('Позиция')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->label('Активно')
                    ->default(1)   
                ])->columnSpan(8),
                 Section::make('')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                          ->image()
                          ->optimize('webp')
                          ->maxSize(6024)
                          ->directory('employees')
                          ->label('Фото'),
                    ])->columnSpan(4)
            ])->columns(12);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('fullname_kk')
            ->columns([
                Tables\Columns\TextColumn::make('fullname_kk')
                ->label('ФИО'),
                ToggleColumn::make('is_active')
                ->label('Активно')
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
