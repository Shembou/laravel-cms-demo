<?php

namespace App\Filament\Resources\Website\Tags;

use App\Filament\Resources\Website\Tags\Pages\CreateTag;
use App\Filament\Resources\Website\Tags\Pages\EditTag;
use App\Filament\Resources\Website\Tags\Pages\ListTags;
use App\Filament\Resources\Website\Tags\Pages\ViewTag;
use App\Filament\Resources\Website\Tags\Schemas\TagForm;
use App\Filament\Resources\Website\Tags\Schemas\TagInfolist;
use App\Filament\Resources\Website\Tags\Tables\TagsTable;
use App\Models\Tag;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static string | UnitEnum | null $navigationGroup = 'Strony internetowe';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Tag;

    protected static ?string $recordTitleAttribute = 'Etykieta';

    protected static ?string $modelLabel = "Etykietę";
    protected static ?string $pluralModelLabel = "Etykiety";

    public static function form(Schema $schema): Schema
    {
        return TagForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TagInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TagsTable::configure($table);
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
            'index' => ListTags::route('/'),
            'create' => CreateTag::route('/create'),
            'view' => ViewTag::route('/{record}'),
            'edit' => EditTag::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        /** @var class-string<Model> $modelClass */
        $modelClass = static::$model;

        return (string) $modelClass::count();
    }
}
