<?php

namespace Database\Factories;

use App\Models\CTF;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Challenge>
 */
class ChallengeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => fake()->name(),
            'description' => fake()->text(50),
            'solves'      => random_int(0, 100),
            'ctf_id'      => random_int(1, 2)
        ];
    }
}
