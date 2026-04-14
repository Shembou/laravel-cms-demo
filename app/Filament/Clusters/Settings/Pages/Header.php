<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\Pages\Schemas\HeaderForm;
use App\Filament\Clusters\Settings\SettingsCluster;
use App\Models\Settings;
use BackedEnum;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class Header extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.clusters.settings.pages.header';

    protected static ?string $cluster = SettingsCluster::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BarsArrowUp;

    protected static ?string $title = 'Nagłówek';

    public ?array $data = [];

    public function form(Schema $form): Schema
    {
        return $form
            ->statePath('data')
            ->schema(HeaderForm::getSchema());
    }

    public function mount(): void
    {
        $settings = Settings::where('name', 'header')->first();

        $this->form->fill([
            'logo' => $settings?->logo,
            'menu' => $settings->content['menu'] ?? [],
        ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Settings::updateOrCreate(
            ['name' => 'header'],
            [
                'logo' => $data['logo'],
                'content' => [
                    'menu' => $data['menu'],
                ],
            ]
        );
    }
}
