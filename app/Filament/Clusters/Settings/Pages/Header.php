<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\SettingsCluster;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
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

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBars3;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'logo' => null,
            'menu' => [],
        ]);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->statePath('data')
            ->schema([
                FileUpload::make('logo')
                    ->image()
                    ->disk('public')
                    ->required(),

                Repeater::make('menu')
                    ->label('Menu Links')
                    ->schema([
                        TextInput::make('label')
                            ->required(),

                        TextInput::make('url')
                            ->url()
                            ->required(),

                        Repeater::make('children')
                            ->label('Sub Links')
                            ->schema([
                                TextInput::make('label')->required(),
                                TextInput::make('url')->url()->required(),
                                Repeater::make('children')
                                    ->label('Sub Sub Links')
                                    ->schema([
                                        TextInput::make('label')->required(),
                                        TextInput::make('url')->url()->required(),
                                    ])
                                    ->collapsible(),
                            ])
                            ->collapsible(),
                    ])
                    ->collapsible()
                    ->default([]),
            ]);
    }

    public function save(): void
    {
        // TODO
    }
}
