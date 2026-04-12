<?php

namespace App\Filament\Resources\Website\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('nazwa')
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('slug')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
