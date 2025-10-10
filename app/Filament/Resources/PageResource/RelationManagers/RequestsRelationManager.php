<?php

namespace App\Filament\Resources\PageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RequestsRelationManager extends RelationManager
{
    protected static string $relationship = 'requests';

     protected static ?string $title = 'Запросы';

    protected static ?string $modelLabel = 'Запросы';

    protected static ?string $pluralLabel = 'Запросы';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('data')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('data')
                    ->label('Данные формы')
                    ->formatStateUsing(function ($state, $record) {
                        $formSchema = $record->page->formSchema;
                        $locale = app()->getLocale(); // 'ru', 'kk', 'en'
                        $labelKey = 'name_' . $locale;
                        $output = [];

                        foreach ($record->data as $key => $value) {
                            $field = collect($formSchema->form_schema)->firstWhere('key', $key);
                            $label = $field[$labelKey] ?? $field['name_ru'] ?? $key;

                            if ($field['type'] === 'file' && $value) {
                                $value = "<a href='" . asset('storage/' . $value) . "' target='_blank' class='text-primary-600 hover:underline'>Скачать файл</a>";
                            } elseif (!$value) {
                                $value = '—';
                            }

                            $output[] = "<strong>$label:</strong> " . ($value ?: '—');
                        }
                        return '<div>' . implode('<br>', $output) . '</div>';
                    })
                    ->html()
                    ->wrap(),
                TextColumn::make('created_at')->label('Дата')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
