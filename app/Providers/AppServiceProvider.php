<?php

namespace App\Providers;

use App\Filament\TiptapBlock\AccordionBlock;
use App\Filament\TiptapBlock\CardBlock;
use App\Filament\TiptapBlock\ContactsListBlock;
use App\Filament\TiptapBlock\FullSliderBlock;
use App\Filament\TiptapBlock\GalleryBlock;
use App\Filament\TiptapBlock\InfoBlock;
use App\Filament\TiptapBlock\ListBlock;
use App\Filament\TiptapBlock\PdfViewBlock;
use App\Filament\TiptapBlock\TabsBlock;
use App\Filament\TiptapBlock\WelcomeBlock;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Vite;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        TiptapEditor::configureUsing(function (TiptapEditor $component) {
            $component
                ->blocks([
                    // GalleryBlock::class,
                    AccordionBlock::class,
                    TabsBlock::class,
                    PdfViewBlock::class,
                    WelcomeBlock::class,
                    CardBlock::class,
                    ListBlock::class,
                    // InfoBlock::class,
                    // FullSliderBlock::class,
                    // ContactsListBlock::class,
                ]);
        });
        FilamentAsset::register([Js::make('tiptap-custom-extension-scripts', Vite::asset('resources/js/tiptap/extensions.js'))->module()], 'awcodes/tiptap-editor');
    }
}
