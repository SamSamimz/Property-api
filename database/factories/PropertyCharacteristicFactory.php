<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyCharacteristic>
 */
class PropertyCharacteristicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'property_id' => Property::all()->random()->id,
            'price' => rand(100,500),
            'bedrooms' => rand(1,5),
            'bathrooms' => rand(1,3),
            'sqft' => rand(2000,5000),
            'price_sqft' => rand(200,500),
            'property_type' => 'Townhouse',
            'status' => 'On Sale',

        ];
    }
}
