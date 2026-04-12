<?php

namespace App\Filament\Resources\Website\Categories\Pages;

use App\Filament\Resources\Website\Categories\CategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;
}
