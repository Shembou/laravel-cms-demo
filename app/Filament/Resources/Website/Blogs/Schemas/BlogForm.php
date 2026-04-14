<?php

namespace App\Filament\Resources\Website\Blogs\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('meta tytuł')
                    ->required(),
                TextInput::make('slug')
                    ->label('link')
                    ->required(),
                Textarea::make('description')
                    ->label('meta opis')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->label('Autor')
                    ->required(),
                Select::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->label('Etykiety'),
                Select::make('categories')
                    ->relationship('categories', 'name')
                    ->multiple()
                    ->label('Kategorie'),
                RichEditor::make('content')
                    ->toolbarButtons(([
                        ['bold'],
                        ['h1', 'h2', 'h3'],
                        ['bulletList', 'orderedList'],
                        ['textColor'],
                        ['customBlocks'],
                    ]))
                    ->activePanel('customBlocks')
                    ->label('zawartość strony')
                    ->columnSpanFull(),
                Toggle::make('is_published')
                    ->label('Czy jest opublikowane')
                    ->default(false),
            ]);
    }
}
