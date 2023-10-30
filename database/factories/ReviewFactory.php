<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productIds = DB::table('products')->pluck("id");
        $userIds = DB::table("users")->pluck("id");

        return [
            "product_id" => fake()->randomElement($productIds),
            "customer_id" => fake()->randomElement($userIds),
            "review_text" =>fake()->realText(),
            "rating" => fake()->numberBetween(1, 5),
        ];
    }
}
