<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'События';

    protected static ?string $modelLabel = 'События';

    protected static ?string $pluralModelLabel = 'События';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                    ->schema([
                        Forms\Components\Tabs::make('')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make('kz')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_kk')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\Textarea::make('content_kk')
                                            ->required()
                                            ->columnSpanFull(),
                                    ]),
                                Forms\Components\Tabs\Tab::make('ru')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_ru')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\Textarea::make('content_ru')
                                            ->required()
                                            ->columnSpanFull(),
                                    ]),
                                Forms\Components\Tabs\Tab::make('en')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_en')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\Textarea::make('content_en')
                                            ->required()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                Forms\Components\Toggle::make('active')
                    ->required(),
                Forms\Components\DateTimePicker::make('start_date')
                    ->required(),  
                Forms\Components\DateTimePicker::make('end_date'),     
                    ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_kk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_ru')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_en')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('date')
                    ->dateTime()
                    ->sortable(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
