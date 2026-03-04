<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicReceptionResource\Pages;
use App\Models\PublicReception;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PublicReceptionResource extends Resource
{
    protected static ?string $model = PublicReception::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    
    protected static ?string $navigationLabel = 'Общественный прием';
    
    protected static ?string $modelLabel = 'Обращение';
    
    protected static ?string $pluralModelLabel = 'Общественный прием';

    protected static ?string $navigationGroup = 'Обращения';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Информация о заявителе')
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

                Forms\Components\Section::make('Обращение и ответ')
                    ->schema([
                        Forms\Components\Textarea::make('message')
                            ->label('Обращение')
                            ->required()
                            ->disabled()
                            ->rows(3),
                        Forms\Components\Textarea::make('response')
                            ->label('Ответ')
                            ->rows(4)
                            ->helperText('Введите ответ на обращение'),
                        Forms\Components\Toggle::make('is_processed')
                            ->label('Обработано')
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if (!$state) {
                                    $set('is_published', false);
                                }
                            }),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Опубликовано')
                            ->helperText('Обращение и ответ будут видны на сайте')
                            ->hidden(fn ($get) => !$get('is_processed')),
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
                Tables\Columns\TextColumn::make('message')
                    ->label('Обращение')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_processed')
                    ->label('Обработано')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Опубликовано')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Получено')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_processed')
                    ->label('Статус обработки'),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Публикация'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('mark_processed')
                        ->label('Отметить как обработанные')
                        ->icon('heroicon-o-check')
                        ->action(function ($records) {
                            $records->each(function ($record) {
                                $record->update(['is_processed' => true]);
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
            'index' => Pages\ListPublicReceptions::route('/'),
            'edit' => Pages\EditPublicReception::route('/{record}/edit'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_processed', false)->count();
    }
}
