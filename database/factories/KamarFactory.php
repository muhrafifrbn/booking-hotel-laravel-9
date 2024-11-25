<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kamar>
 */
class KamarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "type" => $this->faker->name(),
            "slug" => $this->faker->slug(),
            "jumlah" => mt_rand(1,50),
            "fasilitas" => $this->faker->company(),
            "status" => "Ready",
            "harga" => $this->faker->numberBetween(3000, 150000) 
        ];
    }
}
