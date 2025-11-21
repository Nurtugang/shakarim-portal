<?php

namespace App\Filament\Resources;

use App\Enums\RolesEnum;
use App\Filament\Resources\EducationalProgramResource\Pages;
use App\Filament\Resources\EducationalProgramResource\RelationManagers;
use App\Models\EducationalProgram;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Enums\EducationLevelEnum;
use App\Models\EducationalProgramGroup;
use App\Models\DirectionClassification;
use App\Models\EducationField;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class EducationalProgramResource extends Resource
{
    protected static ?string $model = EducationalProgram::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Образование';
    protected static ?int $navigationSort = 4;
    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::EDUCATION]);
    }

    public static function getModelLabel(): string
    {
        return 'Образовательная программа';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Образовательные программы';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Связи и код')
                ->schema([
                    Select::make('program_group_id')
                        ->label('Группа ОП')
                        ->options(EducationalProgramGroup::query()->pluck('name_ru','id'))
                        ->searchable()
                        ->nullable(),
                    TextInput::make('code')->label('Код программы')->required()->maxLength(50),
                    Select::make('education_level')
                        ->label('Уровень обучения')
                        ->options([
                            EducationLevelEnum::BACHELOR->value => 'Бакалавриат',
                            EducationLevelEnum::MASTER->value => 'Магистратура',
                            EducationLevelEnum::DOCTORATE->value => 'Докторантура',
                        ])->required(),
                ]),
            Section::make('Название программы')
                ->schema([
                    Tabs::make('Название')
                        ->tabs([
                            Tabs\Tab::make('Русский')->schema([
                                TextInput::make('name_ru')->label('Название (RU)')->required()->maxLength(255),
                            ]),
                            Tabs\Tab::make('Казахский')->schema([
                                TextInput::make('name_kk')->label('Атауы (KK)')->required()->maxLength(255),
                            ]),
                            Tabs\Tab::make('Английский')->schema([
                                TextInput::make('name_en')->label('Name (EN)')->required()->maxLength(255),
                            ]),
                        ])->columnSpanFull(),
                ]),
            Section::make('Статус аккредитации')
                ->schema([
                    Tabs::make('Аккредитация')
                        ->tabs([
                            Tabs\Tab::make('Русский')->schema([
                                TextInput::make('accreditation_status_ru')->label('Статус (RU)')->maxLength(255),
                            ]),
                            Tabs\Tab::make('Казахский')->schema([
                                TextInput::make('accreditation_status_kk')->label('Статус (KK)')->maxLength(255),
                            ]),
                            Tabs\Tab::make('Английский')->schema([
                                TextInput::make('accreditation_status_en')->label('Status (EN)')->maxLength(255),
                            ]),
                        ])->columnSpanFull(),
                    TextInput::make('epvo_url')->label('Ссылка EPVO')->url()->maxLength(255)->columnSpanFull(),
                ]),
            Section::make('Файлы аккредитации')
                ->description('Загрузите документы аккредитации (необязательно)')
                ->schema([
                    \Filament\Forms\Components\FileUpload::make('accreditation_file_kk')
                        ->label('Документ аккредитации (KK)')
                        ->acceptedFileTypes(['application/pdf'])
                        ->directory('educational_programs/accreditation')
                        ->disk('public')
                        ->visibility('public'),
                    \Filament\Forms\Components\FileUpload::make('accreditation_file_ru')
                        ->label('Документ аккредитации (RU)')
                        ->acceptedFileTypes(['application/pdf'])
                        ->directory('educational_programs/accreditation')
                        ->disk('public')
                        ->visibility('public'),
                    \Filament\Forms\Components\FileUpload::make('accreditation_file_en')
                        ->label('Документ аккредитации (EN)')
                        ->acceptedFileTypes(['application/pdf'])
                        ->directory('educational_programs/accreditation')
                        ->disk('public')
                        ->visibility('public'),
                    Toggle::make('is_active')->label('Активна')->default(true),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('ID'),
                TextColumn::make('code')->label('Код')->searchable()->sortable(),
                TextColumn::make('name_ru')->label('Название (RU)')->searchable()->sortable(),
                TextColumn::make('programGroup.name_ru')->label('Группа')->sortable()->toggleable(),
                TextColumn::make('education_level')->label('Уровень')->formatStateUsing(fn($state) => match($state){
                    EducationLevelEnum::BACHELOR->value => 'Бакалавриат',
                    EducationLevelEnum::MASTER->value => 'Магистратура',
                    EducationLevelEnum::DOCTORATE->value => 'Докторантура',
                    default => $state,
                })->sortable(),
                TextColumn::make('accreditation_status_ru')->label('Аккредитация (RU)')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('epvo_url')->label('EPVO')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('accreditation_file_ru')->label('Файл аккредитации')->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_active')->boolean()->label('Активна'),
            ])
            ->filters([
                SelectFilter::make('education_level')->label('Уровень')
                    ->options([
                        EducationLevelEnum::BACHELOR->value => 'Бакалавриат',
                        EducationLevelEnum::MASTER->value => 'Магистратура',
                        EducationLevelEnum::DOCTORATE->value => 'Докторантура',
                    ]),
                SelectFilter::make('program_group_id')->label('Группа')->options(EducationalProgramGroup::query()->pluck('name_ru','id')),
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make()->label('Редактировать'),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\BulkActionGroup::make([
                    \Filament\Tables\Actions\DeleteBulkAction::make()->label('Удалить'),
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
            'index' => Pages\ListEducationalPrograms::route('/'),
            'create' => Pages\CreateEducationalProgram::route('/create'),
            'edit' => Pages\EditEducationalProgram::route('/{record}/edit'),
        ];
    }
}
