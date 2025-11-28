<?php

namespace App\Filament\Resources;

use App\Enums\RolesEnum;
use App\Filament\Resources\AwardResource\Pages;
use App\Models\Award;
use App\Models\AwardReward; // Не забудь импортировать модели!
use App\Models\AwardCategory;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get; // Для получения значений
use Filament\Forms\Set; // Для установки значений
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class AwardResource extends Resource
{
    protected static ?string $model = Award::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static ?int $navigationSort = 4;

    public static function getNavigationLabel(): string
    {
        return 'Награды';
    }

    public static function getPluralLabel(): ?string
    {
        return 'Награды';
    }

    public static function getModelLabel(): string
    {
        return 'награду';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Справочники';
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasAnyRole([RolesEnum::ADMIN, RolesEnum::DEVELOPMENT]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Основная информация')
                    ->schema([
                        // 1. ВЫБОР КАТЕГОРИИ
                        // Делаем его LIVE, чтобы обновлять список наград
                        Select::make('award_category_id')
                            ->label('Категория')
                            ->options(AwardCategory::pluck('name_ru', 'id')) // Берем список категорий
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live() // <--- ГЛАВНОЕ: Обновляет форму при изменении
                            ->afterStateUpdated(function (Set $set) {
                                // Если сменили категорию, сбрасываем выбранную награду
                                $set('award_reward_id', null);
                            })
                            ->createOptionForm([
                                TextInput::make('name_kk')->label('Название (KK)'),
                                TextInput::make('name_ru')->label('Название (RU)')->required(),
                                TextInput::make('name_en')->label('Название (EN)'),
                                TextInput::make('name_cn')->label('Название (CN)'),
                            ]),

                        // 2. ВЫБОР ВИДА НАГРАДЫ (Зависит от категории)
                        Select::make('award_reward_id')
                            ->label('Вид награды (Орден/Медаль)')
                            ->options(function (Get $get) {
                                $categoryId = $get('award_category_id'); // Смотрим, что выбрано выше

                                if ($categoryId) {
                                    // Показываем награды ТОЛЬКО этой категории
                                    return AwardReward::where('award_category_id', $categoryId)
                                        ->pluck('name_ru', 'id');
                                }

                                // Если категория не выбрана, показываем все (или пустой список)
                                return AwardReward::pluck('name_ru', 'id');
                            })
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                // При создании новой награды авто-подставляем категорию
                                Forms\Components\Hidden::make('award_category_id')
                                    ->default(fn (Get $get) => $get('award_category_id')),
                                TextInput::make('name_kk')->label('Название (KK)'),
                                TextInput::make('name_ru')->label('Название (RU)')->required(),
                                TextInput::make('name_en')->label('Название (EN)'),
                                TextInput::make('name_cn')->label('Название (CN)'),
                            ]),

                        // 3. ПЕРСОНАЛЬНЫЕ ДАННЫЕ
                        Tabs::make('Languages')
                            ->tabs([
                                Tabs\Tab::make('Казахский (KK)')
                                    ->schema([
                                        TextInput::make('fullname_kk')->label('Полное имя (KK)')->required(),
                                        Textarea::make('position_kk')->label('Должность (KK)'),
                                    ]),
                                Tabs\Tab::make('Русский (RU)')
                                    ->schema([
                                        TextInput::make('fullname_ru')->label('Полное имя (RU)')->required(),
                                        Textarea::make('position_ru')->label('Должность (RU)'),
                                    ]),
                                Tabs\Tab::make('Английский (EN)')
                                    ->schema([
                                        TextInput::make('fullname_en')->label('Полное имя (EN)'),
                                        Textarea::make('position_en')->label('Должность (EN)'),
                                    ]),
                                Tabs\Tab::make('Китайский (CN)')
                                    ->schema([
                                        TextInput::make('fullname_cn')->label('Полное имя (CN)'),
                                        Textarea::make('position_cn')->label('Должность (CN)'),
                                    ]),
                            ])->columnSpanFull(),
                    ]),

                Section::make('Дополнительные данные')
                    ->columns(3)
                    ->schema([
                        TextInput::make('year')
                            ->label('Год получения')
                            ->numeric()
                            ->required()
                            ->minValue(1900)
                            ->maxValue(date('Y') + 1),

                        TextInput::make('sort')
                            ->label('Сортировка')
                            ->numeric()
                            ->default(100)
                            ->required(),

                        FileUpload::make('image')
                            ->label('Изображение')
                            ->directory('awards')
                            ->image()
                            ->imageEditor()
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Картинка HTML кодом (как ты просил)
                TextColumn::make('image')
                    ->label('Фото')
                    ->formatStateUsing(function ($state, Award $record) {
                        $url = $record->getImageUrl();
                        
                        if ($url) {
                            return "<div style='display:flex; justify-content:center;'>
                                        <img src='{$url}' style='width:50px; height:50px; object-fit:cover; border-radius:50%; box-shadow: 0 1px 3px rgba(0,0,0,0.1);'>
                                    </div>";
                        }
                        
                        return '—';
                    })
                    ->html()
                    ->alignCenter(),

                // Категорию берем через связь награды (так надежнее)
                TextColumn::make('rewardData.category.name_ru')
                    ->label('Категория')
                    ->sortable()
                    ->searchable(),

                // Награда через связь
                TextColumn::make('rewardData.name_ru')
                    ->label('Награда')
                    ->sortable()
                    ->searchable()
                    ->limit(40),

                TextColumn::make('fullname_ru')
                    ->label('Получатель')
                    ->searchable()
                    ->sortable()
                    ->limit(30),

                TextColumn::make('year')
                    ->label('Год')
                    ->sortable(),

                TextColumn::make('sort')
                    ->label('Сорт.')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Фильтры оставляем, они полезны
                Tables\Filters\SelectFilter::make('award_category_id')
                    ->label('Категория')
                    ->relationship('category', 'name_ru'),

                Tables\Filters\SelectFilter::make('award_reward_id')
                    ->label('Вид награды')
                    ->relationship('rewardData', 'name_ru')
                    ->searchable(),
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
            ->defaultSort('year', 'desc');
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
            'index' => Pages\ListAwards::route('/'),
            'create' => Pages\CreateAward::route('/create'),
            'edit' => Pages\EditAward::route('/{record}/edit'),
        ];
    }
}