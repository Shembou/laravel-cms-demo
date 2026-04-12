<?php

namespace App\Filament\Resources\Website\Blogs\Pages;

use App\Filament\Resources\Website\Blogs\BlogResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBlog extends ViewRecord
{
    protected static string $resource = BlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
