<?php

namespace App\Filament\Resources\Website\Pages\Schemas;

use App\Enums\Colors;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        $bgColor = Colors::BgPrimaryLight->value;

        return $schema
            ->components([
                TextEntry::make('title')->label('tytuł'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->label('opis'),
                Section::make('Strona')
                    ->schema([
                        TextEntry::make('content')
                            ->placeholder('-')
                            ->hiddenLabel(true)
                            ->columnSpanFull()
                            ->hidden(fn ($record) => empty($record?->content))
                            ->extraAttributes(['class' => 'bg-gray-50 dark:bg-gray-900 max-h-screen overflow-y-visible']),
                    ])->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
