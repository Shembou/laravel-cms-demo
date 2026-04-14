<?php

namespace App\Filament\Resources\Website\Blogs\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BlogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')->label('tytuł'),
                TextEntry::make('slug')->label('link'),
                IconEntry::make('is_published')
                    ->label('Czy jest opublikowana')
                    ->boolean(),
                TextEntry::make('description')
                    ->label('opis')
                    ->placeholder('-')
                    ->columnSpanFull(),
                Section::make('Strona')
                    ->schema([
                        TextEntry::make('content')
                            ->placeholder('-')
                            ->hiddenLabel(true)
                            ->columnSpanFull()
                            ->hidden(fn ($record) => empty($record?->content))
                            ->extraAttributes(['class' => 'bg-gray-50 dark:bg-gray-900 max-h-screen overflow-y-visible']),
                    ])->columnSpanFull(),
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
