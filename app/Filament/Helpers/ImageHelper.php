<?php

namespace App\Filament\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    public static function getImageUrlStorageFromConfig(string $configImageName): string|null
    {
        if (!empty($configImageName)) {
            if (is_array($configImageName)) {
                return Storage::disk('public')->url($configImageName[0] ?? '');
            } else {
                return Storage::disk('public')->url($configImageName);
            }
        }
        return null;
    }
}