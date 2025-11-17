<?php

namespace App\Filament\Resources\Student;

use App\Enums\RolesEnum;
use App\Filament\Resources\Student\StudentParlamentResource\Pages;
use App\Models\Student\StudentParlament;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class StudentParlamentResource extends Resource
{
    protected static ?string $model = StudentParlament::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Campus Life';

    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return 'Студенческий парламент';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Студенческий парламент';
    }

    public static function getModelLabel(): string
    {
        return 'участник парламента';
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::CAMPUS_LIFE]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Информация об участнике')
                    ->schema([
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
                                        TextInput::make('fullname_kk')->label('ФИО (KK)'),
                                        TextInput::make('faculty_kk')->label('Факультет (KK)'),
                                        TextInput::make('position_kk')->label('Должность (KK)'),
                                    ]),
                                Tabs\Tab::make('Английский')
                                    ->schema([
                                        TextInput::make('fullname_en')->label('ФИО (EN)'),
                                        TextInput::make('faculty_en')->label('Факультет (EN)'),
                                        TextInput::make('position_en')->label('Должность (EN)'),
                                    ]),
                            ])
                            ->columnSpanFull(),
                    ]),
                Section::make('Контактные данные')
                    ->schema([
                        TextInput::make('phone')->label('Телефон')->tel(),
                        FileUpload::make('image')
                            ->label('Фото')
                            ->directory('student_parlament')
                            ->image()
                            ->imageEditor(),
                        TextInput::make('sort')->numeric()->label('Сортировка')->default(0),
                        TextInput::make('status')->numeric()->label('Статус')->default(1),
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
                    ->formatStateUsing(function ($state, StudentParlament $record) {
                        if ($state) {
                            $url = $record->getImageUrl();
                            return "<img src='{$url}' style='width:50px; height:50px; object-fit:cover; border-radius:4px'>";
                        }
                        return '—';
                    })
                    ->html(),

                TextColumn::make('fullname_ru')
                    ->label('ФИО')
                    ->searchable()
                    ->limit(50),

                TextColumn::make('position_ru')
                    ->label('Должность')
                    ->limit(50),

                TextColumn::make('faculty_ru')
                    ->label('Факультет')
                    ->limit(50),

                TextColumn::make('phone')->label('Телефон'),

                TextColumn::make('status')
                    ->label('Статус')
                    ->formatStateUsing(fn ($state) => $state ? 'Активен' : 'Неактивен'),

                TextColumn::make('sort')->label('Сортировка'),

                TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort', 'asc')
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
            'index' => Pages\ListStudentParlaments::route('/'),
            'create' => Pages\CreateStudentParlament::route('/create'),
            'edit' => Pages\EditStudentParlament::route('/{record}/edit'),
        ];
    }
}
