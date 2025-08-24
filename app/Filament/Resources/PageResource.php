<?php

namespace App\Filament\Resources;

use App\Enums\ListViewType;
use App\Enums\RolesEnum;
use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Filament\Resources\PageResource\RelationManagers\FilesRelationManager;
use App\Filament\Resources\PageResource\RelationManagers\ListsRelationManager;
use App\Filament\Resources\PageResource\RelationManagers\RequestsRelationManager;
use App\Models\Menu;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Страницы';

    protected static ?string $modelLabel = 'Страница';

    protected static ?string $pluralModelLabel = 'Страницы';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                ->schema([
                    Tabs::make('Tabs')
                      ->tabs([
                        Tabs\Tab::make('kz')
                        ->schema([
                            Forms\Components\TextInput::make('title_kk')
                            ->label('Заголовок(kz)')
                            ->required()
                            ->maxLength(255)
                            ->reactive()
                            ->debounce(500),
                        TiptapEditor::make('content_kk')
                        ->output(TiptapOutput::Json)
                        ->label('Контент(kz)')
                               ->required()
                               ->directory('/pages')
                               ->columnSpanFull()
                        
    ]),
                        Tabs\Tab::make('ru')
                        ->schema([
                            Forms\Components\TextInput::make('title_ru')
                            ->label('Заголовок(ru)')
                            ->required()
                            ->maxLength(255),
                        TiptapEditor::make('content_ru')
                        ->output(TiptapOutput::Json)
                        ->label('Контнет(ru)')
                                   ->required()
                                   ->directory('/pages')
                                   ->columnSpanFull(),
                                   Forms\Components\Actions::make([
                                    Forms\Components\Actions\Action::make('copy_content_from_kk')
                                        ->label('Скопировать с казахского')
                                        ->action(fn ($get, $set) => $set('content_ru', $get('content_kk')))
                                ]), 
                        ]),
                        Tabs\Tab::make('en')
                        ->schema([
                            Forms\Components\TextInput::make('title_en')
                            ->label('Заголовок(en)')
                            ->required()
                            ->maxLength(255),
                        TiptapEditor::make('content_en')
                        ->output(TiptapOutput::Json)
                        ->label('Контнет(en)')
                            ->required()
                            ->directory('/pages')
                            ->columnSpanFull(),
                            Forms\Components\Actions::make([
                                Forms\Components\Actions\Action::make('copy_content_from_ru')
                                    ->label('Скопировать с русского')
                                    ->action(fn ($get, $set) => $set('content_en', $get('content_ru')))
                            ]), 
                        ]),
                        Tabs\Tab::make('Форма')
                                    ->schema([
                                        Group::make()
                                        ->relationship('formSchema',condition: fn (?array $state): bool => filled($state['title_kk']))
                                        ->schema([
                                            Grid::make()
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_kk')
                                                            ->label('Название формы(kz)')
                                                            ->maxLength(255),
                                                        Forms\Components\TextInput::make('title_ru')
                                                            ->requiredWith('title_kk')
                                                            ->label('Название формы(ru)')
                                                            ->maxLength(255),
                                                        Forms\Components\TextInput::make('title_en')
                                                            ->requiredWith('title_kk')
                                                            ->label('Название формы(en)')
                                                            ->maxLength(255),
                                                    ])->columns(3),
                                                    Forms\Components\Repeater::make('form_schema')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('name_kk')
                                                            ->requiredWith('title_kk')
                                                            ->label('Название поля(kz)'),
                                                        Forms\Components\TextInput::make('name_ru')
                                                            ->requiredWith('title_kk')
                                                            ->label('Название поля(ru)'),
                                                        Forms\Components\TextInput::make('name_en')
                                                            ->requiredWith('title_kk')
                                                            ->label('Название поля(en)'),
                                                        Forms\Components\Select::make('type')
                                                            ->options([
                                                                'text' => 'Текст',
                                                                'textarea' => 'Строка',
                                                                'email' => 'Email',
                                                                'tel' => 'Телефон',
                                                                'file' => 'Файл',
                                                            ])
                                                            ->requiredWith('title_kk')
                                                            ->label('Тип поля'),
                                                        Forms\Components\TextInput::make('key')
                                                            ->requiredWith('title_kk')
                                                            ->label('Ключ поля')
                                                            ->helperText('Уникальный ID без пробелов, например: email_user')
                                                            ->regex('/^[a-z0-9_]+$/'),
                                                        Forms\Components\Toggle::make('required')
                                                            ->label('Обязательное поле')
                                                            ->default(false)    
                                                    ])
                                                    ->addActionLabel('Добавить поле')
                                                    ->label('Настроить форму')
                                                    ->collapsed(),
                                        ])
                                    ]),
                    ]),      

                Select::make('menu_id')
                    ->label('Меню')
                    ->options(Menu::all()->pluck('title_ru', 'id'))
                    ->searchable(),   
                Forms\Components\Select::make('parent_id')
                    ->label('Родительская страница')
                    ->options(Page::all()->pluck('title_ru', 'id'))
                    ->searchable(),    
                Select::make('lists_view_type')
                    ->label('Шаблон отображения списков')
                    ->options(collect(ListViewType::cases())->mapWithKeys(fn($case) => [
                        $case->value => $case->name,
                    ])->toArray()),                        
                Forms\Components\Toggle::make('active')
                    ->label('Активный')
                    ->default(1),
                Forms\Components\Toggle::make('is_news_page')
                    ->label('Это страница новостей')
                    ->default(0),    
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_ru')
                    ->searchable()
                    ->label('Заголовок'),
                Tables\Columns\TextColumn::make('slug')
                    ->url(fn (Page $record): string => $record->getUrl())
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('menu.title_ru')
                ->label('Меню')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                ->label('Активный')
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->when(
            Auth::user()->hasRole(RolesEnum::STRUCTURE),
            function (Builder $query) {
                return $query->whereHas('menu', function (Builder $query) {
                    $query->where('structure_id', Auth::user()->structure_id);
                });
            } 
        );
    }

    public static function getRelations(): array
    {
        return [
            FilesRelationManager::class,
            ListsRelationManager::class,
            RequestsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
