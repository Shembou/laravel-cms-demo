<?php

namespace App\Filament\Clusters\Settings\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class FooterForm
{
    public static function getSchema(): array
    {
        return [
            Section::make()
                ->components([
                    Repeater::make('footer_blocks')
                        ->label('Sekcje stopki')
                        ->schema([
                            Select::make('type')
                                ->label('Typ sekcji')
                                ->options([
                                    'site_info' => 'Logo strony i linki socjalne',
                                    'menu' => 'Linki do stron',
                                ])
                                ->required()
                                ->reactive(),
                            FileUpload::make('logo')
                                ->image()
                                ->disk('public')
                                ->label('Logo')
                                ->visible(fn ($get) => $get('type') === 'site_info'),

                            Repeater::make('socials')
                                ->label('Social media')
                                ->schema([
                                    FileUpload::make('social_logo')
                                        ->disk('public')
                                        ->label('Ikona'),
                                    TextInput::make('url')
                                        ->required(),
                                ])
                                ->collapsible()
                                ->visible(fn ($get) => $get('type') === 'site_info'),

                            TextInput::make('heading')
                                ->label('Nagłówek')
                                ->required()
                                ->visible(fn ($get) => $get('type') === 'menu'),

                            Repeater::make('links')
                                ->label('Linki')
                                ->schema([
                                    TextInput::make('label')
                                        ->required(),
                                    TextInput::make('url')
                                        ->required(),
                                ])
                                ->collapsible()
                                ->visible(fn ($get) => $get('type') === 'menu'),
                        ])
                        ->grid(3)
                        ->defaultItems(1)
                        ->minItems(1)
                        ->reorderable(true) // prevents moving site_info
                        ->itemLabel(fn ($state) => match ($state['type'] ?? null) {
                            'site_info' => 'Site Info',
                            'menu' => $state['heading'] ?? 'Menu',
                            default => 'Sekcja',
                        })
                        ->collapsible(),
                ]),
        ];
    }
}
