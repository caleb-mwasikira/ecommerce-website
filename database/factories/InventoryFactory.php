<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productIds = DB::table('products')->pluck("id");
        $reorderPoint = 20;

        return [
            "product_id" => fake()->randomElement($productIds),
            "quantity_in_stock" => fake()->randomNumber(3),
            "reorder_point" => $reorderPoint,
        ];
    }
}
