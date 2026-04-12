<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'color' => fake()->rgbColor(),
        ];
    }
}
