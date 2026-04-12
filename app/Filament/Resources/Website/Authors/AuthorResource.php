<?php

namespace App\Filament\Resources\Website\Authors;

use App\Filament\Resources\Website\Authors\Pages\CreateAuthor;
use App\Filament\Resources\Website\Authors\Pages\EditAuthor;
use App\Filament\Resources\Website\Authors\Pages\ListAuthor;
use App\Filament\Resources\Website\Authors\Pages\ViewAuthor;
use App\Filament\Resources\Website\Authors\Schemas\AuthorForm;
use App\Filament\Resources\Website\Authors\Schemas\AuthorInfolist;
use App\Filament\Resources\Website\Authors\Tables\AuthorTable;
use App\Models\Author;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static string | UnitEnum | null $navigationGroup = 'Strony internetowe';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserCircle;

    protected static ?string $recordTitleAttribute = 'Autor';


    protected static ?string $modelLabel = "Autora";
    protected static ?string $pluralModelLabel = "Autorzy";

    public static function form(Schema $schema): Schema
    {
        return AuthorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AuthorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AuthorTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAuthor::route('/'),
            'create' => CreateAuthor::route('/create'),
            'view' => ViewAuthor::route('/{record}'),
            'edit' => EditAuthor::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        /** @var class-string<Model> $modelClass */
        $modelClass = static::$model;

        return (string) $modelClass::count();
    }
}
