<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fullname = explode(" ", fake()->name());
        
        return [
            "trans_id" => fake()->uuid(),
            "time" => now(),
            "amount" => fake()->randomFloat(2, 100, 10000),
            "business_short_code" => fake()->randomNumber(8),
            "bill_ref_no" => fake()->uuid(),
            "tel_no" => fake()->phoneNumber(),
            "firstname" => $fullname[0],
            "middlename" => "",
            "lastname" => $fullname[1],
        ];
    }
}
