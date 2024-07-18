<?php

namespace Database\Factories;

use App\Models\Trip;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
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
        return [
            'total_price' => fake()->randomFloat(1, 1000, 1000000),
            'user_id' => User::factory(),
            'vendor_id' => Vendor::factory(),
            'trip_id' => rand(1, 10) < 5 ? Trip::factory() : null,
            'delivery_time' => Carbon::now()->addSeconds(rand(10, 300)),
        ];

    }
}
