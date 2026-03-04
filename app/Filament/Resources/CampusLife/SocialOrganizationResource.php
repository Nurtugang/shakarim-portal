<?php

namespace App\Filament\Resources\CampusLife;

use App\Enums\RolesEnum;
use App\Filament\Resources\CampusLife\SocialOrganizationResource\Pages;
use App\Models\Organization;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden; // Не забудьте импортировать Hidden
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class SocialOrganizationResource extends Resource
{
    protected static ?string $model = Organization::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group'; 

    protected static ?string $navigationGroup = 'Campus Life';

    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return 'Студенческие организации';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Студенческие организации';
    }

    public static function getModelLabel(): string
    {
        return 'организация';
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->hasRole([RolesEnum::ADMIN, RolesEnum::CAMPUS_LIFE]); 
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('category_id', 2);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('category_id')->default(2),

                Section::make('Основная информация')
                    ->schema([
                        Tabs::make('Label')
                            ->tabs([
                                Tabs\Tab::make('Русский')
                                    ->schema([
                                        TextInput::make('name_ru')->label('Название (RU)')->required(),
                                        TextInput::make('dean_ru')->label('Руководитель (RU)')->required(),
                                        TiptapEditor::make('target_ru')
                                            ->label('Цель (RU)')
                                            ->profile('default')
                                            ->required(),
                                    ]),
                                Tabs\Tab::make('Казахский')
                                    ->schema([
                                        TextInput::make('name_kk')->label('Название (KK)')->required(),
                                        TextInput::make('dean_kk')->label('Руководитель (KK)')->required(),
                                        TiptapEditor::make('target_kk')
                                            ->label('Цель (KK)')
                                            ->profile('default')
                                            ->required(),
                                    ]),
                                Tabs\Tab::make('Английский')
                                    ->schema([
                                        TextInput::make('name_en')->label('Название (EN)')->required(),
                                        TextInput::make('dean_en')->label('Руководитель (EN)')->required(),
                                        TiptapEditor::make('target_en')
                                            ->label('Цель (EN)')
                                            ->profile('default')
                                            ->required(),
                                    ]),
                            ])->columnSpanFull(),
                    ]),
                Section::make('Контактная информация и изображения')
                    ->schema([
                        TextInput::make('phone')->label('Телефон')->required(),
                        TextInput::make('insta')->label('Instagram'),
                        FileUpload::make('image')
                            ->label('Логотип организации')
                            ->directory('organizations/social') // Можно разделить папки загрузки
                            ->image()
                            ->imageEditor(),
                        FileUpload::make('dean_image')
                            ->label('Фото руководителя')
                            ->directory('organizations/social')
                            ->image()
                            ->imageEditor(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                
                TextColumn::make('image')
                    ->label('Логотип')
                    ->formatStateUsing(function ($state, Organization $record) {
                        if ($state) {
                            $imageUrl = $record->getImageUrl();
                            return '<img src="' . $imageUrl . '" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">';
                        }
                        return 'Нет фото';
                    })
                    ->html(),

                TextColumn::make('name_ru')
                    ->label('Название')
                    ->searchable()
                    ->limit(50),
                TextColumn::make('dean_ru')
                    ->label('Руководитель')
                    ->searchable(),
                TextColumn::make('phone')->label('Телефон'),
                TextColumn::make('updated_at')
                    ->label('Обновлено')
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
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocialOrganizations::route('/'),
            'create' => Pages\CreateSocialOrganization::route('/create'),
            'edit' => Pages\EditSocialOrganization::route('/{record}/edit'),
        ];
    }
}
