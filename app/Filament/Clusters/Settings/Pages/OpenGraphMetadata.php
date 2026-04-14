<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\Pages\Schemas\OpenGraphForm;
use App\Filament\Clusters\Settings\SettingsCluster;
use App\Models\Settings;
use BackedEnum;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class OpenGraphMetadata extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.clusters.settings.pages.open-graph-metadata';

    protected static ?string $cluster = SettingsCluster::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Share;

    protected static ?string $title = 'Metadane Open Graph';

    public ?array $data = [];

    public function form(Schema $form): Schema
    {
        return $form
            ->statePath('data')
            ->schema(OpenGraphForm::getSchema());
    }

    public function mount(): void
    {
        $settings = Settings::where('name', 'open_graph')->first();

        $this->form->fill([
            'title' => $settings->content['title'] ?? null,
            'description' => $settings->content['description'] ?? null,
            'image' => $settings->content['image'] ?? null,
            'url' => $settings->content['url'] ?? config('app.url'),
            'site_name' => $settings->content['site_name'] ?? config('app.name'),
            'type' => $settings->content['type'] ?? 'website',
        ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Settings::updateOrCreate(
            ['name' => 'open_graph'],
            [
                'content' => [
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'image' => $data['image'],
                    'url' => $data['url'],
                    'site_name' => $data['site_name'],
                    'type' => $data['type'],
                ],
            ]
        );
    }
}
