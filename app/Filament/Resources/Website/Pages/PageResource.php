<?php

namespace App\Filament\Resources\Website\Pages;

use App\Filament\Resources\Website\Pages\Pages\CreatePage;
use App\Filament\Resources\Website\Pages\Pages\EditPage;
use App\Filament\Resources\Website\Pages\Pages\ListPages;
use App\Filament\Resources\Website\Pages\Pages\ViewPage;
use App\Filament\Resources\Website\Pages\Schemas\PageForm;
use App\Filament\Resources\Website\Pages\Schemas\PageInfolist;
use App\Filament\Resources\Website\Pages\Tables\PagesTable;
use App\Models\Page;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static string | UnitEnum | null $navigationGroup = 'Strony internetowe';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Document;

    protected static ?string $recordTitleAttribute = 'Strony';

    protected static ?string $modelLabel = "Stronę";

    protected static ?string $pluralModelLabel = "Strony";

    public static function form(Schema $schema): Schema
    {
        return PageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PagesTable::configure($table);
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
            'index' => ListPages::route('/'),
            'create' => CreatePage::route('/create'),
            'view' => ViewPage::route('/{record}'),
            'edit' => EditPage::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        /** @var class-string<Model> $modelClass */
        $modelClass = static::$model;

        return (string) $modelClass::where('is_published', true)->count();
    }
}
