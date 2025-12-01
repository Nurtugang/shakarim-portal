<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseContentResource\Pages;
use App\Models\CourseContent;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Enums\RolesEnum;
use Illuminate\Support\Facades\Auth;

class CourseContentResource extends Resource
{
    protected static ?string $model = CourseContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Курсы повышения квалификации';
    protected static ?string $navigationLabel = 'Контент страниц';
    protected static ?int $navigationSort = 2;

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::COURSE]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Служебная информация')
                    ->schema([
                        TextInput::make('key')
                            ->label('Системный ключ')
                            ->disabled()
                            ->dehydrated(false),
                    ]),

                Tabs::make('Локализация')
                    ->tabs([
                        Tabs\Tab::make('Русский (RU)')
                            ->schema([
                                TextInput::make('title_ru')->label('Заголовок (RU)')->required(),
                                RichEditor::make('content_ru')
                                    ->label('Текст (RU)')
                                    ->fileAttachmentsDirectory('courses/content')
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Казахский (KK)')
                            ->schema([
                                TextInput::make('title_kk')->label('Заголовок (KK)'),
                                RichEditor::make('content_kk')->label('Текст (KK)'),
                            ]),
                        Tabs\Tab::make('Английский (EN)')
                            ->schema([
                                TextInput::make('title_en')->label('Заголовок (EN)'),
                                RichEditor::make('content_en')->label('Текст (EN)'),
                            ]),
                        Tabs\Tab::make('Китайский (CN)')
                            ->schema([
                                TextInput::make('title_cn')->label('Заголовок (CN)'),
                                RichEditor::make('content_cn')->label('Текст (CN)'),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title_ru')
                    ->label('Название блока')
                    ->sortable()
                    ->description(fn (CourseContent $record) => $record->key),
                
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Последнее обновление'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourseContents::route('/'),
            'edit' => Pages\EditCourseContent::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}