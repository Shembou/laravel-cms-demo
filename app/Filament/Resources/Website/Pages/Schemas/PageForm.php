<?php

namespace App\Filament\Resources\Website\Pages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\RichContentRenderer;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label("Meta tytuł")
                    ->required(),
                TextInput::make('slug')
                    ->label('link')
                    ->required(),
                Textarea::make('description')
                    ->label("Meta opis")
                    ->columnSpanFull()
                    ->default(null),
                RichEditor::make('content')
                ->toolbarButtons([
                        ['bold'],
                        ['h1', 'h2', 'h3'],
                        ['bulletList', 'orderedList'],
                        ['textColor'],
                        ['customBlocks']
                    ])
                    ->activePanel('customBlocks')
                    ->label("zawartość strony")
                    ->columnSpanFull(),
                Toggle::make('is_published')
                    ->label("Czy jest opublikowane")
                    ->default(false)
            ]);
    }
}
