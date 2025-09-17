<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    protected $model = Asset::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->company(),
            'type' => $this->faker->randomElement(['equity','fund','bond','crypto','cash','other']),
            'currency' => $this->faker->randomElement(['EUR','USD','CHF','GBP']),
            'quantity' => $this->faker->randomFloat(4, 1, 100),
            'purchase_unit_price' => $this->faker->randomFloat(4, 10, 500),
            'fees_total' => $this->faker->randomFloat(4, 0, 10),
            'meta' => [],
        ];
    }
}
