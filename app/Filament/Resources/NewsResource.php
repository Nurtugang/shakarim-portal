<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Новости';

    protected static ?string $modelLabel = 'Новость';

    protected static ?string $pluralModelLabel = 'Новости';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                ->schema([
                Tabs::make('')
                ->tabs([
                    Tabs\Tab::make('kz')
                    ->schema([
                        Forms\Components\TextInput::make('title_kk')
                          ->required()
                          ->maxLength(255),
                        TiptapEditor::make('content_kk')
                          ->required()
                          ->columnSpanFull(),
                    ]),
                        Tabs\Tab::make('ru')
                          ->schema([
                            Forms\Components\TextInput::make('title_ru')
                               ->required()
                               ->maxLength(255),
                            TiptapEditor::make('content_ru')
                               ->required()
                               ->columnSpanFull(),
                    ]),
                    Tabs\Tab::make('en')
                    ->schema([
                        Forms\Components\TextInput::make('title_en')
                          ->maxLength(255),
                        TiptapEditor::make('content_en')
                          ->columnSpanFull(),
                    ])
                    ]),
                Forms\Components\TextInput::make('meta_title')
                    ->maxLength(255),
                Forms\Components\Textarea::make('meta_description')
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('published_at'),
                Forms\Components\Toggle::make('active')
                    ->default(1),
                ])->columnSpan(8),

                Section::make('')
                    ->schema([
                        Forms\Components\FileUpload::make('thumbnail')
                          ->required()
                          ->acceptedFileTypes(['image/png','image/svg','image/jpg','image/jpeg','image/webp'])
                          ->maxSize(6024)
                          ->directory('news')
                          ->label('Картинка'),
                        Forms\Components\FileUpload::make('gallery')
                          ->acceptedFileTypes(['image/png','image/svg','image/jpg','image/jpeg','image/webp'])
                          ->multiple()
                          ->maxSize(6024)
                          ->label('Галерея')
                          ->directory('news_gallery'),
                    ])->columnSpan(4)
                
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_ru')
                    ->searchable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultSort('created_at','desc');
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
