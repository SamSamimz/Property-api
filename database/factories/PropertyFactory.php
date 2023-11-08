<?php

namespace Database\Factories;

use App\Enums\PropertyTypeEnum;
use App\Models\Broker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'broker_id' => Broker::all()->random()->id,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'zip_code' => $this->faker->postcode,
            'description' => $this->faker->paragraph,
            'build_year' => $this->faker->year,
        ];
    }
}
