<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoardCategoryResource\Pages;
use App\Models\BoardCategory;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use FilamentTiptapEditor\TiptapEditor;
use FilamentTiptapEditor\Enums\TiptapOutput;
use Illuminate\Support\Facades\Auth;
use App\Enums\RolesEnum;

class BoardCategoryResource extends Resource
{
    protected static ?string $model = BoardCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Справочники';
    protected static ?int $navigationSort = 6;

    public static function canViewAny(): bool
    {
        return Auth::user()->hasAnyRole([RolesEnum::ADMIN]);
    }

    public static function getModelLabel(): string
    {
        return 'Категория управления';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Категории управления';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Основная информация')
                    ->schema([
                        Tabs::make('Название категории')
                            ->tabs([
                                Tabs\Tab::make('Русский')
                                    ->schema([
                                        TextInput::make('title_ru')->label('Название (RU)')->required(),
                                    ]),
                                Tabs\Tab::make('Казахский')
                                    ->schema([
                                        TextInput::make('title_kk')->label('Название (KK)'),
                                    ]),
                                Tabs\Tab::make('Английский')
                                    ->schema([
                                        TextInput::make('title_en')->label('Title (EN)'),
                                    ]),
                                Tabs\Tab::make('Китайский')
                                    ->schema([
                                        TextInput::make('title_cn')->label('标题 (CN)'),
                                    ]),
                            ])->columnSpanFull(),

                        TextInput::make('icon_class')
                            ->label('Font Awesome класс иконки')
                            ->helperText('Например: fas fa-users-cog или fas fa-shield-alt. Оставьте пустым, если иконка не нужна.')
                            ->columnSpanFull(),
                    ]),

                Section::make('Дополнительный контент')
                    ->description('Этот блок будет показан под списком сотрудников в данной категории. Оставьте пустым, если блок не нужен.')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Tabs::make('Content')
                            ->tabs([
                                Tabs\Tab::make('Русский')->schema([
                                    TiptapEditor::make('additional_content_ru')
                                        ->label('')
                                        ->profile('default')
                                        ->output(TiptapOutput::Html),
                                ]),
                                Tabs\Tab::make('Казахский')->schema([
                                    TiptapEditor::make('additional_content_kk')
                                        ->label('')
                                        ->profile('default')
                                        ->output(TiptapOutput::Html),
                                ]),
                                Tabs\Tab::make('Английский')->schema([
                                    TiptapEditor::make('additional_content_en')
                                        ->label('')
                                        ->profile('default')
                                        ->output(TiptapOutput::Html),
                                ]),
                                Tabs\Tab::make('Китайский')->schema([
                                    TiptapEditor::make('additional_content_cn')
                                        ->label('')
                                        ->profile('default')
                                        ->output(TiptapOutput::Html),
                                ]),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('title_ru')
                    ->label('Название на русском')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('icon_class')
                    ->label('Класс иконки')
                    ->fontFamily('mono'),
                TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\BulkActionGroup::make([
                    \Filament\Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBoardCategories::route('/'),
            'create' => Pages\CreateBoardCategory::route('/create'),
            'edit' => Pages\EditBoardCategory::route('/{record}/edit'),
        ];
    }
}