<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use App\Models\Enums\DeliveryStatus;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = DB::table("users")->pluck("id");

        $deliveryStatus = fake()->randomElement(DeliveryStatus::cases());
        $isDelivered = $deliveryStatus == DeliveryStatus::Delivered;
        $deliveredAt = $isDelivered ? fake()->dateTime()->format('Y-m-d H:i:s') : null;

        return [
            "customer_id" => fake()->randomElement($userIds),
            "total_amount" => fake()->randomFloat(2, 100, 10000),
            "delivery_status" => $deliveryStatus->value,
            "delivered_at" => $deliveredAt,
        ];
    }
}
