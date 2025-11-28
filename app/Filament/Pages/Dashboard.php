<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Панель управления';

    public function getSubheading(): ?string
    {
        return 'Административная часть сайта НАО "Шәкарим Университет"';
    }
}