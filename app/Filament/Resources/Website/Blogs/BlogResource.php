<?php

namespace App\Filament\Resources\Website\Blogs;

use App\Filament\Resources\Website\Blogs\Pages\CreateBlog;
use App\Filament\Resources\Website\Blogs\Pages\EditBlog;
use App\Filament\Resources\Website\Blogs\Pages\ListBlogs;
use App\Filament\Resources\Website\Blogs\Pages\ViewBlog;
use App\Filament\Resources\Website\Blogs\Schemas\BlogForm;
use App\Filament\Resources\Website\Blogs\Schemas\BlogInfolist;
use App\Filament\Resources\Website\Blogs\Tables\BlogsTable;
use App\Models\Blog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static string | UnitEnum | null $navigationGroup = 'Strony internetowe';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;

    protected static ?string $recordTitleAttribute = 'Blog';

    protected static ?string $modelLabel = "Blog";

    protected static ?string $pluralModelLabel = "Blog";

    public static function form(Schema $schema): Schema
    {
        return BlogForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BlogInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BlogsTable::configure($table);
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
            'index' => ListBlogs::route('/'),
            'create' => CreateBlog::route('/create'),
            'view' => ViewBlog::route('/{record}'),
            'edit' => EditBlog::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        /** @var class-string<Model> $modelClass */
        $modelClass = static::$model;

        return (string) $modelClass::where('is_published', true)->count();
    }
}
