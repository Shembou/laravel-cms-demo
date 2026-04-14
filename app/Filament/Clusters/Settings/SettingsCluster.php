<?php

namespace App\Filament\Clusters\Settings;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class SettingsCluster extends Cluster
{
    protected static string|UnitEnum|null $navigationGroup = 'Strony internetowe';

    protected static ?int $navigationSort = 9999;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Cog;

    protected static ?string $navigationLabel = 'Ustawienia';

    protected static ?string $clusterBreadcrumb = 'Ustawienia';

    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
}
