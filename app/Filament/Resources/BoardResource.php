<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoardResource\Pages;
use App\Models\Board;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use FilamentTiptapEditor\TiptapEditor;
use FilamentTiptapEditor\Enums\TiptapOutput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;
use App\Enums\RolesEnum;

class BoardResource extends Resource
{
    protected static ?string $model = Board::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Справочники';
    protected static ?int $navigationSort = 5;

    public static function getModelLabel(): string
    {
        return 'Член корпоративного управления';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Корпоративное управление';
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasAnyRole([RolesEnum::ADMIN]);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Основная информация')->schema([
                Select::make('category_id')
                    ->label('Категория')
                    ->relationship('category', 'title_ru')
                    ->required()
                    ->columnSpanFull(),
                Tabs::make('ФИО')
                    ->tabs([
                        Tabs\Tab::make('Русский')
                            ->schema([
                                TextInput::make('fullname_ru')->label('ФИО (RU)'),
                                TextInput::make('position_ru')->label('Должность (RU)'),
                            ]),
                        Tabs\Tab::make('Казахский')
                            ->schema([
                                TextInput::make('fullname_kk')->label('ФИО (KK)'),
                                TextInput::make('position_kk')->label('Должность (KK)'),
                            ]),
                        Tabs\Tab::make('Английский')
                            ->schema([
                                TextInput::make('fullname_en')->label('Fullname (EN)'),
                                TextInput::make('position_en')->label('Position (EN)'),
                            ]),
                        Tabs\Tab::make('Китайский')
                            ->schema([
                                TextInput::make('fullname_cn')->label('姓名 (CN)'),
                                TextInput::make('position_cn')->label('职位 (CN)'),
                            ]),
                    ])->columnSpanFull(),

                FileUpload::make('photo')
                    ->label('Фото')
                    ->directory('board_directors')
                    ->image(),
                
            ])->columns(1),

            Section::make('Контент 1 (Верхняя часть)')->schema([
                Tabs::make('Content')
                    ->tabs([
                        Tabs\Tab::make('Русский')->schema([
                            TiptapEditor::make('content_ru')
                                ->label('')
                                ->output(TiptapOutput::Html)
                                ->profile('default'),
                        ]),
                        Tabs\Tab::make('Казахский')->schema([
                            TiptapEditor::make('content_kk')
                                ->label('')
                                ->output(TiptapOutput::Html)
                                ->profile('default'),
                        ]),
                        Tabs\Tab::make('Английский')->schema([
                            TiptapEditor::make('content_en')
                                ->label('')
                                ->output(TiptapOutput::Html)
                                ->profile('default'),
                        ]),
                        Tabs\Tab::make('Китайский')->schema([
                            TiptapEditor::make('content_cn')
                                ->label('')
                                ->output(TiptapOutput::Html)
                                ->profile('default'),
                        ]),
                    ])->columnSpanFull(),
            ])->collapsible(), // Added collapsible for better UI

            Section::make('Контент 2 (Колонки, Первая колонка)')->schema([
                Tabs::make('Content 2')
                    ->tabs([
                        Tabs\Tab::make('Русский')->schema([
                            TiptapEditor::make('content2_ru')
                                ->label('')
                                ->output(TiptapOutput::Html)
                                ->profile('default'),
                        ]),
                        Tabs\Tab::make('Казахский')->schema([
                            TiptapEditor::make('content2_kk')
                                ->label('')
                                ->output(TiptapOutput::Html)
                                ->profile('default'),
                        ]),
                        Tabs\Tab::make('Английский')->schema([
                            TiptapEditor::make('content2_en')
                                ->label('')
                                ->output(TiptapOutput::Html)
                                ->profile('default'),
                        ]),
                        Tabs\Tab::make('Китайский')->schema([
                            TiptapEditor::make('content2_cn')
                                ->label('')
                                ->output(TiptapOutput::Html)
                                ->profile('default'),
                        ]),
                    ])->columnSpanFull(),
            ])->collapsible()->collapsed(),

            Section::make('Контент 3 (Колонки, Вторая колонка)')->schema([
                Tabs::make('Content 3')
                    ->tabs([
                        Tabs\Tab::make('Русский')->schema([
                            TiptapEditor::make('content3_ru')
                                ->label('')
                                ->output(TiptapOutput::Html)
                                ->profile('default'),
                        ]),
                        Tabs\Tab::make('Казахский')->schema([
                            TiptapEditor::make('content3_kk')
                                ->label('')
                                ->output(TiptapOutput::Html)
                                ->profile('default'),
                        ]),
                        Tabs\Tab::make('Английский')->schema([
                            TiptapEditor::make('content3_en')
                                ->label('')
                                ->output(TiptapOutput::Html)
                                ->profile('default'),
                        ]),
                        Tabs\Tab::make('Китайский')->schema([
                            TiptapEditor::make('content3_cn')
                                ->label('')
                                ->output(TiptapOutput::Html)
                                ->profile('default'),
                        ]),
                    ])->columnSpanFull(),
            ])->collapsible()->collapsed(), // Collapsed by default
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo_url')
                    ->label('Фото')
                    ->circular(),

                TextColumn::make('fullname_ru')
                    ->label('ФИО')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('position_ru')
                    ->label('Должность'),

                TextColumn::make('category.title_ru')
                    ->label('Категория')
                    ->sortable(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBoards::route('/'),
            'create' => Pages\CreateBoard::route('/create'),
            'edit' => Pages\EditBoard::route('/{record}/edit'),
        ];
    }
}