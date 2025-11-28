<?php

namespace App\Filament\Resources\CampusLife;

use App\Enums\RolesEnum;
use App\Filament\Resources\CampusLife\StudentBoardResource\Pages;
use App\Models\Student\StudentBoard;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class StudentBoardResource extends Resource
{
    protected static ?string $model = StudentBoard::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Campus Life';

    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return 'Студенческое самоуправление';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Участники самоуправления';
    }

    public static function getModelLabel(): string
    {
        return 'участник';
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::CAMPUS_LIFE]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Основная информация')
                    ->schema([
                        // Выбор категории
                        Select::make('category_id')
                            ->label('Орган самоуправления')
                            ->relationship('category', 'name_ru')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->default(1)
                            ->columnSpanFull(),

                        Tabs::make('Языки')
                            ->tabs([
                                Tabs\Tab::make('Русский')
                                    ->schema([
                                        TextInput::make('fullname_ru')->label('ФИО (RU)')->required(),
                                        TextInput::make('faculty_ru')->label('Факультет (RU)')->required(),
                                        TextInput::make('position_ru')->label('Должность (RU)')->required(),
                                    ]),
                                Tabs\Tab::make('Казахский')
                                    ->schema([
                                        TextInput::make('fullname_kk')->label('ФИО (KK)')->required(),
                                        TextInput::make('faculty_kk')->label('Факультет (KK)')->required(),
                                        TextInput::make('position_kk')->label('Должность (KK)')->required(),
                                    ]),
                                Tabs\Tab::make('Английский')
                                    ->schema([
                                        TextInput::make('fullname_en')->label('ФИО (EN)')->required(),
                                        TextInput::make('faculty_en')->label('Факультет (EN)')->required(),
                                        TextInput::make('position_en')->label('Должность (EN)')->required(),
                                    ]),
                            ])
                            ->columnSpanFull(),
                    ]),
                Section::make('Контактные данные')
                    ->schema([
                        TextInput::make('phone')->label('Телефон')->tel(),
                        FileUpload::make('image')
                            ->label('Фото')
                            ->directory('student_board')
                            ->image()
                            ->imageEditor(),
                        TextInput::make('sort')->numeric()->label('Сортировка')->default(0),
                        TextInput::make('status')
                            ->label('Статус')
                            ->default(1)
                            ->formatStateUsing(fn ($state) => $state ? 1 : 0),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),

                TextColumn::make('image')
                    ->label('Фото')
                    ->formatStateUsing(function ($state, StudentBoard $record) {
                        if ($state) {
                            $url = $record->getImageUrl();
                            return "<img src='{$url}' style='width:50px; height:50px; object-fit:cover; border-radius:4px'>";
                        }
                        return '—';
                    })
                    ->html(),

                // Колонка категории
                TextColumn::make('category.name_ru')
                    ->label('Орган')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('fullname_ru')
                    ->label('ФИО')
                    ->searchable()
                    ->limit(30),

                TextColumn::make('position_ru')
                    ->label('Должность')
                    ->limit(30),

                TextColumn::make('status')
                    ->label('Статус')
                    ->formatStateUsing(fn ($state) => $state ? 'Активен' : 'Неактивен'),

                TextColumn::make('sort')->label('Сорт.'),
            ])
            ->defaultSort('category_id', 'asc')
            ->filters([
                // Фильтр по категории
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Орган')
                    ->relationship('category', 'name_ru'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudentBoard::route('/'),
            'create' => Pages\CreateStudentBoard::route('/create'),
            'edit' => Pages\EditStudentBoard::route('/{record}/edit'),
        ];
    }
}