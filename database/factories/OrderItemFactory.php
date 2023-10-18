<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $orderIds = DB::table("orders")->pluck("id");
        $productIds = DB::table("products")->pluck("id");

        return [
            "order_id" => fake()->randomElement($orderIds),
            "product_id" => fake()->randomElement($productIds),
            "quantity" => fake()->numberBetween(1, 15),
            "item_price" => fake()->randomFloat(2, 100, 20000),
        ];
    }
}
