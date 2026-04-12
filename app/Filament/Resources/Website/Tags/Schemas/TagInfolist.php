<?php

namespace App\Filament\Resources\Website\Tags\Schemas;

use Filament\Infolists\Components\ColorEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TagInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')->columnSpanFull()->label('nazwa'),
                ColorEntry::make('color')
                    ->placeholder('-')->columnSpanFull()->label('kolor'),
                TextEntry::make('created_at')
                    ->label('data stworzenia')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('data ostatniej aktualizacji')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
