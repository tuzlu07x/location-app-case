<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'latitude' => fake()->randomFloat(6, 0, 90),
            'longitude' => fake()->randomFloat(6, 0, 180),
            'marker_color' => '000000',
        ];
    }
}
