<?php

namespace App\Filament\Resources;

use App\Enums\RolesEnum;
use App\Filament\Resources\ScientificProjectResource\Pages;
use App\Models\Science\ScientificProject;
use App\Models\Science\ScienceMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScientificProjectResource extends Resource
{
    protected static ?string $model = ScientificProject::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker'; // Иконка колбы, подходит для науки

    protected static ?string $navigationLabel = 'Научные проекты';

    protected static ?string $modelLabel = 'Научный проект';



    protected static ?string $pluralModelLabel = 'Научные проекты';

    protected static ?string $navigationGroup = 'Наука'; // Группируем в меню

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::SCIENCE]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Общая информация')
                    ->schema([
                        Forms\Components\TextInput::make('years')
                            ->label('Годы реализации')
                            ->placeholder('Например, 2022-2024')
                            ->required()
                            ->maxLength(10),
                        Forms\Components\TextInput::make('month')
                            ->label('Длительность (месяцев)')
                            ->required()
                            ->numeric()
                            ->maxLength(5),
                        Forms\Components\TextInput::make('category_id')
                            ->label('ID Категории')
                            ->required()
                            ->numeric()
                            ->default(1),
                    ])->columns(3),

                Forms\Components\Tabs::make('Локализация')->tabs([
                    Forms\Components\Tabs\Tab::make('Казахский (KK)')
                        ->schema([
                            Forms\Components\TextInput::make('name_kk')
                                ->label('Название проекта')
                                ->required()->columnSpanFull(),
                            Forms\Components\TextInput::make('supervisor_kk')
                                ->label('Руководитель проекта')
                                ->required()->columnSpanFull(),
                            TiptapEditor::make('relevance_kk')
                                ->label('Өзектілігі / Актуальность')
                                ->required()->columnSpanFull(),
                            TiptapEditor::make('target_kk')
                                ->label('Мақсаты / Цель')
                                ->required()->columnSpanFull(),
                            TiptapEditor::make('expectation_kk')
                                ->label('Күтілетін нәтиже / Ожидаемый результат')
                                ->required()->columnSpanFull(),
                            TiptapEditor::make('result_kk')
                                ->label('Қол жеткізілген нәтиже / Достигнутый результат')
                                ->required()->columnSpanFull(),
                        ]),
                    Forms\Components\Tabs\Tab::make('Русский (RU)')
                        ->schema([
                            Forms\Components\TextInput::make('name_ru')
                                ->label('Название проекта')
                                ->required()->columnSpanFull(),
                            Forms\Components\TextInput::make('supervisor_ru')
                                ->label('Руководитель проекта')
                                ->required()->columnSpanFull(),
                            TiptapEditor::make('relevance_ru')
                                ->label('Актуальность')
                                ->required()->columnSpanFull(),
                            TiptapEditor::make('target_ru')
                                ->label('Цель')
                                ->required()->columnSpanFull(),
                            TiptapEditor::make('expectation_ru')
                                ->label('Ожидаемый результат')
                                ->required()->columnSpanFull(),
                            TiptapEditor::make('result_ru')
                                ->label('Достигнутый результат')
                                ->required()->columnSpanFull(),
                        ]),
                    Forms\Components\Tabs\Tab::make('Английский (EN)')
                        ->schema([
                            Forms\Components\TextInput::make('name_en')
                                ->label('Project Name')
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('supervisor_en')
                                ->label('Project Supervisor')
                                ->columnSpanFull(),
                            TiptapEditor::make('relevance_en')
                                ->label('Relevance')
                                ->columnSpanFull(),
                            TiptapEditor::make('target_en')
                                ->label('Target')
                                ->columnSpanFull(),
                            TiptapEditor::make('expectation_en')
                                ->label('Expected Result')
                                ->required()->columnSpanFull(), // По схеме БД это поле NOT NULL
                            TiptapEditor::make('result_en')
                                ->label('Achieved Result')
                                ->columnSpanFull(),
                        ]),
                ])->columnSpanFull(),

                Forms\Components\Section::make('Участники проекта')
                    ->schema([
                        Forms\Components\Repeater::make('members')
                            ->relationship()
                            ->label('Список участников')
                            ->schema([
                                Forms\Components\TextInput::make('fullname')
                                    ->label('ФИО участника')
                                    ->required()
                                    ->columnSpanFull(),

                                Forms\Components\Grid::make(3)->schema([
                                    Forms\Components\TextInput::make('scopusid')
                                        ->label('Scopus ID'),
                                    Forms\Components\TextInput::make('researcherid')
                                        ->label('Researcher ID'),
                                    Forms\Components\TextInput::make('orcid')
                                        ->label('ORCID'),
                                ]),

                                Forms\Components\Tabs::make('Дополнительная информация')
                                    ->tabs([
                                        Forms\Components\Tabs\Tab::make('KK')
                                            ->schema([
                                                TiptapEditor::make('additionally_kk')
                                                    ->label('Қосымша ақпарат')
                                                    ->columnSpanFull(),
                                            ]),
                                        Forms\Components\Tabs\Tab::make('RU')
                                            ->schema([
                                                TiptapEditor::make('additionally_ru')
                                                    ->label('Дополнительная информация')
                                                    ->columnSpanFull(),
                                            ]),
                                        Forms\Components\Tabs\Tab::make('EN')
                                            ->schema([
                                                TiptapEditor::make('additionally_en')
                                                    ->label('Additional information')
                                                    ->columnSpanFull(),
                                            ]),
                                    ])->columnSpanFull(),
                            ])
                            ->addActionLabel('Добавить участника')
                            ->collapsible()
                            ->cloneable()
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_ru')
                    ->label('Название (РУС)')
                    ->searchable()
                    ->sortable()
                    ->limit(40)
                    ->tooltip(fn (ScientificProject $record): string => $record->name_ru),
                Tables\Columns\TextColumn::make('supervisor_ru')
                    ->label('Руководитель (РУС)')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('years')
                    ->label('Годы')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('years')
                    ->label('Фильтр по годам')
                    ->options(ScientificProject::getUniqueYears())
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
            ->defaultSort('years', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListScientificProjects::route('/'),
            'create' => Pages\CreateScientificProject::route('/create'),
            'edit' => Pages\EditScientificProject::route('/{record}/edit'),
        ];
    }

    public function members(): HasMany
    {
        return $this->hasMany(ScienceMember::class, 'project_id');
    }
}