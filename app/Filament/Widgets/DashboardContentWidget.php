<?php

namespace App\Filament\Widgets;

use App\Models\DashboardInfo;
use Filament\Widgets\Widget;

class DashboardContentWidget extends Widget
{
    protected static string $view = 'filament.widgets.dashboard-content-widget';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = -2;

    protected function getViewData(): array
    {
        return [
            'records' => DashboardInfo::where('is_active', true)->latest()->get(),
        ];
    }
}