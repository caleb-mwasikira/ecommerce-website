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
        $imgSrcUrls = [
            "/images/ian-kiragu-GSh_PwsZsPQ-unsplash.jpg",
            "/images/mediamodifier-7cERndkOyDw-unsplash.jpg",
            "/images/pablo-lancaster-jones-9ay2Q3-NKCI-unsplash.jpg",
            "/images/pablo-lancaster-jones-NymiJ3ZHsQo-unsplash.jpg",
            "/images/pablo-lancaster-jones-rYIru_nEXmo-unsplash.jpg",
            "/images/mnz-ToLMORRb97Q-unsplash.jpg",
            "/images/tu-tu-QZGQO3NvsLo-unsplash.jpg",
            "/images/heather-ford-5gkYsrH_ebY-unsplash.jpg",
        ];

        $isSoftDeleted = fake()->boolean();
        $deletedAtDate = $isSoftDeleted ? fake()->dateTime()->format('Y-m-d H:i:s') : null;

        return [
            "name" => ucwords(fake()->words(2, true)),
            "price" => fake()->randomFloat(2, 100, 5000),
            "description" => fake()->realText(),
            "quantity_in_stock" => fake()->randomNumber(3),
            "img_src" => fake()->randomElement($imgSrcUrls),
            "category_id" => fake()->randomElement($categoryIds),
            "supplier_id" => fake()->randomElement($userIds),
            "deleted_at" => $deletedAtDate,
        ];
    }
}
