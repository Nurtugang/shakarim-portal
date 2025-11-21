<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InternshipResource\Pages;
use App\Models\Internship;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Enums\RolesEnum;
use Illuminate\Support\Facades\Auth;

class InternshipResource extends Resource
{
    protected static ?string $model = Internship::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Практика и стажировки';

    protected static ?string $navigationGroup = 'Образование';

    protected static ?int $navigationSort = 11;

    public static function getModelLabel(): string
    {
        return 'Запись о практике';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Практика и стажировки';
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::EDUCATION]);
    }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Основная информация')
                    ->schema([
                        Forms\Components\Select::make('faculty_id')
                            ->relationship('faculty', 'title_ru')
                            ->label('Факультет')
                            ->required()
                            ->searchable()
                            ->preload(),
                    ]),
                
                Forms\Components\Section::make('Документы PDF')
                    ->description('Загрузите файлы для каждого языка.')
                    ->schema([
                        Forms\Components\FileUpload::make('document_kk')
                            ->label('Документ (KK)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('internship-docs')
                            ->disk('public')
                            ->visibility('public'),
                        Forms\Components\FileUpload::make('document_ru')
                            ->label('Документ (RU)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('internship-docs')
                            ->disk('public')
                            ->visibility('public'),
                        Forms\Components\FileUpload::make('document_en')
                            ->label('Документ (EN)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('internship-docs')
                            ->disk('public')
                            ->visibility('public'),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('faculty.title_ru')
                    ->label('Факультет')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('document_kk')
                    ->label('PDF (KK)')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
                Tables\Columns\IconColumn::make('document_ru')
                    ->label('PDF (RU)')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
                Tables\Columns\IconColumn::make('document_en')
                    ->label('PDF (EN)')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Последнее обновление')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('faculty_id')
                    ->label('Фильтр по факультету')
                    ->relationship('faculty', 'title_ru')
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
            'index' => Pages\ListInternships::route('/'),
            'create' => Pages\CreateInternship::route('/create'),
            'edit' => Pages\EditInternship::route('/{record}/edit'),
        ];
    }    
}