<?php

namespace App\Filament\Clusters\Settings\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class HeaderForm
{
    public static function getSchema(): array
    {
        return [
            Section::make()
                ->components([
                    FileUpload::make('logo')
                        ->image()
                        ->disk('public')
                        ->multiple(false)
                        ->required(),
                    Repeater::make('menu')
                        ->label('Linki')
                        ->columnSpan(5)
                        ->schema([
                            TextInput::make('label')
                                ->label('Nazwa')
                                ->required(),

                            TextInput::make('url')
                                ->label('link')
                                ->required(),

                            Repeater::make('children')
                                ->label('zgłębione linki')
                                ->schema([
                                    TextInput::make('label')->label('nazwa')->required(),
                                    TextInput::make('url')->label('link')->required(),
                                    Repeater::make('children')
                                        ->label('mocno zgłębione linki')
                                        ->schema([
                                            TextInput::make('label')->label('nazwa')->required(),
                                            TextInput::make('url')->label('link')->required(),
                                        ])
                                        ->collapsible(),
                                ])
                                ->collapsible(),
                        ])
                        ->collapsible()
                        ->compact()
                        ->grid(fn ($get) => max(1, count($get('menu') ?? [])))
                        ->default([]),
                ]),
        ];
    }
}
