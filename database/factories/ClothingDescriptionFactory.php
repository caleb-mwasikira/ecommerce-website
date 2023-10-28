<?php

namespace Database\Factories;

use App\Models\Enums\ClothingSize;
use App\Models\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClothingDescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productIds = DB::table('products')->pluck("id");

        return [
            "product_id" => fake()->randomElement($productIds),
            "body" => fake()->realText(),
            "size" => fake()->randomElement(ClothingSize::class),
            "gender" => fake()->randomElement(Gender::class),
            "color" => fake()->safeColorName(),
            "material" => fake()->sentence(),
            "care_instructions" => fake()->sentence(),
            "brand" => fake()->word(),
            "country_of_origin" => fake()->country(),
        ];
    }
}
