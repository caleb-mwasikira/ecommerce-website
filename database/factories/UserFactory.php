<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $addressIds = DB::table("addresses")->pluck("id");
        
        $isEmailVerified = fake()->boolean();
        $emailVerifiedAt = $isEmailVerified ? fake()->dateTime()->format('Y-m-d H:i:s') : null;
        $fullname = explode(" ", fake()->name());

        return [
            'firstname' => $fullname[0],
            'lastname' => $fullname[1],
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => $emailVerifiedAt,
            'password' => bcrypt("password"), // password
            "tel_no" => fake()->randomElement(array(fake()->phoneNumber(), null)),
            "address_id" => fake()->randomElement($addressIds),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
