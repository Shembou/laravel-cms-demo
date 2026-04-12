<?php

namespace App\Filament\Resources\Website\Authors\Pages;

use App\Filament\Resources\Website\Authors\AuthorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAuthor extends CreateRecord
{
    protected static string $resource = AuthorResource::class;
}
