<?php
// app/Filament/Resources/RectorQuestionResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\RectorQuestionResource\Pages;
use App\Models\RectorQuestion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RectorQuestionResource extends Resource
{
    protected static ?string $model = RectorQuestion::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    
    protected static ?string $navigationLabel = 'Вопросы ректору';
    
    protected static ?string $modelLabel = 'Вопрос';
    
    protected static ?string $pluralModelLabel = 'Вопросы ректору';

    protected static ?string $navigationGroup = 'Блог ректора';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Информация о пользователе')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Имя')
                            ->required()
                            ->disabled(),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->disabled(),
                        Forms\Components\TextInput::make('phone')
                            ->label('Телефон')
                            ->disabled(),
                    ])->columns(2),

                Forms\Components\Section::make('Вопрос и ответ')
                    ->schema([
                        Forms\Components\Textarea::make('question')
                            ->label('Вопрос')
                            ->required()
                            ->disabled()
                            ->rows(3),
                        Forms\Components\Textarea::make('answer')
                            ->label('Ответ')
                            ->rows(4)
                            ->helperText('Введите ответ на вопрос'),
                        Forms\Components\Toggle::make('is_answered')
                            ->label('Отвечен')
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if (!$state) {
                                    $set('is_published', false);
                                }
                            }),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Опубликован')
                            ->helperText('Вопрос и ответ будут видны на сайте')
                            ->hidden(fn ($get) => !$get('is_answered')),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('question')
                    ->label('Вопрос')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_answered')
                    ->label('Отвечен')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Опубликован')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Получен')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_answered')
                    ->label('Статус ответа'),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Публикация'),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('mark_answered')
                        ->label('Отметить как отвеченные')
                        ->icon('heroicon-o-check')
                        ->action(function ($records) {
                            $records->each(function ($record) {
                                $record->update(['is_answered' => true]);
                            });
                        })
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRectorQuestions::route('/'),
            // 'view' => Pages\ViewRectorQuestion::route('/{record}'),
            'edit' => Pages\EditRectorQuestion::route('/{record}/edit'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_answered', false)->count();
    }
}