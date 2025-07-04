<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-4';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Меню';

    protected static ?string $modelLabel = 'Меню';

    protected static ?string $pluralModelLabel = 'Меню';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                ->schema([
                    Radio::make('type')
                    ->label('Тип')
    ->options([
        1 => 'Top',
        2 => 'Footer',
    ]),
                    Tabs::make('')
                ->tabs([
                    Tabs\Tab::make('kz')
                    ->schema([
                        Forms\Components\TextInput::make('title_kk')
                           ->label('Заголовок(kz)')
                           ->required()
                           ->maxLength(255),
                        Forms\Components\TextInput::make('link_kk')
                           ->label('Ссылка(kz)')
                           ->maxLength(255),   
                    ]),
                    Tabs\Tab::make('ru')
                    ->schema([
                        Forms\Components\TextInput::make('title_ru')
                           ->label('Заголовок(ru)')
                           ->required()
                           ->maxLength(255),
                        Forms\Components\TextInput::make('link_ru')
                           ->label('Ссылка(ru)')
                           ->maxLength(255),   
                    ]),
                    Tabs\Tab::make('en')
                    ->schema([
                        Forms\Components\TextInput::make('title_en')
                           ->label('Заголовок(en)')
                           ->required()
                           ->maxLength(255),
                        Forms\Components\TextInput::make('link_en')
                           ->label('Ссылка(en)')
                           ->maxLength(255),   
                    ]),
                ]),
                
                Forms\Components\Toggle::make('is_external_link')
                    ->label('Внешняя ссылка')
                    ->default(0),  
                Forms\Components\TextInput::make('sort')
                    ->label('Позиция')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Select::make('parent_id')
                    ->label('Родительское меню')
                    ->options(Menu::all()->pluck('title_ru', 'id'))
                    ->searchable(),
                Forms\Components\Toggle::make('active')
                    ->label('Активно')
                    ->default(1)                        
                ])->columnSpan(8),
                

                Section::make()
                   ->schema([
                    Forms\Components\FileUpload::make('banner')
                        ->directory('banner')
                        ->image()
                        ->optimize('webp')
                        ->label('Баннер')
                   ])->columnSpan(4)
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_ru')
                    ->label('Заголовок')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_kk')
                    ->label('Ссылка')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort')
                ->label('Позиция')
                    ->numeric(),
                Tables\Columns\TextColumn::make('parent.title_ru')
                ->label('Родительское меню'),
                Tables\Columns\IconColumn::make('active')
                ->label('Активно')
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
            ->defaultSort('menus.title_ru')
            ->defaultPaginationPageOption(25)
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
