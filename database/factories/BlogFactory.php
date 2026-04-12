<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Blog>
 */
class BlogFactory extends Factory
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
            'content' => fake()->paragraphs(3, true),
            'is_published' => false,
            'author_id' => Author::factory()
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Blog $blog) {
            $tags = Tag::inRandomOrder()->limit(rand(1, 3))->get();
            $blog->tags()->attach($tags);

            $categories = Category::inRandomOrder()->limit(rand(1, 2))->get();
            $blog->categories()->attach($categories);
        });
    }
}
