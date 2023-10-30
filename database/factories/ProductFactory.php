<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = DB::table("categories")->pluck("id");
        $userIds = DB::table("users")->pluck("id");
        $mediaIds = DB::table("media")->pluck("id");

        $isSoftDeleted = fake()->boolean();
        $deletedAtDate = $isSoftDeleted ? fake()->dateTime()->format('Y-m-d H:i:s') : null;

        return [
            "name" => ucwords(fake()->words(2, true)),
            "price" => fake()->randomFloat(2, 100, 1000),
            "category_id" => fake()->randomElement($categoryIds),
            "supplier_id" => fake()->randomElement($userIds),
            "media_id" => fake()->randomElement($mediaIds),
            "deleted_at" => $deletedAtDate,
        ];
    }
}
