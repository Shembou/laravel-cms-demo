<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\FeaturesOverview;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\AccountWidget;

class Dashboard extends BaseDashboard
{
    protected static ?int $navigationSort = -2;

    protected static ?string $title = 'Dashboard';

    protected array $welcomeMessages = [
        'Miło cię znowu widzieć',
        'Witaj ponownie',
        'Dzień dobry!',
        'Cześć! Co dziś robimy?',
        'Witaj w panelu administracyjnym',
        'Dobrze, że jesteś',
        'Hej! Gotowy do działania?',
        'Witaj w swoim panelu',
        'Miłego dnia!',
        'Wracamy do pracy!',
    ];

    public function getHeading(): string
    {
        return $this->welcomeMessages[array_rand($this->welcomeMessages)];
    }

    public function getWidgets(): array
    {
        return [
            AccountWidget::class,
            FeaturesOverview::class
        ];
    }
}
