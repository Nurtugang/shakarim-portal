<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class CustomAccountWidget extends Widget
{
    protected static string $view = 'filament.widgets.custom-account-widget';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = -3;

    public function getUser()
    {
        return Auth::user();
    }

    public function getGreeting(): string
    {
        $hour = now()->hour;

        return match (true) {
            $hour >= 6 && $hour < 11 => 'Доброе утро! Продуктивного дня.',

            $hour >= 11 && $hour < 13 => 'Добрый день!',

            $hour >= 13 && $hour < 14 => 'Добрый день! Самое время сделать перерыв и пообедать.',

            $hour >= 14 && $hour < 17 => 'Добрый день!',

            $hour >= 17 && $hour < 21 => 'Добрый вечер! Рабочий день подходит к концу.',

            default => 'Доброй ночи! Вы работаете так поздно — это достойно уважения, но не забывайте про сон.',
        };
    }
}