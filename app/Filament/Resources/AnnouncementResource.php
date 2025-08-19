<?php

namespace App\Filament\Resources;

use App\Models\Announcement;
use App\Filament\Resources\AnnouncementResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;

class AnnouncementResource extends Resource
{
    protected static ?string $model = Announcement::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationLabel = 'Объявления';

    protected static ?string $navigationGroup = 'Новости';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Название')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alias')
                    ->label('Алиас')
                    ->maxLength(255),
                Forms\Components\Select::make('language')
                    ->label('Язык')
                    ->options([
                        'kk' => 'Казахский',
                        'ru' => 'Русский',
                        'en' => 'English',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Описание')
                    ->rows(3),
                TiptapEditor::make('content')
                    ->label('Содержание')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label('Изображение')
                    ->image()
                    ->disk('public')
                    ->directory('announcements')
                    ->visibility('public'),
                Forms\Components\DateTimePicker::make('date')
                    ->label('Дата публикации')
                    ->default(now())
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->label('Активно')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('image')
                    ->label('Фото')
                    ->formatStateUsing(function ($state, $record) {
                        if ($state) {
                            $imageUrl = $record->getOptimizedImageUrl();
                            return '<img src="' . $imageUrl . '" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">';
                        }
                        return 'Нет фото';
                    })
                    ->html(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('language')
                    ->label('Язык')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'kk' => 'success',
                        'ru' => 'warning', 
                        'en' => 'info',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('date')
                    ->label('Дата')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->label('Статус')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('language')
                    ->options([
                        'kk' => 'Казахский',
                        'ru' => 'Русский',
                        'en' => 'English',
                    ]),
                Tables\Filters\TernaryFilter::make('status'),
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
            ])
            ->defaultSort('date', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnnouncements::route('/'),
            'create' => Pages\CreateAnnouncement::route('/create'),
            'edit' => Pages\EditAnnouncement::route('/{record}/edit'),
        ];
    }
}