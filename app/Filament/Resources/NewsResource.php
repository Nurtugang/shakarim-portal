<?php

namespace App\Filament\Resources;

use App\Models\News;
use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers\CommentsRelationManager;
use App\Filament\Resources\NewsResource\RelationManagers\ImagesRelationManager;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Facades\Storage;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Stichoza\GoogleTranslate\GoogleTranslate;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Новости';

    protected static ?string $navigationGroup = 'Новости';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Tabs::make('Tabs')
                            ->tabs([
                                // --- TAB KAZAKH ---
                                Tabs\Tab::make('kk')
                                    ->schema([
                                        Forms\Components\Actions::make([
                                            Action::make('translate_kk_ru')
                                                ->label('Перевести с Русского')
                                                ->icon('heroicon-m-language')
                                                ->color('info')
                                                ->action(function (Get $get, Set $set) {
                                                    self::translateContent($get, $set, 'ru', 'kk', 'title_ru', 'content_ru', 'title_kk', 'content_kk');
                                                }),
                                        ]),
                                        Forms\Components\TextInput::make('title_kk')->label('Заголовок kk')->maxLength(255),
                                        TiptapEditor::make('content_kk')->label('Контент kk'),
                                    ]),

                                // --- TAB RUSSIAN ---
                                Tabs\Tab::make('ru')
                                    ->schema([
                                        Forms\Components\Actions::make([
                                            Action::make('translate_ru_kk')
                                                ->label('Перевести с Казахского')
                                                ->icon('heroicon-m-language')
                                                ->color('success')
                                                ->action(function (Get $get, Set $set) {
                                                    self::translateContent($get, $set, 'kk', 'ru', 'title_kk', 'content_kk', 'title_ru', 'content_ru');
                                                }),
                                        ]),
                                        Forms\Components\TextInput::make('title_ru')->label('Заголовок RU')->required()->maxLength(255),
                                        TiptapEditor::make('content_ru')->label('Контент RU')->required(),
                                    ]),

                                // --- TAB ENGLISH ---
                                Tabs\Tab::make('en')
                                    ->schema([
                                        Forms\Components\Actions::make([
                                            Action::make('translate_en_ru')
                                                ->label('Перевести с Русского')
                                                ->icon('heroicon-m-language')
                                                ->color('info')
                                                ->action(function (Get $get, Set $set) {
                                                    self::translateContent($get, $set, 'ru', 'en', 'title_ru', 'content_ru', 'title_en', 'content_en');
                                                }),
                                            Action::make('translate_en_kk')
                                                ->label('Перевести с Казахского')
                                                ->icon('heroicon-m-language')
                                                ->color('success')
                                                ->action(function (Get $get, Set $set) {
                                                    self::translateContent($get, $set, 'kk', 'en', 'title_kk', 'content_kk', 'title_en', 'content_en');
                                                }),
                                        ]),
                                        Forms\Components\TextInput::make('title_en')->label('Заголовок EN')->maxLength(255),
                                        TiptapEditor::make('content_en')->label('Контент EN'),
                                    ]),

                                // --- TAB CHINESE  ---
                                Tabs\Tab::make('cn')
                                    ->schema([
                                        Forms\Components\Actions::make([
                                            Action::make('translate_cn_ru')
                                                ->label('Перевести с Русского')
                                                ->icon('heroicon-m-language')
                                                ->color('warning')
                                                ->action(function (Get $get, Set $set) {
                                                    self::translateContent($get, $set, 'ru', 'zh-CN', 'title_ru', 'content_ru', 'title_cn', 'content_cn');
                                                }),

                                            Action::make('translate_cn_kk')
                                                ->label('Перевести с Казахского')
                                                ->icon('heroicon-m-language')
                                                ->color('success')
                                                ->action(function (Get $get, Set $set) {
                                                    self::translateContent($get, $set, 'kk', 'zh-CN', 'title_kk', 'content_kk', 'title_cn', 'content_cn');
                                                }),
                                        ]),
                                        Forms\Components\TextInput::make('title_cn')->label('Заголовок CN')->maxLength(255),
                                        TiptapEditor::make('content_cn')->label('Контент CN'),
                                    ])

                            ]),
                        Forms\Components\Toggle::make('status')->label('Активна')->default(true),
                        Forms\Components\DateTimePicker::make('date')->label('Дата публикации')->default(now())->required(),
                        Forms\Components\Select::make('developmentGoals')->label('Цели развития')->relationship('developmentGoals', 'title')->multiple()->searchable()->preload()->columnSpanFull(),
                    ])->columnSpan(8),

                Section::make()
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Загрузить/заменить главное изображение')
                            ->image()->imageEditor()->disk('public')->directory('news')->visibility('public'),
                        Placeholder::make('image_slider_preview')
                            ->label('Текущее изображение для слайдера')
                            ->content(function ($record) {
                                if ($record?->image_slider) {
                                    return new \Illuminate\Support\HtmlString('<img src="' . Storage::url('news/slider/' . $record->image_slider) . '" style="max-width: 100%; height: auto; border-radius: 8px;">');
                                }
                                return new \Illuminate\Support\HtmlString('<div style="padding: 1rem; text-align: center; color: #9ca3af;">Нет изображения</div>');
                            }),
                        Forms\Components\FileUpload::make('image_slider')
                            ->label('Загрузить/заменить изображение для слайдера')
                            ->image()->imageEditor()->disk('public')->directory('news/slider')->visibility('public'),
                        Forms\Components\TextInput::make('slider_order')
                            ->label('Порядок в слайдере')
                            ->numeric()->minValue(1)
                            ->helperText('Оставьте пустым, чтобы не показывать в слайдере.'),
                        Forms\Components\Select::make('category_id')->required()->label('Категория')->relationship('category', 'label_ru')->searchable()->preload(),
                        Forms\Components\Select::make('tags')->label('Теги')->multiple()->relationship('tags', 'name')->searchable()->preload(),
                    ])->columnSpan(4),

            ])->columns(12);
    }

    // --- ДОБАВЬТЕ ЭТУ ФУНКЦИЮ В КЛАСС NewsResource ---
    protected static function translateContent(Get $get, Set $set, string $sourceLang, string $targetLang, string $sourceTitleField, string $sourceContentField, string $targetTitleField, string $targetContentField)
    {
        $titleSource = $get($sourceTitleField);
        $contentSource = $get($sourceContentField);

        if (!$titleSource && !$contentSource) {
            Notification::make()->title('Исходные поля пусты')->warning()->send();
            return;
        }

        try {
            $tr = new GoogleTranslate();
            $tr->setSource($sourceLang);
            $tr->setTarget($targetLang);

            // Перевод заголовка (он короткий, можно сразу)
            if ($titleSource) {
                $set($targetTitleField, $tr->translate($titleSource));
            }

            // Перевод контента (HTML)
            if ($contentSource) {
                $htmlContent = is_array($contentSource) ? tiptap_converter()->asHTML($contentSource) : $contentSource;

                if ($htmlContent) {
                    // Если текст короткий (< 1500 символов), переводим сразу
                    if (strlen($htmlContent) < 1500) {
                         $set($targetContentField, $tr->translate($htmlContent));
                    } else {
                        // Если текст длинный, разбиваем по абзацам </p>
                        $chunks = explode('</p>', $htmlContent);
                        $translatedHtml = '';

                        foreach ($chunks as $chunk) {
                            $chunk = trim($chunk);
                            if (empty($chunk)) continue;
                            $chunkWithTag = $chunk . '</p>'; 
                            usleep(100000); // 0.1 секунды
                            
                            $translatedHtml .= $tr->translate($chunkWithTag);
                        }
                        $set($targetContentField, $translatedHtml);
                    }
                }
            }
            Notification::make()->title("Переведено ($sourceLang -> $targetLang)")->success()->send();

        } catch (\Exception $e) {
            // Логируем ошибку, но не роняем админку
            \Illuminate\Support\Facades\Log::error("Translation error: " . $e->getMessage());
            Notification::make()
                ->title('Ошибка перевода')
                ->body('Текст слишком длинный или Google отклонил запрос. Проверьте логи.')
                ->danger()
                ->send();
        }
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('image')
                    ->label('Фото')
                    ->formatStateUsing(function ($state) {
                        if ($state) {
                            $nameWithoutExtension = pathinfo($state, PATHINFO_FILENAME);
                            $imageUrl = Storage::url('news/thumbnails/' . $nameWithoutExtension . '.webp');
                            return '<img src="' . $imageUrl . '" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">';
                        }
                        return 'Нет фото';
                    })
                    ->html(),
                Tables\Columns\TextColumn::make('title_kk')
                    ->url(fn(News $record): string => route('news.show', ['locale' => 'kk', 'news' => $record]))
                    ->openUrlInNewTab()
                    ->label('Заголовок')
                    ->searchable()
                    ->limit(30),
                 Tables\Columns\TextColumn::make('slider_order')
                    ->label('В слайдере')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => $state ? "Да ({$state})" : 'Нет'),
                Tables\Columns\TextColumn::make('category.label_ru')
                    ->label('Категория'),
                Tables\Columns\IconColumn::make('status')
                    ->label('Статус')
                    ->boolean(),
                Tables\Columns\TextColumn::make('date')
                    ->label('Дата')
                    ->sortable()
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->relationship('category', 'label_ru'),
                Tables\Filters\TernaryFilter::make('status'),
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
            ->defaultSort('id', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            CommentsRelationManager::class,
            ImagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}