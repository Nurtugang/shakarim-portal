<?php

namespace App\Filament\Resources\PageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ListsRelationManager extends RelationManager
{
  protected static string $relationship = 'lists';
  protected static ?string $title = 'Список';

  protected static ?string $modelLabel = 'список';
  

  public function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make('')
          ->schema([
            Tabs::make('')
              ->tabs([
                Tabs\Tab::make('kz')
                  ->schema([
                    Forms\Components\TextInput::make('title_kk')
                      ->label('Заголовок(kz)')
                      ->required()
                      ->maxLength(255),
                    TiptapEditor::make('content_kk')
                      ->label('Контент(kz)')
                      ->required()
                      ->columnSpanFull(),
                  ]),
                Tabs\Tab::make('ru')
                  ->schema([
                    Forms\Components\TextInput::make('title_ru')
                      ->label('Заголовок(ru)')
                      ->required()
                      ->maxLength(255),
                    TiptapEditor::make('content_ru')
                      ->label('Контент(ru)')
                      ->required()
                      ->columnSpanFull(),
                    Forms\Components\Actions::make([
                      Forms\Components\Actions\Action::make('copy_content_from_kk')
                        ->label('Скопировать с казахского')
                        ->action(fn($get, $set) => $set('content_ru', $get('content_kk')))
                    ]),
                  ]),
                Tabs\Tab::make('en')
                  ->schema([
                    Forms\Components\TextInput::make('title_en')
                      ->label('Заголовок(en)')
                      ->maxLength(255),
                    TiptapEditor::make('content_en')
                      ->label('Контент(en)')
                      ->columnSpanFull(),
                    Forms\Components\Actions::make([
                      Forms\Components\Actions\Action::make('copy_content_from_ru')
                        ->label('Скопировать с русского')
                        ->action(fn($get, $set) => $set('content_en', $get('content_ru')))
                    ]),
                  ])
              ]),
            Forms\Components\DateTimePicker::make('date')
              ->label('Дата'),
            Forms\Components\Toggle::make('active')
              ->label('Активный')
              ->default(1),
          ])->columnSpan(8),

        Section::make('')
          ->schema([
            FileUpload::make('image')
            ->image()
            ->optimize('webp')
              ->maxSize(10024)
              ->required()
              ->label('Картинка'),
            Forms\Components\FileUpload::make('gallery')
              ->image()
              ->optimize('webp')
              ->multiple()
              ->maxSize(6024)
              ->disk('public')
              ->label('Галерея')
              ->directory('news_gallery'),
          ])->columnSpan(4)

      ])->columns(12);
  }

  public function table(Table $table): Table
  {
    return $table
      ->recordTitleAttribute('title_ru')
      ->columns([
        Tables\Columns\TextColumn::make('title_ru'),
      ])
      ->filters([
        //
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
      ]);
  }
}
