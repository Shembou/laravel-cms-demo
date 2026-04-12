<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{

    protected static ?string $pageTitle;
    protected static ?string $description;
    protected static ?string $slug;

    public function definition()
    {
    
        return [
            'title' => static::$pageTitle ??= fake()->title(),
            'description' => static::$description ??=fake()->text(100),
            'slug' => static::$slug ??= fake()->slug(),
            'is_published' => false,
            'content' => null
        ];
    }
}
