<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GraduateResource\Pages;
use App\Models\Graduate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Enums\RolesEnum;

class GraduateResource extends Resource
{
    protected static ?string $model = Graduate::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Выпускники';

    protected static ?string $navigationGroup = 'Образование';

    protected static ?int $navigationSort = 10;

    public static function shouldRegisterNavigation(): bool
    {
        $user = auth()->user();
        if (!$user) return false;
        return $user->hasRole([RolesEnum::ADMIN, 'academics']);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('academic_year')
                ->label('Учебный год')
                ->placeholder('2023-2024')
                ->required()
                ->maxLength(20),
            Forms\Components\Fieldset::make('Название')
                ->schema([
                    Forms\Components\TextInput::make('title_kk')->label('Название (KK)')->maxLength(255),
                    Forms\Components\TextInput::make('title_ru')->label('Название (RU)')->maxLength(255),
                    Forms\Components\TextInput::make('title_en')->label('Название (EN)')->maxLength(255),
                ])->columns(3),
            Forms\Components\Fieldset::make('Документы PDF')
                ->schema([
                    Forms\Components\FileUpload::make('document_kk')
                        ->label('Документ (KK)')
                        ->acceptedFileTypes(['application/pdf'])
                        ->directory('graduates')
                        ->disk('public')
                        ->visibility('public'),
                    Forms\Components\FileUpload::make('document_ru')
                        ->label('Документ (RU)')
                        ->acceptedFileTypes(['application/pdf'])
                        ->directory('graduates')
                        ->disk('public')
                        ->visibility('public'),
                    Forms\Components\FileUpload::make('document_en')
                        ->label('Документ (EN)')
                        ->acceptedFileTypes(['application/pdf'])
                        ->directory('graduates')
                        ->disk('public')
                        ->visibility('public'),
                ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('academic_year')
                ->label('Учебный год')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('title_kk')
                ->label('Название (KK)')
                ->limit(30)
                ->searchable(),
            Tables\Columns\TextColumn::make('title_ru')
                ->label('Название (RU)')
                ->limit(30)
                ->searchable(),
            Tables\Columns\TextColumn::make('title_en')
                ->label('Название (EN)')
                ->limit(30)
                ->searchable(),
            Tables\Columns\IconColumn::make('document_kk')
                ->label('KK PDF')
                ->boolean(fn($state) => filled($state)),
            Tables\Columns\IconColumn::make('document_ru')
                ->label('RU PDF')
                ->boolean(fn($state) => filled($state)),
            Tables\Columns\IconColumn::make('document_en')
                ->label('EN PDF')
                ->boolean(fn($state) => filled($state)),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('academic_year')
                ->options(fn() => Graduate::query()->pluck('academic_year', 'academic_year')->unique()->toArray()),
        ])
        ->headerActions([
            Tables\Actions\CreateAction::make(),
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
        ->defaultSort('academic_year', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGraduates::route('/'),
            'create' => Pages\CreateGraduate::route('/create'),
            'edit' => Pages\EditGraduate::route('/{record}/edit'),
        ];
    }
}
