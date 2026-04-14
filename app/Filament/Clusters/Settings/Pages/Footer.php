<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\Pages\Schemas\FooterForm;
use App\Filament\Clusters\Settings\SettingsCluster;
use App\Models\Settings;
use BackedEnum;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class Footer extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.clusters.settings.pages.footer';

    protected static ?string $cluster = SettingsCluster::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BarsArrowDown;

    protected static ?string $title = 'Stopka';

    public ?array $data = [];

    public function form(Schema $form): Schema
    {
        return $form
            ->statePath('data')
            ->schema(FooterForm::getSchema());
    }

    public function mount(): void
    {
        $settings = Settings::where('name', 'footer')->first();

        $blocks = $settings?->content['footer_blocks'] ?? [];

        foreach ($blocks as &$block) {
            if (($block['type'] ?? null) === 'site_info') {
                $block['logo'] = $settings?->logo;
            }
        }

        $this->form->fill([
            'footer_blocks' => $blocks,
        ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $blocks = $data['footer_blocks'] ?? [];

        $logo = null;

        foreach ($blocks as &$block) {
            if (($block['type'] ?? null) === 'site_info') {
                $logo = $block['logo'] ?? null;

                unset($block['logo']);
            }
        }

        Settings::updateOrCreate(
            ['name' => 'footer'],
            [
                'logo' => $logo,
                'content' => [
                    'footer_blocks' => $blocks,
                ],
            ]
        );
    }

    private function extractLogo(array &$blocks): ?string
    {
        foreach ($blocks as &$block) {
            if (($block['type'] ?? null) === 'site_info') {
                $logo = $block['logo'] ?? null;
                unset($block['logo']);

                return $logo;
            }
        }

        return null;
    }
}
