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
use App\Filament\TiptapBlock\SliderBlock;
use App\Filament\TiptapBlock\TabsBlock;
use App\Filament\TiptapBlock\WelcomeBlock;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('captcha', function ($attribute, $value, $parameters, $validator) {
            $secret = config('captcha.secret');
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$value."&remoteip=".$_SERVER['REMOTE_ADDR']);
            $result = json_decode($response);
            return $result->success;
        });
        
        TiptapEditor::configureUsing(function (TiptapEditor $component) {
            $component
                ->blocks([
                    AccordionBlock::class,
                    TabsBlock::class,
                    PdfViewBlock::class,
                    ListBlock::class,
                    SliderBlock::class,
                    // GalleryBlock::class,
                    // InfoBlock::class,
                    // FullSliderBlock::class,
                    // ContactsListBlock::class,
                ]);
        });
        
        FilamentAsset::register([Js::make('tiptap-custom-extension-scripts', Vite::asset('resources/js/tiptap/extensions.js'))->module()], 'awcodes/tiptap-editor');
    }
}