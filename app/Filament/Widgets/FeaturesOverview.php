<?php

namespace App\Filament\Widgets;

use App\Filament\Clusters\Settings\SettingsCluster;
use App\Filament\Resources\Website\Authors\AuthorResource;
use App\Filament\Resources\Website\Blogs\BlogResource;
use App\Filament\Resources\Website\Categories\CategoryResource;
use App\Filament\Resources\Website\Pages\PageResource;
use App\Filament\Resources\Website\Tags\TagResource;
use Filament\Widgets\Widget;

class FeaturesOverview extends Widget
{
    protected string $view = 'filament.widgets.features-overview';

    protected int|string|array $columnSpan = 'full';

    protected static bool $isLazy = false;

    public function pluralizeFunkcja(int $count): string
    {
        $lastDigit = $count % 10;
        $lastTwoDigits = $count % 100;

        if ($lastTwoDigits >= 12 && $lastTwoDigits <= 14) {
            return 'funkcji';
        }

        if ($lastDigit === 1 && $count !== 11) {
            return 'funkcja';
        }

        if ($lastDigit >= 2 && $lastDigit <= 4) {
            return 'funkcje';
        }

        return 'funkcji';
    }

    /**
     * @return array<int, array{name: string, icon: string, color: string, features: array<int, array{name: string, description: string, url: string, resource: string}>}>
     */
    public function getCategories(): array
    {
        return [
            $this->tablesCategory(),
        ];
    }

    /**
     * @return array{name: string, icon: string, color: string, features: list<array{name: string, description: string, url: string, resource: string}>}
     */
    protected function tablesCategory(): array
    {
        return [
            'name' => 'Strony internetowe',
            'icon' => 'heroicon-o-globe-alt',
            'color' => 'blue',
            'features' => [
                ['name' => 'Strony', 'description' => 'Zarządzaj stronami', 'url' => PageResource::getUrl('index'), 'resource' => 'Pages'],
                ['name' => 'Blog', 'description' => 'Zarządzaj postami', 'url' => BlogResource::getUrl('index'), 'resource' => 'Blogs'],
                ['name' => 'Kategorie', 'description' => 'Zarządzaj kategoriami bloga', 'url' => CategoryResource::getUrl('index'), 'resource' => 'Categories'],
                ['name' => 'Autorzy', 'description' => 'Zarządzaj autorami bloga', 'url' => AuthorResource::getUrl('index'), 'resource' => 'Authors'],
                ['name' => 'Tagi', 'description' => 'Zarządzaj tagami bloga', 'url' => TagResource::getUrl('index'), 'resource' => 'Tags'],
                ['name' => 'Nagłówek', 'description' => 'Konfiguruj nagłówek strony', 'url' => SettingsCluster::getUrl(['header']), 'resource' => 'Header'],
                ['name' => 'Stopka', 'description' => 'Konfiguruj stopkę strony', 'url' => SettingsCluster::getUrl(['footer']), 'resource' => 'Footer'],
                ['name' => 'Metadane Open Graph', 'description' => 'Konfiguruj metadane Open Graph', 'url' => SettingsCluster::getUrl(['open-graph-metadata']), 'resource' => 'OpenGraph'],
            ],
        ];
    }
}
