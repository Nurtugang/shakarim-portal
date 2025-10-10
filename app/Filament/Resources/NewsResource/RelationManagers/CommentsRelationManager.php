<?php

namespace App\Filament\Resources\NewsResource\RelationManagers;

use App\Models\NewsComment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    protected static ?string $title = 'Комментарий';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Информация о комментарии')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Имя')
                            ->required()
                            ->disabled(),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->disabled(),
                    ])->columns(2),

                Forms\Components\Section::make('Комментарий')
                    ->schema([
                        Forms\Components\Textarea::make('comment')
                            ->label('Текст комментария')
                            ->required()
                            ->disabled()
                            ->rows(4),
                        Forms\Components\Toggle::make('is_approved')
                            ->label('Одобрен')
                            ->helperText('Одобренные комментарии видны на сайте'),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('approve')
                    ->label('Одобрить')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->action(function (NewsComment $record) {
                        $record->update(['is_approved' => true]);
                    })
                    ->visible(fn (NewsComment $record) => !$record->is_approved),
                Tables\Actions\Action::make('reject')
                    ->label('Отклонить')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->action(function (NewsComment $record) {
                        $record->update(['is_approved' => false]);
                    })
                    ->visible(fn (NewsComment $record) => $record->is_approved),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
