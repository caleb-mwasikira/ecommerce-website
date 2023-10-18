<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShoppingCartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = DB::table("users")->pluck("id");
        $productIds = DB::table("products")->pluck("id");

        return [
            "customer_id" => fake()->randomElement($userIds),
            "product_id" => fake()->randomElement($productIds),
            "quantity" => fake()->randomDigitNotNull(),
        ];
    }
}
