<?php

namespace App\Filament\Resources\Website\Blogs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BlogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')->label('tytuł'),
                TextEntry::make('description')
                    ->label('opis')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('content')
                    ->label('Zawartość')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('author.name')
                    ->label('Author')
                    ->label('Autor'),
                TextEntry::make('tags.name')
                    ->label('Tags')
                    ->badge()
                    ->label('Etykiety')
                    ->color('primary'),
                TextEntry::make('categories.name')
                    ->badge()
                    ->label('kategorie')
                    ->color('secondary'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
