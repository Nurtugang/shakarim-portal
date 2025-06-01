<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TextWidgetResource\Pages;
use App\Filament\Resources\TextWidgetResource\RelationManagers;
use App\Models\TextWidget;
use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TextWidgetResource extends Resource
{
    protected static ?string $model = TextWidget::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('kz')
                            ->schema([
                                Forms\Components\TextInput::make('title_kk')
                                    ->required()
                                    ->maxLength(255),
                                TiptapEditor::make('content_kk')
                                    ->output(TiptapOutput::Json)
                                    ->required()
                                    ->directory('/widget')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('ru')
                            ->schema([
                                Forms\Components\TextInput::make('title_ru')
                                    ->required()
                                    ->maxLength(255),
                                TiptapEditor::make('content_ru')
                                    ->output(TiptapOutput::Json)
                                    ->required()
                                    ->directory('/widget')
                                    ->columnSpanFull(),
                                Forms\Components\Actions::make([
                                    Forms\Components\Actions\Action::make('copy_content_from_kk')
                                        ->label('Скопировать с казахского')
                                        ->action(fn($get, $set) => $set('content_ru', $get('content_kk')))
                                ]),
                            ]),
                        Tabs\Tab::make('en')
                            ->schema([
                                Forms\Components\TextInput::make('title_en')
                                    ->required()
                                    ->maxLength(255),
                                TiptapEditor::make('content_en')
                                    ->output(TiptapOutput::Json)
                                    ->required()
                                    ->directory('/widget')
                                    ->columnSpanFull(),
                                Forms\Components\Actions::make([
                                    Forms\Components\Actions\Action::make('copy_content_from_ru')
                                        ->label('Скопировать с русского')
                                        ->action(fn($get, $set) => $set('content_en', $get('content_ru')))
                                ]),
                            ]),
                    ])->columnSpanFull(),
                Forms\Components\TextInput::make('key')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('active')
                    ->label('Активно')
                    ->default(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_ru')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->label('Активно')
                    ->boolean(),
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
            'index' => Pages\ListTextWidgets::route('/'),
            'create' => Pages\CreateTextWidget::route('/create'),
            'edit' => Pages\EditTextWidget::route('/{record}/edit'),
        ];
    }
}
