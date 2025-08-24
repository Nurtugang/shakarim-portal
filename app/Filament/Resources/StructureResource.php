<?php

namespace App\Filament\Resources;

use App\Enums\RolesEnum;
use App\Filament\Resources\StructureResource\Pages;
use App\Filament\Resources\StructureResource\RelationManagers;
use App\Filament\Resources\StructureResource\RelationManagers\DataRelationManager;
use App\Filament\Resources\StructureResource\RelationManagers\EmployeesRelationManager;
use App\Models\Structure;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class StructureResource extends Resource
{
    protected static ?string $model = Structure::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationLabel = 'Организационная структура';

    protected static ?string $modelLabel = 'Организационная структура';

    protected static ?string $pluralModelLabel = 'Организационная структура';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                ->schema([

                        Forms\Components\TextInput::make('title_kk')
                        ->label('Название(kz)')
                          ->required()
                          ->maxLength(255),
                        Forms\Components\TextInput::make('title_ru')
                               ->label('Название(ru)')
                               ->required()
                               ->maxLength(255),
                        Forms\Components\TextInput::make('title_en')
                               ->label('Название(en)')
                               ->required()
                               ->maxLength(255),
                
                    Forms\Components\TextInput::make('sort_order')
                    ->label('Сортировка')
                    ->required()
                    ->numeric()
                    ->default(0),
                    Forms\Components\Select::make('position')
                               ->label('Позиция')
                               ->options([
                                   'left' => 'Слева',
                                   'right' => 'Справа',
                                   'center' => 'Центр',
                               ])
                               ->visible(Auth::user()->hasRole(RolesEnum::ADMIN)),
                    Forms\Components\Select::make('layout_type')
                               ->label('тип')
                               ->required()
                               ->options([
                                   'center_with_sides' => 'Центр с боковыми',
                                   'vertical_stack' => 'Вертикальный',
                                   'horizontal_row' => 'Горизонтальный',
                               ])
                               ->visible(Auth::user()->hasRole(RolesEnum::ADMIN)),
                Forms\Components\Select::make('parent_id')
                    ->label('Родительское меню')
                    ->options(Structure::all()->pluck('title_ru', 'id'))
                    ->searchable(),
                    Forms\Components\Toggle::make('active')
                    ->label('Активно')
                    ->default(1),
                ])
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_ru')
                    ->label('Название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->url(fn (Structure $record): string => $record->getUrl())
                    ->openUrlInNewTab()
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent.title_ru')
                    ->label('Родительская структура'),
                Tables\Columns\TextColumn::make('position')
                    ->label('Позиция')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('active')
                    ->label('Активно'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->when(
            Auth::user()->hasRole(RolesEnum::STRUCTURE),
            fn (Builder $query) => $query->where('id',Auth::user()->structure_id)
        );
    }

    public static function getRelations(): array
    {
        return [
            DataRelationManager::class,
            EmployeesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStructures::route('/'),
            'create' => Pages\CreateStructure::route('/create'),
            'edit' => Pages\EditStructure::route('/{record}/edit'),
        ];
    }
}
