<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dummy>
 */
class DummyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'target' => fake()->company(),
            'ip_address' => fake()->ipv4(),
            'status' => fake()->randomElement(['Berjalan', 'Tidak Berjalan', 'Expired']),

        ];
    }
}
