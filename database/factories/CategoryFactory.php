<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    private function create_slug(string $words)
    {
        return str_replace(" ", '-', strtolower(trim($words)));
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryName = fake()->unique()->randomElement([
            "sports wear", "trousers", "jackets", "sweaters", 
            "t-shirts", "suits", "jeans", "skirts", "underwear", 
            "swimmning customes", "socks", "polo shirts", "hats",
            "pajamas"
        ]);

        return [
            "name" => $categoryName,
            "slug" => $this->create_slug($categoryName),
        ];
    }
}
