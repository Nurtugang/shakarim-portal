<?php

namespace App\Filament\Resources\Science;

use App\Enums\RolesEnum;
use App\Filament\Resources\Science\AspirantResource\Pages;
use App\Filament\Resources\Science\AspirantResource\RelationManagers;
use App\Models\Science\Aspirant;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class AspirantResource extends Resource
{
    protected static ?string $model = Aspirant::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    
    protected static ?int $navigationSort = 6;

    public static function getNavigationLabel(): string
    {
        return 'Соискатели ученых званий';
    }

    public static function getPluralLabel(): ?string
    {
        return 'Соискатели ученых званий';
    }

    public static function getModelLabel(): string
    {
        return 'соискатель';
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
                Section::make('Основная информация')
                    ->schema([
                        TextInput::make('fullname')
                            ->label('ФИО')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('fullname')
                    ->label('ФИО')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('documents_count')
                    ->label('Документов')
                    ->counts('documents')
                    ->sortable(),

                TextColumn::make('formatted_date')
                    ->label('Дата добавления')
                    ->getStateUsing(fn (Aspirant $record): string => $record->formatted_date)
                    ->sortable(query: function ($query, string $direction) {
                        return $query->orderBy('created_at', $direction);
                    }),
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
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\DocumentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAspirants::route('/'),
            'create' => Pages\CreateAspirant::route('/create'),
            'edit' => Pages\EditAspirant::route('/{record}/edit'),
        ];
    }
}

