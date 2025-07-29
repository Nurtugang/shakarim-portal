<?php

namespace App\Filament\Resources\SciencePurchaseResource\RelationManagers;

use App\Http\Controllers\Science\SciencePurchasesOfferController;
use App\Models\Science\SciencePurchasesOffer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OffersRelationManager extends RelationManager
{
    protected static string $relationship = 'offers';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('organization')
                    ->label('Организация')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('head')
                ->label('Руководитель')
                    ->required()
                    ->maxLength(255),    
                Forms\Components\TextInput::make('contact')
                    ->label('Контакт')
                    ->required()
                    ->maxLength(255), 
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('organization')
            ->columns([
                Tables\Columns\TextColumn::make('organization'),
                Tables\Columns\TextColumn::make('filename')
                    ->label('Файл')
                    ->url(fn (SciencePurchasesOffer $record): string => $record->getFile())
                    ->openUrlInNewTab(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
