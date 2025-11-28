<?php

namespace App\Filament\Resources;

use App\Enums\RolesEnum;
use App\Filament\Resources\DashboardInfoResource\Pages;
use App\Filament\Resources\DashboardInfoResource\RelationManagers;
use App\Models\DashboardInfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class DashboardInfoResource extends Resource
{
    protected static ?string $model = DashboardInfo::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'Информация на главной';

    protected static ?string $modelLabel = 'Информация на главной';

    protected static ?string $pluralModelLabel = 'Информация на главной';

    protected static ?int $navigationSort = 13;

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Объявление на главной')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Заголовок блока')
                            ->required(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Показывать на главной')
                            ->default(true),

                        // Тот самый редактор текста
                        Forms\Components\RichEditor::make('content')
                            ->label('Содержимое')
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold', 'italic', 'link', 'bulletList', 'orderedList', 'h2', 'h3',
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Заголовок'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Активно'),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->label('Обновлено'),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListDashboardInfos::route('/'),
            'create' => Pages\CreateDashboardInfo::route('/create'),
            'edit' => Pages\EditDashboardInfo::route('/{record}/edit'),
        ];
    }
}
