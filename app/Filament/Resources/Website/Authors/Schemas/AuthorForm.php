<?php

namespace App\Filament\Resources\Website\Authors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(
                        'Imię'
                    )
                    ->required(),
                TextInput::make('surname')
                    ->label('nazwisko')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                FileUpload::make('image')
                    ->label('zdjęcie')
                    ->disk("public")
                    ->image(),
            ]);
    }
}
