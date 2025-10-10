<?php

namespace App\Filament\Resources;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsTag;
use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers\CommentsRelationManager;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Новости';

    protected static ?string $navigationGroup = 'Новости';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Tabs::make('Tabs')
                            ->tabs([
                                Tabs\Tab::make('kz')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_kk')
                                            ->label('Заголовок kk')
                                            ->maxLength(255),
                                        TiptapEditor::make('content_kk')
                                            ->label('Контент kk'),
                                    ]),
                                Tabs\Tab::make('ru')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_ru')
                                            ->label('Заголовок RU')
                                            ->required()
                                            ->maxLength(255),
                                        TiptapEditor::make('content_ru')
                                            ->label('Контент RU')
                                            ->required(),
                                    ]),
                                Tabs\Tab::make('en')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_en')
                                            ->label('Заголовок EN')
                                            ->maxLength(255),
                                        TiptapEditor::make('content_en')
                                            ->label('Контент EN'),
                                    ]),
                                Tabs\Tab::make('cn')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_cn')
                                            ->label('Заголовок CN')
                                            ->maxLength(255),
                                        TiptapEditor::make('content_cn')
                                            ->label('Контент CN'),
                                    ])    

                            ]),
                        Forms\Components\Toggle::make('status')
                            ->label('Активна')
                            ->default(true),
                        Forms\Components\DateTimePicker::make('date')
                            ->label('Дата публикации')
                            ->default(now())
                            ->required(),
                    ])->columnSpan(8),
                Section::make()
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Изображение')
                            ->image()
                            ->disk('public')
                            ->directory('news')
                            ->visibility('public'),
                        Forms\Components\Select::make('category_id')
                            ->required()
                            ->label('Категория')
                            ->relationship('category', 'label_ru')
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('tags')
                            ->label('Теги')
                            ->multiple()
                            ->relationship('tags', 'name')
                            ->searchable()
                            ->preload(),
                    ])->columnSpan(4),

            ])->columns(12);
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
                Tables\Columns\TextColumn::make('title_kk')
                    ->url(fn(News $record): string => route('news.show', ['locale' => 'kk', 'news' => $record]))
                    ->openUrlInNewTab()
                    ->label('Заголовок')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('category.label_ru')
                    ->label('Категория'),
                Tables\Columns\IconColumn::make('status')
                    ->label('Статус')
                    ->boolean(),
                Tables\Columns\TextColumn::make('date')
                    ->label('Дата')
                    ->sortable()
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->relationship('category', 'label_ru'),
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
            ->defaultSort('id', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
