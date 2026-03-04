<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DevelopmentWorkingGroupContentResource\Pages;
use App\Models\DevelopmentWorkingGroupContent;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use FilamentTiptapEditor\Enums\TiptapOutput;
use Illuminate\Support\Facades\Auth;
use App\Enums\RolesEnum;

class DevelopmentWorkingGroupContentResource extends Resource
{
    protected static ?string $model = DevelopmentWorkingGroupContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Справочники';
    
    protected static ?int $navigationSort = 4;

    public static function getNavigationLabel(): string
    {
        return 'Рабочая группа по устойчивому развитию';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Рабочая группа по устойчивому развитию';
    }
    
    public static function getModelLabel(): string
    {
        return 'Рабочая группа по устойчивому развитию';
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::DEVELOPMENT]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Содержимое страницы "Рабочая группа по устойчивому развитию"')
                    ->description('Здесь редактируется текст для вкладки "Рабочая группа по устойчивому развитию"')
                    ->schema([
                        Tabs::make('Content')
                            ->tabs([
                                Tabs\Tab::make('Русский')
                                    ->schema([
                                        TiptapEditor::make('content_ru')
                                            ->label('')
                                            ->output(TiptapOutput::Html)
                                            ->profile('default')
                                            ->required(),
                                    ]),
                                Tabs\Tab::make('Казахский')
                                    ->schema([
                                        TiptapEditor::make('content_kk')
                                            ->label('')
                                            ->output(TiptapOutput::Html)
                                            ->profile('default'),
                                    ]),
                                Tabs\Tab::make('Английский')
                                    ->schema([
                                        TiptapEditor::make('content_en')
                                            ->label('')
                                            ->output(TiptapOutput::Html)
                                            ->profile('default'),
                                    ]),
                                Tabs\Tab::make('Китайский')
                                    ->schema([
                                        TiptapEditor::make('content_cn')
                                            ->label('')
                                            ->output(TiptapOutput::Html)
                                            ->profile('default'),
                                    ]),
                            ])->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\EditDevelopmentWorkingGroupContent::route('/'),
        ];
    }
    
    public static function canCreate(): bool
    {
        return false;
    }
}