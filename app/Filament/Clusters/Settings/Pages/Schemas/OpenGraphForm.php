<?php

namespace App\Filament\Clusters\Settings\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class OpenGraphForm
{
    public static function getSchema(): array
    {
        return [
            Section::make()
                ->components([
                    TextInput::make('title')
                        ->label('Tytuł (og:title)')
                        ->required()
                        ->maxLength(60)
                        ->helperText('Maksymalnie 60 znaków dla optymalnego wyświetlania'),

                    Textarea::make('description')
                        ->label('Opis (og:description)')
                        ->required()
                        ->rows(3)
                        ->maxLength(160)
                        ->helperText('Maksymalnie 160 znaków dla optymalnego wyświetlania'),

                    FileUpload::make('image')
                        ->label('Obraz (og:image)')
                        ->image()
                        ->disk('public')
                        ->multiple(false)
                        ->required()
                        ->helperText('Zalecany rozmiar: 1200x630 px'),

                    TextInput::make('url')
                        ->label('URL (og:url)')
                        ->url()
                        ->required()
                        ->default(config('app.url')),

                    TextInput::make('site_name')
                        ->label('Nazwa strony (og:site_name)')
                        ->default(config('app.name')),

                    TextInput::make('type')
                        ->label('Typ (og:type)')
                        ->required(),
                ]),
        ];
    }
}
