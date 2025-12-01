<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseCertificateResource\Pages;
use App\Models\CourseCertificate;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Enums\RolesEnum;
use Illuminate\Support\Facades\Auth;

class CourseCertificateResource extends Resource
{
    protected static ?string $model = CourseCertificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';
    protected static ?string $navigationGroup = 'Курсы повышения квалификации';
    protected static ?string $navigationLabel = 'Сертификаты';
    protected static ?int $navigationSort = 3;

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::COURSE]);
    }

    public static function getPluralLabel(): ?string
    {
        return 'Сертификаты';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('title')
                            ->label('Название сертификата')
                            ->required()
                            ->maxLength(255),
                        
                        FileUpload::make('filename')
                            ->label('Файл (PDF)')
                            ->directory('courses/certificates')
                            ->acceptedFileTypes(['application/pdf'])
                            ->downloadable()
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Дата загрузки'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourseCertificates::route('/'),
            'create' => Pages\CreateCourseCertificate::route('/create'),
            'edit' => Pages\EditCourseCertificate::route('/{record}/edit'),
        ];
    }
}