<?php

namespace App\Filament\Resources\Website\Blogs\Pages;

use App\Filament\Resources\Website\Blogs\BlogResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;
}
