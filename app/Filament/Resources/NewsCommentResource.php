<?php
namespace App\Filament\Resources;

use App\Filament\Resources\NewsCommentResource\Pages;
use App\Models\NewsComment;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class NewsCommentResource extends Resource
{
    protected static ?string $model = NewsComment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    
    protected static ?string $navigationLabel = 'Комментарии к новостям';
    
    protected static ?string $modelLabel = 'Комментарий';
    
    protected static ?string $pluralModelLabel = 'Комментарии к новостям';
    
    protected static ?string $navigationGroup = 'Новости';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Информация о комментарии')
                    ->schema([
                        Forms\Components\Select::make('news_id')
                            ->label('Новость')
                            ->relationship('news', 'title_ru')
                            ->searchable()
                            ->required()
                            ->disabled(),
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('news.title_ru')
                    ->label('Новость')
                    ->limit(30)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('comment')
                    ->label('Комментарий')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_approved')
                    ->label('Одобрен')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_approved')
                    ->label('Статус модерации'),
                Tables\Filters\SelectFilter::make('news_id')
                    ->label('Новость')
                    ->relationship('news', 'title_ru')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('approve_selected')
                        ->label('Одобрить выбранные')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->action(function ($records) {
                            $records->each(function ($record) {
                                $record->update(['is_approved' => true]);
                            });
                        })
                        ->requiresConfirmation(),
                    Tables\Actions\BulkAction::make('reject_selected')
                        ->label('Отклонить выбранные')
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->action(function ($records) {
                            $records->each(function ($record) {
                                $record->update(['is_approved' => false]);
                            });
                        })
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNewsComments::route('/'),
            'edit' => Pages\EditNewsComment::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_approved', false)->count();
    }
}