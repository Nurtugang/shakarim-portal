<?php

namespace App\Filament\Resources\PageResource\RelationManagers;

use App\Models\PageFile;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FilesRelationManager extends RelationManager
{
    protected static string $relationship = 'files';

    protected static ?string $title = 'Файлы';

    protected static ?string $modelLabel = 'файл';

    protected static ?string $pluralLabel = 'файлы';


    public function form(Form $form): Form
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
                              ->required()
                              ->label('Заголовок(kz)')
                              ->maxLength(255),
                        
                            Forms\Components\FileUpload::make('files_kk')
                              ->directory('files')
                              ->multiple()
                              ->label('Файлы(kz)'),
                            RichEditor::make('description_kk')
                              ->label('Описание(kz)'),    
                        ]),
                        Tabs\Tab::make('ru')
                        ->schema([
                            Forms\Components\TextInput::make('title_ru')
                            ->required()
                              ->label('Заголовок(ru)')
                              ->maxLength(255),
                            
                            Forms\Components\FileUpload::make('files_ru')
                              ->directory('files')
                              ->multiple()
                              ->label('Файлы(ru)'),
                            RichEditor::make('description_ru')
                              ->label('Описание(ru)'),   
                        ]),
                        Tabs\Tab::make('en')
                        ->schema([
                            Forms\Components\TextInput::make('title_en')
                              ->label('Заголовок(en)')
                              ->maxLength(255),
                            
                            Forms\Components\FileUpload::make('files_en')
                              ->directory('files')
                              ->multiple()
                              ->label('Файлы(en)'), 
                            RichEditor::make('description_en')
                              ->label('Описание(en)'),   
                        ]),
                    ]),
                    Forms\Components\TextInput::make('position')
                        ->label('Позиция')
                        ->required()
                        ->numeric()
                        ->default(0),
                ])->columnSpan(8),

                Section::make('')
                ->schema([
                    Forms\Components\FileUpload::make('thumbnail')
                          ->image()
                          ->directory('files/thumbnail')
                          ->label('Обложка'),
                ])->columnSpan(4),
                     
            ])->columns(12);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title_ru')
            ->columns([
                Tables\Columns\TextColumn::make('title_ru'),
                Tables\Columns\TextColumn::make('files_ru')
                // ->url(function(PageFile $pageFile){
                //     foreach ($pageFile->files_ru as $file) {
                //         return '/storage/'.$file;
                //     }

                // }, true),
                ->formatStateUsing(function (PageFile $pageFile)  {
                    return implode(', ', $pageFile->files_ru);
                })
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
