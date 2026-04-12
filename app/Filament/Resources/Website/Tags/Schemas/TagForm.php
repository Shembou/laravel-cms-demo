<?php

namespace App\Filament\Resources\Website\Tags\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('nazwa')
                    ->required()
                    ->columnSpanFull(),
                ColorPicker::make('color')
                    ->label('kolor')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
