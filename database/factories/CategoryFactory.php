<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->word();
        $fakeParagraphs = fake()->paragraphs(5);
        $mergeParagraphs = '<p>' . implode('</p><p>', $fakeParagraphs) . '</p>';
        return [
            "name" => $name,
            "slug" => Str::slug($name),
            "description" => $mergeParagraphs,
            "image" => "https://source.unsplash.com/1000x800?life",
            "meta_title" => $name,
            "meta_keyword" => $name,
            "meta_description" => fake()->paragraphs(2, true),
            "status" => mt_rand(0, 1)
        ];
    }
}
