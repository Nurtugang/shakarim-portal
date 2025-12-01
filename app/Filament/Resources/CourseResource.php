<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use App\Enums\RolesEnum;
use Illuminate\Support\Facades\Auth;


class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Курсы повышения квалификации';
    protected static ?string $navigationLabel = 'Курсы';
    protected static ?int $navigationSort = 1;

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::COURSE]);
    }

    public static function getPluralLabel(): ?string
    {
        return 'Курсы';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Основная информация')
                    ->columns(2)
                    ->schema([
                        TextInput::make('hours')
                            ->label('Часы (акад.)')
                            ->required()
                            ->maxLength(50),
                        TextInput::make('form')
                            ->label('Форма обучения')
                            ->placeholder('Например: офлайн / онлайн')
                            ->maxLength(255),
                        
                        FileUpload::make('filename')
                            ->label('Файл (PDF/DOC)')
                            ->directory('courses/documents')
                            ->downloadable()
                            ->columnSpanFull(),
                    ]),

                Tabs::make('Languages')
                    ->tabs([
                        Tabs\Tab::make('Русский (RU)')
                            ->schema([
                                TextInput::make('name_ru')->label('Название')->required(),
                                // Tiptap Editor
                                TiptapEditor::make('text_ru')
                                    ->label('Описание')
                                    ->directory('courses/images'),
                            ]),
                        Tabs\Tab::make('Казахский (KK)')
                            ->schema([
                                TextInput::make('name_kk')->label('Название'),
                                // Tiptap Editor
                                TiptapEditor::make('text_kk')
                                    ->label('Описание')
                                    ->directory('courses/images'),
                            ]),
                        Tabs\Tab::make('Английский (EN)')
                            ->schema([
                                TextInput::make('name_en')->label('Название'),
                                // Tiptap Editor
                                TiptapEditor::make('text_en')
                                    ->label('Описание')
                                    ->directory('courses/images'),
                            ]),
                        Tabs\Tab::make('Китайский (CN)')
                            ->schema([
                                TextInput::make('name_cn')->label('Название'),
                                // Tiptap Editor
                                TiptapEditor::make('text_cn')
                                    ->label('Описание')
                                    ->directory('courses/images'),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name_ru')
                    ->label('Название')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                
                TextColumn::make('hours')
                    ->label('Часы')
                    ->width('100px'),

                TextColumn::make('form')
                    ->label('Форма')
                    ->badge(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}